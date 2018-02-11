<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contractnames Controller
 *
 * @property \App\Model\Table\ContractnamesTable $Contractnames
 *
 * @method \App\Model\Entity\Contractname[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractnamesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $contractnames = $this->paginate($this->Contractnames);

        $this->set(compact('contractnames'));
    }

    /**
     * View method
     *
     * @param string|null $id Contractname id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contractname = $this->Contractnames->get($id, [
            'contain' => ['Contracts']
        ]);

        $this->set('contractname', $contractname);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contractname = $this->Contractnames->newEntity();
        if ($this->request->is('post')) {
            $contractname = $this->Contractnames->patchEntity($contractname, $this->request->getData());
            if ($this->Contractnames->save($contractname)) {
                $this->Flash->success(__('The contractname has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractname could not be saved. Please, try again.'));
        }
        $this->set(compact('contractname'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contractname id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contractname = $this->Contractnames->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contractname = $this->Contractnames->patchEntity($contractname, $this->request->getData());
            if ($this->Contractnames->save($contractname)) {
                $this->Flash->success(__('The contractname has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contractname could not be saved. Please, try again.'));
        }
        $this->set(compact('contractname'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contractname id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contractname = $this->Contractnames->get($id);
        if ($this->Contractnames->delete($contractname)) {
            $this->Flash->success(__('The contractname has been deleted.'));
        } else {
            $this->Flash->error(__('The contractname could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
