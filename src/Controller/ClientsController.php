<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index'],
        ]);
    }

    /**
     * 未処理データ一覧, 最近の更新
     * mode: state, recent
     */
    public function state($mode = 'state')
    {
        $limit = 20;

        $this->loadModel('Orders');
        $orders = $this->Orders->find()
            ->select(['id', 'company_code', 'company_name1', 'order_date', 'delivery_date', 'Clients.partner_id',
                'sales_date', 'status_msg', 'product_name', 'Clients.id', 'Orders.status_id'])
            ->contain(['Clients']);

        if ($mode == 'state') {
            $orders->where(['Orders.status_id IS' => null])
                ->orWhere(['Orders.status_id <>' => 99]);
        } else {
            $orders->limit($limit)
                ->order(['order_date' => 'DESC']);
        }

        $this->loadModel('Contracts');
        $contracts = $this->Contracts->find()
            ->select(['Contracts.id', 'Contracts.file', 'Contracts.dir', 'Contracts.modified', 'contract_date', 'Clients.id', 'Clients.client_name', 'Clients.partner_id',
                'Customers.id', 'Customers.customer_name', 'Contractnames.contract_name', 'Contracts.status_id'])
            ->contain(['Clients', 'Customers', 'Contractnames']);

        if ($mode == 'state') {
            $contracts->where(['Contracts.status_id IS' => null])
                ->orWhere(['Contracts.status_id <>' => 99]);
        } else {
            $contracts->limit($limit)
                ->order(['Contracts.modified' => 'DESC']);
        }

        $this->loadModel('Requests');
        $requests = $this->Requests->find()
            ->select(['Requests.id', 'Requests.license_name', 'Requests.product_name', 'Appforms.form_name', 'Requests.status_id',
                'Requests.modified', 'Clients.client_name', 'Clients.partner_id', 'Customers.customer_name'])
            ->contain(['Clients', 'Customers', 'Appforms']);

        if ($mode == 'state') {
            $requests->where(['Requests.status_id <>' => 99]);
        } else {
            $requests->limit($limit)
                ->order(['Requests.modified' => 'DESC']);
        }

        $licenses = $this->Clients->Licenses->find()
            ->select(['Licenses.id', 'Licenses.status_id', 'Licenses.license_no', 'Licenses.license_name', 'Licenses.issued',
                'Clients.id', 'Clients.client_name', 'Clients.partner_id', 'Customers.id', 'Customers.customer_name', 'Licenses.status_id'])
            ->contain(['Clients', 'Customers']);
        if ($mode == 'state') {
            $licenses->where(['Licenses.status_id IS' => null])
                ->orWhere(['Licenses.status_id <>' => 99]);
        } else {
            $licenses->limit($limit)
                ->order(['Licenses.modified' => 'DESC']);
        }

        $this->set(compact('mode', 'orders', 'contracts', 'licenses', 'requests'));

        // 未処理数
        $counts['Orders'] = $this->getStatusCount($this->Orders);
        $counts['Contracts'] = $this->getStatusCount($this->Contracts);
        $counts['Licenses'] = $this->getStatusCount($this->Clients->Licenses);
        $counts['Requests'] = $this->getStatusCount($this->Requests);

        $this->set(compact('counts'));

    }

    private function getStatusCount($table) {
        $query = $table->find();
        $query->select([
            'status_id',
            'cnt' => $query->func()->count('*'),
        ])->where(['status_id <' => 99])->group('status_id');
        // $count_licenses = $count_licenses->toarray(); //->combine('status_idid', 'cnt');
        return $query->combine('status_id', 'cnt')->toArray();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $clients = $this->Clients
            ->find('search', ['search' => $this->request->query])
            ->contain(['Partners']);

        $partners = $this->Clients->Partners->find('list')
            ->where(['partner_flag' => 1]);

        $this->set('clients', $this->paginate($clients));
        $this->set('partners', $partners);

    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => ['Users', 'Customers', 'Licenses', 'Orders', 'Partners',
                'Contracts', 'Contracts.Contractnames',
            ],
        ]);

        $this->set('client', $client);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $data = [];
        // if (!$this->request->is('post')) {
        //     // 最大値＋１を初期値とする
        //     $query = $this->Clients->find();
        //     $ret = $query->select(['max_id' => $query->func()->max('identity1')])->first();
        //     $max_id = intval($ret->max_id);
        //     if (!$max_id) {
        //         $max_id = 1000;
        //     }
        //     $data = ['identity1' => ++$max_id];
        // }

        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'view', $client->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $partners = $this->Clients->Partners->find('list')
            ->where(['partner_flag' => 1]);
        $this->set(compact('client', 'users', 'partners'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'view', $client->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $users = $this->Clients->Users->find('list', ['limit' => 200]);
        $partners = $this->Clients->Partners->find('list')
            ->where(['partner_flag' => 1]);
        $this->set(compact('client', 'users', 'partners'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
