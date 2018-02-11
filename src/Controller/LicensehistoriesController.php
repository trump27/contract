<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Licensehistories Controller
 *
 * @property \App\Model\Table\LicensehistoriesTable $Licensehistories
 *
 * @method \App\Model\Entity\Licensehistory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LicensehistoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Customers', 'Orders', 'Statuses', 'Languages', 'Users']
        ];
        $licensehistories = $this->paginate($this->Licensehistories);

        $this->set(compact('licensehistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Licensehistory id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $licensehistory = $this->Licensehistories->get($id, [
            'contain' => ['Clients', 'Customers', 'Orders', 'Statuses', 'Languages', 'Users']
        ]);

        $this->set('licensehistory', $licensehistory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $licensehistory = $this->Licensehistories->newEntity();
        if ($this->request->is('post')) {
            $licensehistory = $this->Licensehistories->patchEntity($licensehistory, $this->request->getData());
            if ($this->Licensehistories->save($licensehistory)) {
                $this->Flash->success(__('The licensehistory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The licensehistory could not be saved. Please, try again.'));
        }
        $clients = $this->Licensehistories->Clients->find('list', ['limit' => 200]);
        $customers = $this->Licensehistories->Customers->find('list', ['limit' => 200]);
        $orders = $this->Licensehistories->Orders->find('list', ['limit' => 200]);
        $statuses = $this->Licensehistories->Statuses->find('list', ['limit' => 200]);
        $languages = $this->Licensehistories->Languages->find('list', ['limit' => 200]);
        $users = $this->Licensehistories->Users->find('list', ['limit' => 200]);
        $this->set(compact('licensehistory', 'clients', 'customers', 'orders', 'statuses', 'languages', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Licensehistory id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $licensehistory = $this->Licensehistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $licensehistory = $this->Licensehistories->patchEntity($licensehistory, $this->request->getData());
            if ($this->Licensehistories->save($licensehistory)) {
                $this->Flash->success(__('The licensehistory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The licensehistory could not be saved. Please, try again.'));
        }
        $clients = $this->Licensehistories->Clients->find('list', ['limit' => 200]);
        $customers = $this->Licensehistories->Customers->find('list', ['limit' => 200]);
        $orders = $this->Licensehistories->Orders->find('list', ['limit' => 200]);
        $statuses = $this->Licensehistories->Statuses->find('list', ['limit' => 200]);
        $languages = $this->Licensehistories->Languages->find('list', ['limit' => 200]);
        $users = $this->Licensehistories->Users->find('list', ['limit' => 200]);
        $this->set(compact('licensehistory', 'clients', 'customers', 'orders', 'statuses', 'languages', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Licensehistory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $licensehistory = $this->Licensehistories->get($id);
        if ($this->Licensehistories->delete($licensehistory)) {
            $this->Flash->success(__('The licensehistory has been deleted.'));
        } else {
            $this->Flash->error(__('The licensehistory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
