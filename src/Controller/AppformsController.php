<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Appforms Controller
 *
 * @property \App\Model\Table\AppformsTable $Appforms
 *
 * @method \App\Model\Entity\Appform[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppformsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $appforms = $this->paginate($this->Appforms);

        $this->set(compact('appforms'));
    }

    /**
     * View method
     *
     * @param string|null $id Appform id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appform = $this->Appforms->get($id, [
            'contain' => []
        ]);

        $this->set('appform', $appform);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appform = $this->Appforms->newEntity();
        if ($this->request->is('post')) {
            $appform = $this->Appforms->patchEntity($appform, $this->request->getData());
            if ($this->Appforms->save($appform)) {
                $this->Flash->success(__('The appform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appform could not be saved. Please, try again.'));
        }
        $this->set(compact('appform'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Appform id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appform = $this->Appforms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appform = $this->Appforms->patchEntity($appform, $this->request->getData());
            if ($this->Appforms->save($appform)) {
                $this->Flash->success(__('The appform has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The appform could not be saved. Please, try again.'));
        }
        $this->set(compact('appform'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Appform id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appform = $this->Appforms->get($id);
        if ($this->Appforms->delete($appform)) {
            $this->Flash->success(__('The appform has been deleted.'));
        } else {
            $this->Flash->error(__('The appform could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
