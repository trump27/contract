<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property int $client_id
 * @property \Cake\I18n\FrozenDate $order_date
 * @property string $product_code
 * @property string $order_name
 * @property int $quantity
 * @property int $amount_money
 * @property string $sales_dept
 * @property string $sales_staff
 * @property string $proof
 * @property string $dir
 * @property int $size
 * @property string $type
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Licensehistory[] $licensehistories
 * @property \App\Model\Entity\License[] $licenses
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
        'client_id' => true,
        'order_date' => true,
        'product_code' => true,
        'order_name' => true,
        'quantity' => true,
        'amount_money' => true,
        'sales_dept' => true,
        'sales_staff' => true,
        'proof' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'client' => true,
        'licensehistories' => true,
        'licenses' => true
    ];
}
