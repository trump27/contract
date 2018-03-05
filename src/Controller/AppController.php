<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Core\Configure;
use Muffin\Footprint\Auth\FootprintAwareTrait;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    use FootprintAwareTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    // 'userModel' => $this->_userModel,
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password',
                    ],
                ],
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            // 未認証の場合、直前のページに戻します
            // 'unauthorizedRedirect' => $this->referer(),
            'authError' => false,
        ]);
        $this->Auth->allow(['display']);

    }

    public function customeroptions($client_id = null)
    {
        $this->loadModel('Customers');
        $this->autoRender = false;
        Configure::write('debug', 0);
        // $this->viewBuilder()->setLayout("");
        // $list = $this->Customers->find('list', ['keyField' => 'id', 'valueField' => 'customer_name'])
        //                   ->where(['client_id' => $client_id]);
        $list = $this->Customers->find()
            ->select(['Customers.id', 'Customers.customer_name', 'Customers.division'])
            ->where(['client_id' => $client_id])
            ->map(function ($row) {
                $row->customer_name = '【' . $row->customer_name . '】 ' . $row->division;
                return $row;
            })
            ->combine('id', 'customer_name')
            ->toArray();
        $this->set(compact('list'));
        // $this->render('/Customers/customeroptions', '');
        $this->render('/Element/selectlist', '');
    }

    // js用　order一覧をオプションで返す
    public function orderoptions($client_id = null, $mode=null)
    {
        $this->autoRender = false;
        Configure::write('debug', 0);
        if (empty($client_id )) return null;

        $this->loadModel('Clients');
        $this->loadModel('Orders');

        // パートナーのIDを取得 IN句で使用
        $subq = $this->Clients->findById($client_id)
            ->select(['Clients.id', 'Clients.partner_id'])
            ->first()
            ->toArray();
        $ids = empty($subq['partner_id']) ? [$client_id] : [$client_id, $subq['partner_id']];

        $list = $this->Orders->find()
            ->select(['Orders.id', 'order_date', 'Orders.company_name1', 'Orders.product_name', 'Orders.product_detail']);

        if ($mode <> 'edit') {
            // 編集時以外は未処理のみ表示
            $list->where(['Orders.status_id IS' => null])
            ->orWhere(['Orders.status_id <>' => 99]);
        }

        // $list->contain('Clients', function ($q) use ($client_id) {
        //         return $q
        //             ->where(['Clients.id' => $client_id]);
        //     })
        $list->matching('Clients', function ($q) use ($ids) {
                return $q
                    ->where(['Clients.id IN' => $ids]);
            });

        $data = $list->map(function ($row) {
                $row->product_name = $row->order_date . ' 【' . $row->company_name1 . '】 '
                    . mb_convert_kana($row->product_name,'aks') . '/'. mb_convert_kana(mb_substr($row->product_detail,0,20),'aks');
                return $row;
            })
            ->combine('id', 'product_name')
            ->toArray();

        // $this->log($data);
        $this->set('list', $data);
        $this->render('/Element/selectlist', '');

    }
}
