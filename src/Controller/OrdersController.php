<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 *
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
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
        $this->paginate = [
            'order' => [
                'order_date' => 'desc',
                'company_code' => 'asc'
            ]
        ];

        $orders = $this->Orders
            ->find('search', ['search' => $this->request->query])
            // ->order(['order_date' =>'DESC'])
            ->contain(['Statuses',
                'Clients' => ['fields' => ['id', 'company_code' , 'client_name', 'partner_id']]
            ]);

        $this->set('orders', $this->paginate($orders));
        $statuses = $this->Orders->Statuses->find('list');
        $this->set(compact('statuses'));

        // $this->paginate = [
        //     'contain' => ['Statuses', 'Users', 'Clients'],
        // ];
        // $orders = $this->paginate($this->Orders);

        // $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Statuses', 'Users', 'Clients', 'Licenses'],
        ]);

        $this->set('order', $order);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $statuses = $this->Orders->Statuses->find('list', ['limit' => 200]);
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $clients = $this->Orders->Clients->find('list', ['limit' => 1000]);
        $this->set(compact('order', 'statuses', 'users', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $statuses = $this->Orders->Statuses->find('list', ['limit' => 200]);
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $clients = $this->Orders->Clients->find('orderlist', ['limit' => 1000]);
        // $clients = $this->Orders->Clients->find('list', ['limit' => 200]);
        $this->set(compact('order', 'statuses', 'users', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
