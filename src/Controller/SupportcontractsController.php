<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Supportcontracts Controller
 *
 * @property \App\Model\Table\SupportcontractsTable $Supportcontracts
 *
 * @method \App\Model\Entity\Supportcontract[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupportcontractsController extends AppController
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
        $supportcontracts = $this->Supportcontracts
            ->find('search', ['search' => $this->request->query])
            ->contain(['Clients' =>['fields' =>['id', 'client_name', 'partner_id']]]);
        $this->set('supportcontracts', $this->paginate($supportcontracts));

        // $this->paginate = [
        //     'contain' => ['Clients'],
        // ];
        // $supportcontracts = $this->paginate($this->Supportcontracts);

        // $this->set(compact('supportcontracts'));
    }

    /**
     * View method
     *
     * @param string|null $id Supportcontract id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supportcontract = $this->Supportcontracts->get($id, [
            'contain' => ['Clients'],
        ]);

        $this->set('supportcontract', $supportcontract);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supportcontract = $this->Supportcontracts->newEntity();
        if ($this->request->is('post')) {
            $supportcontract = $this->Supportcontracts->patchEntity($supportcontract, $this->request->getData());
            if ($this->Supportcontracts->save($supportcontract)) {
                $this->Flash->success(__('The supportcontract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supportcontract could not be saved. Please, try again.'));
        }
        $clients = $this->Supportcontracts->Clients->find('list', [
            'keyField' => 'company_code', 'valueField' => 'client_name',
            'limit' => 1000,
        ]);
        $this->set(compact('supportcontract', 'clients'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Supportcontract id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supportcontract = $this->Supportcontracts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supportcontract = $this->Supportcontracts->patchEntity($supportcontract, $this->request->getData());
            if ($this->Supportcontracts->save($supportcontract)) {
                $this->Flash->success(__('The supportcontract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The supportcontract could not be saved. Please, try again.'));
        }
        $clients = $this->Supportcontracts->Clients->find('list', [
            'keyField' => 'company_code', 'valueField' => 'client_name',
            'limit' => 1000,
        ]);
        $this->set(compact('supportcontract', 'clients'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Supportcontract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supportcontract = $this->Supportcontracts->get($id);
        if ($this->Supportcontracts->delete($supportcontract)) {
            $this->Flash->success(__('The supportcontract has been deleted.'));
        } else {
            $this->Flash->error(__('The supportcontract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
