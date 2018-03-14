<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Contracts Controller
 *
 * @property \App\Model\Table\ContractsTable $Contracts
 *
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index'],
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contracts = $this->Contracts
            ->find('search', ['search' => $this->request->query])
            ->contain(['Clients', 'Customers', 'Contractnames', 'Statuses']);

        $this->set('contracts', $this->paginate($contracts));

    }

    /**
     * View method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => ['Clients', 'Customers', 'Contractnames', 'Users', 'Orders', 'Statuses'],
        ]);

        $this->set('contract', $contract);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // js uses (selectcustomer.ctp)
        $data = [];
        if (!empty($this->request->query['customer_id'])) {
            $customer_id = $this->request->query['customer_id'];
            $data = $this->Contracts->Customers->find()
                ->select(['customer_id' => 'id', 'client_id'])
                ->where(['id' => $customer_id])
                ->first();
            $data = ['customer_id' => $data->customer_id, 'client_id' => $data->client_id];
        }
        if (!empty($this->request->query['client_id'])) {
            $client_id = $this->request->query['client_id'];
            $data = ['client_id' => $client_id];
        }

        $contract = $this->Contracts->newEntity($data, ['validate' => false]);
        if ($this->request->is(['post'])) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());

            // 契約書のステータスをセット
            $sts = $this->Contracts->Contractnames->findById($contract['contractname_id'])
                ->select(['status_id'])
                ->first();
            $contract['status_id'] = $sts['status_id'];

            if ($this->Contracts->save($contract)) {
                $this->saveOrderStatus($contract->order_id);
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'view', $contract->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $clients = $this->Contracts->Clients->find('withpf');
        $customers = $this->Contracts->Customers->find('list', ['limit' => 1000]);
        $contractnames = $this->Contracts->Contractnames->find('withp');
        $users = $this->Contracts->Users->find('list', ['limit' => 200]);
        $orders = $this->Contracts->Orders->find('list', ['limit' => 10]);
        $statuses = $this->Contracts->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'clients', 'customers', 'contractnames', 'users', 'orders', 'statuses'));
    }

    // ステータス変更
    private function saveOrderStatus($order_id=null, $status=99) {
        if (empty($order_id)) return;
        $order = $this->Contracts->Orders->get($order_id);
        $order->status_id = $status;
        $this->Contracts->Orders->save($order);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contract = $this->Contracts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contract = $this->Contracts->patchEntity($contract, $this->request->getData());
            // 契約書のステータスをセット
            // $sts = $this->Contracts->Contractnames->findById($contract['contractname_id'])
            //     ->select(['status_id'])
            //     ->first();
            // $contract['status_id'] = $sts['status_id'];
            $before = $this->Contracts->get($contract->id);     // 変更前データ取得
            if ($this->Contracts->save($contract)) {
                if ($contract->order_id <> $before->order_id) {
                    $this->saveOrderStatus($before->order_id, 1);
                }
                $this->saveOrderStatus($contract->order_id);
                $this->Flash->success(__('The contract has been saved.'));

                return $this->redirect(['action' => 'view', $contract->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $clients = $this->Contracts->Clients->find('withpf');
        $customers = $this->Contracts->Customers->find('list', ['limit' => 1000]);
        $contractnames = $this->Contracts->Contractnames->find('withp');
        $users = $this->Contracts->Users->find('list', ['limit' => 200]);
        $orders = $this->Contracts->Orders->find('list', ['limit' => 1000]);
        $statuses = $this->Contracts->Statuses->find('list', ['limit' => 200]);
        $this->set(compact('contract', 'clients', 'customers', 'contractnames', 'users', 'orders', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contract = $this->Contracts->get($id);
        if ($this->Contracts->delete($contract)) {
            $this->saveOrderStatus($contract->order_id, 1); // 変更前を未処理状態へ
            $this->Flash->success(__('The contract has been deleted.'));
        } else {
            $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function download($id=null) {
        $this->autoRender = false;

        $contract = $this->Contracts->get($id);
        if (!$contract->file) return;
        $response = $this->response->withFile(
            ROOT . DS . $contract->dir . $contract->file,
            ['download' => true, 'name' => $contract->file]
        );

        // レスポンスオブジェクトを返すとコントローラーがビューの描画を中止します
        return $response;
    }
}
