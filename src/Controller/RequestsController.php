<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use \PhpOffice\PhpWord\PhpWord;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
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

        $requests = $this->Requests
            ->find('search', ['search' => $this->request->query])
            ->order(['Requests.modified' => 'DESC'])
            ->contain(['Customers', 'Appforms', 'Statuses',
                'Clients' => ['fields' => ['id', 'company_code', 'client_name', 'partner_id']],
            ]);
        $statuses = $this->Requests->Statuses->find('list');

        $this->set('requests', $this->paginate($requests));
        $this->set(compact('statuses'));

        // $this->paginate = [
        //     'contain' => ['Clients', 'Customers', 'Appforms', 'Statuses', 'Languages', 'Users'],
        // ];
        // $requests = $this->paginate($this->Requests);

        // $this->set(compact('requests'));
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
            'contain' => ['Clients', 'Customers', 'Appforms', 'Statuses', 'Languages', 'Users'],
        ]);

        $this->set('request', $request);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($customer_id = null)
    {
        // from ajax (selectcustomer.ctp)
        $data = [];
        if ($customer_id) {
            $data = $this->Requests->Customers->findById($customer_id)
                ->select(['customer_id' => 'id', 'client_id'])
                ->first();
            $data = ['customer_id' => $data->customer_id, 'client_id' => $data->client_id];
        }
        $request = $this->Requests->newEntity($data);

        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'view', $request->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $clients = $this->Requests->Clients->find('list', ['limit' => 1000]);
        $customers = $this->Requests->Customers->find('list', ['limit' => 1000]);
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
            'contain' => [],
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
        $clients = $this->Requests->Clients->find('list', ['limit' => 1000]);
        $customers = $this->Requests->Customers->find('list', ['limit' => 1000]);
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

    public function doc($id = null)
    {
        $this->autoRender = false;

        $request = $this->Requests->findById($id)
            ->contain(['Clients', 'Customers', 'Appforms', 'Statuses', 'Languages'])
            ->first()
            ->toArray();

        Configure::write('debug', 0);
        $tempdoc = WWW_ROOT . DS . 'doc_template' . DS . $request['appform']['file'];
        // $this->log($request);
        // return;
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($tempdoc);
        $templateProcessor->setValue('client_name', $request['client']['client_name']);
        $templateProcessor->setValue('division', $request['customer']['division']);
        $templateProcessor->setValue('address', $request['customer']['address']);
        $templateProcessor->setValue('admin_name1', $request['customer']['admin_name1']);
        $templateProcessor->setValue('mail1', $request['customer']['mail1']);
        $templateProcessor->setValue('div1', $request['customer']['div1']);
        $templateProcessor->setValue('admin_name2', $request['customer']['admin_name2']);
        $templateProcessor->setValue('mail2', $request['customer']['mail2']);
        $templateProcessor->setValue('div2', $request['customer']['div2']);

        $t_date = strtotime($request['license_date']);
        $templateProcessor->setValue('license_date_yy', date('Y', $t_date));
        $templateProcessor->setValue('license_date_mm', date('n', $t_date));
        $templateProcessor->setValue('license_date_dd', date('j', $t_date));

        $t_date = strtotime($request['startsupp_date']);
        $templateProcessor->setValue('startsupp_date_yy', date('Y', $t_date));
        $templateProcessor->setValue('startsupp_date_mm', date('n', $t_date));
        $templateProcessor->setValue('startsupp_date_dd', date('j', $t_date));
        // return;
        $templateProcessor->setValue('q3', $request['license_qty'] == 3 ? '■' : '□');
        $templateProcessor->setValue('q5', $request['license_qty'] == 5 ? '■' : '□');
        $templateProcessor->setValue('q10', $request['license_qty'] == 10 ? '■' : '□');
        $templateProcessor->setValue('q20', $request['license_qty'] == 20 ? '■' : '□');
        $templateProcessor->setValue('q30', $request['license_qty'] == 30 ? '■' : '□');
        $templateProcessor->setValue('q40', $request['license_qty'] == 40 ? '■' : '□');
        $templateProcessor->setValue('q50', $request['license_qty'] == 50 ? '■' : '□');
        $templateProcessor->setValue('notice', preg_replace("/\r\n|\r|\n/", "<w:br />", $request['notice']));
        //ダウンロード用
        // $templateProcessor->saveAs("mytest.docx");
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $request['appform']['form_name'] . '.docx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        ob_end_clean(); //バッファ消去
        $templateProcessor->saveAs("php://output");
        $templateProcessor = null;
        exit();

    }
}
