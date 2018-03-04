<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Customers Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 *
 * @method \App\Model\Entity\Customer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CustomersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Search.Prg', [
            'actions' => ['index'],
        ]);
        $this->loadComponent('RequestHandler'); /// return json

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $customers = $this->Customers
            ->find('search', ['search' => $this->request->query])
            ->contain(['Clients']);

        $this->set('customers', $this->paginate($customers));

        // $this->paginate = [
        //     'contain' => ['Clients', 'Users']
        // ];
        // $customers = $this->paginate($this->Customers);

        // $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => ['Clients', 'Users', 'Contracts', 'Licenses', 'Contracts.Contractnames'],
        ]);

        $this->set('customer', $customer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $customer = $this->Customers->newEntity();
        if ($this->request->is('post')) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'view', $customer->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $clients = $this->Customers->Clients->find('list', ['limit' => 1000]);
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customer = $this->Customers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('The customer has been saved.'));

                return $this->redirect(['action' => 'view', $customer->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $clients = $this->Customers->Clients->find('list', ['limit' => 200]);
        $users = $this->Customers->Users->find('list', ['limit' => 200]);
        $this->set(compact('customer', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);
        if ($this->Customers->delete($customer)) {
            $this->Flash->success(__('The customer has been deleted.'));
        } else {
            $this->Flash->error(__('The customer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // js uses this
    public function customerinfo($customer_id = null)
    {
        $this->autoRender = false;
        $this->viewBuilder()->autoLayout(false);
        // Configure::write('debug', 0);
        $this->response->type('application/json');

        if (empty($customer_id)) {
            return null;
        }

        $info = $this->Customers->findById($customer_id)
            ->select(['Customers.customer_name', 'Customers.identity2', 'Clients.identity1'])
            ->contain(['Clients'])
            ->first()
            ->toArray();
        // $this->log( json_encode(compact('info')));
        $this->response->body(json_encode(compact('info')));



    }
}
