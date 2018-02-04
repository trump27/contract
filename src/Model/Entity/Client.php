<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $client_name
 * @property string $sales_dept
 * @property string $sales_staff
 * @property string $notice
 *
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Order[] $orders
 */
class Client extends Entity
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
        'client_name' => true,
        'sales_dept' => true,
        'sales_staff' => true,
        'notice' => true,
        'customers' => true,
        'orders' => true
    ];
}
