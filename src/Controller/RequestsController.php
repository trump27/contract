<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Customers', 'Appforms', 'Statuses', 'Languages', 'Users']
        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => ['Clients', 'Customers', 'Appforms', 'Statuses', 'Languages', 'Users']
        ]);

        $this->set('request', $request);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'view', $request->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $clients = $this->Requests->Clients->find('list', ['limit' => 200]);
        $customers = $this->Requests->Customers->find('list', ['limit' => 200]);
        $appforms = $this->Requests->Appforms->find('list', ['limit' => 200]);
        $statuses = $this->Requests->Statuses->find('list', ['limit' => 200]);
        $languages = $this->Requests->Languages->find('list', ['limit' => 200]);
        $users = $this->Requests->Users->find('list', ['limit' => 200]);
        $this->set(compact('request', 'clients', 'customers', 'appforms', 'statuses', 'languages', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'view', $request->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $clients = $this->Requests->Clients->find('list', ['limit' => 200]);
        $customers = $this->Requests->Customers->find('list', ['limit' => 200]);
        $appforms = $this->Requests->Appforms->find('list', ['limit' => 200]);
        $statuses = $this->Requests->Statuses->find('list', ['limit' => 200]);
        $languages = $this->Requests->Languages->find('list', ['limit' => 200]);
        $users = $this->Requests->Users->find('list', ['limit' => 200]);
        $this->set(compact('request', 'clients', 'customers', 'appforms', 'statuses', 'languages', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
