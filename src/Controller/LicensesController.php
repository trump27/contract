<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use \PhpOffice\PhpWord\PhpWord;

/**
 * Licenses Controller
 *
 * @property \App\Model\Table\LicensesTable $Licenses
 *
 * @method \App\Model\Entity\License[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LicensesController extends AppController
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
                'issued' => 'desc'
            ]
        ];
        $licenses = $this->Licenses
            ->find('search', ['search' => $this->request->query])
            ->contain(['Statuses', 'Conditions',
                'Clients' => ['fields' => ['id', 'client_name', 'partner_id']],
                'Customers' => ['fields' => ['id', 'customer_name']],
            ]);
        $conditions = $this->Licenses->Conditions->find('list');
        $statuses = $this->Licenses->Statuses->find('list');

        $this->set('licenses', $this->paginate($licenses));
        $this->set(compact('conditions', 'statuses'));

        // $this->paginate = [
        //     'contain' => ['Clients', 'Customers', 'Orders', 'Statuses', 'Conditions', 'Languages', 'Users'],
        // ];
        // $licenses = $this->paginate($this->Licenses);

        // $this->set(compact('licenses'));
    }

    /**
     * View method
     *
     * @param string|null $id License id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vw_license = $this->Licenses->get($id, [
            'contain' => ['Clients', 'Customers', 'Orders', 'Statuses', 'Conditions', 'Languages', 'Users'],
        ]);

        $this->set('vw_license', $vw_license);
    }

    // ステータス変更
    private function saveOrderStatus($order_id=null, $status=99) {
        if (empty($order_id)) return;
        $order = $this->Licenses->Orders->get($order_id);
        $order->status_id = $status;
        $this->Licenses->Orders->save($order);
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
            $data = $this->Licenses->Customers->findById($customer_id)
                ->select(['customer_id' => 'id', 'client_id'])
                ->first();
            $data = ['customer_id' => $data->customer_id, 'client_id' => $data->client_id];
        }

        $license = $this->Licenses->newEntity($data);
        if ($this->request->is('post')) {
            $license = $this->Licenses->patchEntity($license, $this->request->getData());
            if ($this->Licenses->save($license)) {
                $this->saveOrderStatus($license->order_id);
                $this->Flash->success(__('The license has been saved.'));

                return $this->redirect(['action' => 'view', $license->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The license could not be saved. Please, try again.'));
        }
        $clients = $this->Licenses->Clients->find('list', ['limit' => 1000]);
        $customers = $this->Licenses->Customers->find('list', ['limit' => 1000]);
        $orders = $this->Licenses->Orders->find('list', ['limit' => 200]);
        $statuses = $this->Licenses->Statuses->find('list', ['limit' => 200]);
        $conditions = $this->Licenses->Conditions->find('list', ['limit' => 200]);
        $languages = $this->Licenses->Languages->find('list', ['limit' => 200]);
        $users = $this->Licenses->Users->find('list', ['limit' => 200]);
        $this->set(compact('license', 'clients', 'customers', 'orders', 'statuses', 'conditions', 'languages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id License id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $license = $this->Licenses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $license = $this->Licenses->patchEntity($license, $this->request->getData());
            // $this->log($this->request->getData());
            $before = $this->Licenses->get($license->id); // 変更前データ
            if ($this->Licenses->save($license)) {
                if ($license->order_id <> $before->order_id) {
                    $this->saveOrderStatus($before->order_id, 1);   // 変更前を未処理状態へ
                }
                $this->saveOrderStatus($license->order_id);
                $this->Flash->success(__('The license has been saved.'));

                return $this->redirect(['action' => 'view', $license->id]);
                // return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The license could not be saved. Please, try again.'));
        }
        // $clients = $this->Licenses->Clients->find('withpartner');
        $clients = $this->Licenses->Clients->find('list');
        $customers = $this->Licenses->Customers->find('list');
        $orders = $this->Licenses->Orders->find('list');
        $statuses = $this->Licenses->Statuses->find('list', ['limit' => 200]);
        $conditions = $this->Licenses->Conditions->find('list', ['limit' => 200]);
        $languages = $this->Licenses->Languages->find('list', ['limit' => 200]);
        $users = $this->Licenses->Users->find('list', ['limit' => 200]);
        $this->set(compact('license', 'clients', 'customers', 'orders', 'statuses', 'conditions', 'languages'));

    }

    /**
     * Delete method
     *
     * @param string|null $id License id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $license = $this->Licenses->get($id);
        if ($this->Licenses->delete($license)) {
            $this->Flash->success(__('The license has been deleted.'));
        } else {
            $this->Flash->error(__('The license could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /* 同一Customerのライセンスを一覧 for js*/
    public function getrelative($customer_id = null)
    {
        $this->autoRender = false;
        Configure::write('debug', 0);
        if (empty($customer_id)) {
            return null;
        }
        $list = $this->Licenses->findByCustomerId($customer_id)
            ->select(['id', 'issued', 'license_no'])
            ->order(['issued'=> 'DESC'])
            ->map(function ($row) {
                $row->license_no =  ' 【' . $row->issued .'】 '. $row->license_no;
                return $row;
            })
            ->combine('id', 'license_no')
            ->toArray();
        $list = [""=>"---"] + $list;
        $this->set(compact('list'));
        $this->render('/Element/selectlist', '');
    }

    /* 同一Customerのライセンスを一覧 for js*/
    public function getinfoview($license_id = null)
    {
        $this->autoRender = false;
        Configure::write('debug', 0);
        if (empty($license_id)) {
            return null;
        }
        $vw_license = $this->Licenses->get($license_id, [
            'contain' => ['Clients', 'Customers', 'Orders', 'Statuses', 'Conditions', 'Languages', 'Users'],
        ]);
        $this->set('vw_license', $vw_license);
        $this->render('/Element/vw_license', '');
    }

    public function doc($id = null)
    {
        $this->autoRender = false;

        $license = $this->Licenses->findById($id)
            ->contain(['Clients', 'Customers', 'Orders', 'Languages'])
            ->first()
            ->toArray();

        Configure::write('debug', 0);
        // $tempdoc = WWW_ROOT . DS . 'doc_template' . DS . $request['appform']['file'];
        $tempdoc = WWW_ROOT . DS . 'doc_template' . DS . 'sample_lic.docx';
        // $this->log($request);
        // return;

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($tempdoc);

        $t_date = strtotime($license['issued']);
        $templateProcessor->setValue('issued_yy', date('Y', $t_date));
        $templateProcessor->setValue('issued_mm', date('n', $t_date));
        $templateProcessor->setValue('issued_dd', date('j', $t_date));

        $templateProcessor->setValue('license_no', $license['license_no']);
        $templateProcessor->setValue('purchase_no', $license['order']['purchase_no']);
        $templateProcessor->setValue('relate_no', $license['relate_no']);
        $templateProcessor->setValue('client_name', $license['client']['client_name']);
        $templateProcessor->setValue('address', $license['customer']['address']);
        $templateProcessor->setValue('product_name', $license['product_name']);
        $templateProcessor->setValue('license_name', $license['license_name']);
        $templateProcessor->setValue('language_name', $license['language']['language_name']);
        $templateProcessor->setValue('license_qty', $license['license_qty']);
        $templateProcessor->setValue('license_key', $license['license_key']);

        $t_date = strtotime($license['startdate']);
        $templateProcessor->setValue('start_yy', date('Y', $t_date));
        $templateProcessor->setValue('start_mm', date('n', $t_date));
        $templateProcessor->setValue('start_dd', date('j', $t_date));

        $t_date = strtotime($license['enddate']);
        $templateProcessor->setValue('end_yy', date('Y', $t_date));
        $templateProcessor->setValue('end_mm', date('n', $t_date));
        $templateProcessor->setValue('end_dd', date('j', $t_date));

        $templateProcessor->setValue('direct', empty($license['client']['partner_id']) ? '■' : '□');
        $templateProcessor->setValue('resale', empty($license['client']['partner_id']) ? '□' : '■');
        $templateProcessor->setValue('notice', preg_replace("/\r\n|\r|\n/", "<w:br />", $license['notice']));
        //ダウンロード用
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . 'ライセンス証書' . '.docx"');
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
