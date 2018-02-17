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

    public function recent()
    {
        $this->loadModel('Orders');
        $orders = $this->Orders->find()
            ->select(['id', 'company_code', 'company_name1', 'order_date', 'delivery_date', 'sales_date', 'status_msg', 'product_name', 'Clients.id'])
            ->limit(10)
            ->order(['order_date' => 'DESC'])
            ->contain(['Clients']);

        $this->loadModel('Contracts');
        $contracts = $this->Contracts->find()
            ->select(['Contracts.id', 'Contracts.file', 'Contracts.dir', 'Contracts.modified', 'Clients.id', 'Clients.client_name',
                'Customers.id', 'Customers.customer_name', 'Contractnames.contract_name'])
            ->limit(10)
            ->order(['Contracts.modified' => 'DESC'])
            ->contain(['Clients', 'Customers', 'Contractnames']);

        // $this->loadModel('Contracts');
        $licenses = $this->Clients->Licenses->find()
            ->select(['Licenses.id', 'Licenses.status_id', 'Licenses.license_no', 'Licenses.license_name', 'Licenses.issued',
                'Clients.id', 'Clients.client_name', 'Customers.id', 'Customers.customer_name', 'Statuses.name'])
            ->limit(10)
            ->order(['Licenses.modified' => 'DESC'])
            ->contain(['Clients', 'Customers', 'Statuses']);

        $this->set(compact('orders', 'contracts', 'licenses'));
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
            ->contain(['Partners', 'Users']);

        $this->set('clients', $this->paginate($clients));

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
            'contain' => ['Users', 'Contracts', 'Customers', 'Licensehistories', 'Licenses', 'Orders', 'Partners'],
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
        $client = $this->Clients->newEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
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

                return $this->redirect(['action' => 'index']);
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
