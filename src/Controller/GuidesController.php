<?php
namespace App\Controller;

use App\Controller\AppController;

class GuidesController extends AppController
{
    public function index()
    {
        // $this->loadModel('Customers');
        // $customers = $this->Customers->find()
        //     // ->select(['Customers.id', 'Customers.customer_name', 'Clients.id', 'Clients.client_name'])
        //     ->select(['Customers.id', 'Customers.customer_name', 'Clients.client_name'])
        //     ->limit(10)
        //     // ->order(['Contracts.modified' => 'DESC'])
        //     ->contain(['Clients'])

    }


    /**
     * Filter customers for ajax.
     * CustomerCell uses this action.
     */
    public function ajaxcustomers($client_name=null)
    {

        $this->autoRender = false;
        if (empty($client_name)) {
            return;
        }
        $this->loadModel('Customers');
        $list = $this->Customers->find()
            ->select(['Customers.id', 'Customers.customer_name', 'Clients.client_name'])
            ->contain(['Clients' => function($q) use ($client_name) {
                return $q
                    ->select(['Clients.client_name'])
                    ->where(['client_name like' => "%$client_name%"]);
            }])
            ->limit(10)
            ->map(function ($row) {
                $row->customer_name = '【'.$row->client->client_name . '】 ' . $row->customer_name;
                return $row;
            })
            ->combine('id', 'customer_name')
            ->toArray();
        $this->set(compact('list'));
        $this->render('ajaxcustomers', '');

    }


}
