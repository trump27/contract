<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

class GuidesController extends AppController
{

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow();
    }

    public function index()
    {

    }

    /**
     * Filter customers for ajax.
     * CustomerCell uses this action.
     */
    public function ajaxcustomers($client_name = null)
    {

        $this->autoRender = false;
        Configure::write('debug', 0);
        if (empty($client_name)) {
            return;
        }
        $this->loadModel('Customers');
        $list = $this->Customers->find()
            ->select(['Customers.id', 'Customers.customer_name', 'Customers.division', 'Clients.client_name'])
            ->contain(['Clients' => function ($q) use ($client_name) {
                return $q
                    ->select(['Clients.client_name'])
                    ->where(['client_name like' => "%$client_name%"]);
            }])
            ->limit(10)
            ->map(function ($row) {
                $row->customer_name = '【' . $row->client->client_name . '】 ' . $row->customer_name . '／' . $row->division;
                return $row;
            })
            ->combine('id', 'customer_name')
            ->toArray();
        $this->set(compact('list'));
        // $this->render('ajaxcustomers', '');
        $this->render('/Element/selectlist', '');

    }

    // クライアント名でパートナーも含むクライアントIDの配列を取得
    private function relateClients($client_name = null) {

        // if (empty($client_name)) {
        //     return [];
        // }
        $this->loadModel('Clients');
        $query = $this->Clients
            ->find()
            ->select(['id', 'partner_id'])
            ->where(['client_name LIKE' => "%$client_name%"])
            ->toArray();
        $id_list = [];
        foreach ($query as $key => $value) {
            $id_list[] = $value['id'];
            if (!empty($value['partner_id'])) $id_list[] = $value['partner_id'];
        }
        return $id_list;

    }

    public function ajaxorders($client_name = null)
    {

        $this->autoRender = false;
        Configure::write('debug', 0);
        if (empty($client_name)) {
            return;
        }

        $id_list = $this->relateClients($client_name);

        $this->loadModel('Orders');
        $list = $this->Orders->find()
            ->select(['Clients.id', 'Orders.company_code', 'Orders.id',
                    'company_name1', 'order_no', 'order_detail_no', 'order_date', 'product_name'])
            ->where(['status_id <> ' => 99])
            ->matching('Clients', function ($q) use ($id_list) {
                return $q
                    // ->select(['Clients.id', 'Clients.company_code'])
                    // ->where(['client_name like' => "%$client_name%"]);
                    ->where(['Clients.id IN' => $id_list]);
                })
            ->limit(20);

        $this->set(compact('list'));
        $this->render('ajaxorders', '');

    }

}
