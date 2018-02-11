<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $company_code
 * @property string $company_name1
 * @property string $company_name2
 * @property \Cake\I18n\FrozenDate $order_date
 * @property string $order_no
 * @property string $order_detail_no
 * @property string $purchase_no
 * @property \Cake\I18n\FrozenDate $delivery_date
 * @property \Cake\I18n\FrozenDate $sales_date
 * @property string $status_msg
 * @property string $product_category
 * @property string $product_code
 * @property string $product_name
 * @property int $quantity
 * @property int $price
 * @property string $sales_dept
 * @property string $sales_staff
 * @property string $product_detail
 * @property int $status_id
 * @property string $file
 * @property string $dir
 * @property int $size
 * @property string $type
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Licensehistory[] $licensehistories
 * @property \App\Model\Entity\License[] $licenses
 * @property \App\Model\Entity\Client $client
 */
class Order extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'company_code' => true,
        'company_name1' => true,
        'company_name2' => true,
        'order_date' => true,
        'order_no' => true,
        'order_detail_no' => true,
        'purchase_no' => true,
        'delivery_date' => true,
        'sales_date' => true,
        'status_msg' => true,
        'product_category' => true,
        'product_code' => true,
        'product_name' => true,
        'quantity' => true,
        'price' => true,
        'sales_dept' => true,
        'sales_staff' => true,
        'product_detail' => true,
        'status_id' => true,
        'file' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'user' => true,
        'licensehistories' => true,
        'licenses' => true,
        'client' => true
    ];
}
