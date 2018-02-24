<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Productinfos Controller
 *
 * @property \App\Model\Table\ProductinfosTable $Productinfos
 *
 * @method \App\Model\Entity\Productinfo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductinfosController extends AppController
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
        $productinfos = $this->Productinfos
            ->find('search', ['search' => $this->request->query]);
        $this->set('productinfos', $this->paginate($productinfos));

    }

    /**
     * View method
     *
     * @param string|null $id Productinfo id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productinfo = $this->Productinfos->get($id, [
            'contain' => [],
        ]);

        $this->set('productinfo', $productinfo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productinfo = $this->Productinfos->newEntity();
        if ($this->request->is('post')) {
            $productinfo = $this->Productinfos->patchEntity($productinfo, $this->request->getData());
            if ($this->Productinfos->save($productinfo)) {
                $this->Flash->success(__('The productinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productinfo could not be saved. Please, try again.'));
        }
        $this->set(compact('productinfo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Productinfo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productinfo = $this->Productinfos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productinfo = $this->Productinfos->patchEntity($productinfo, $this->request->getData());
            if ($this->Productinfos->save($productinfo)) {
                $this->Flash->success(__('The productinfo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The productinfo could not be saved. Please, try again.'));
        }
        $this->set(compact('productinfo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Productinfo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productinfo = $this->Productinfos->get($id);
        if ($this->Productinfos->delete($productinfo)) {
            $this->Flash->success(__('The productinfo has been deleted.'));
        } else {
            $this->Flash->error(__('The productinfo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
