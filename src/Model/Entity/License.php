<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * License Entity
 *
 * @property int $id
 * @property string $license_no
 * @property \Cake\I18n\FrozenDate $issued
 * @property int $status_id
 * @property int $customer_id
 * @property int $order_id
 * @property string $license_name
 * @property int $license_qty
 * @property \Cake\I18n\FrozenDate $startdate
 * @property \Cake\I18n\FrozenDate $enddate
 * @property string $notice
 * @property string $application
 * @property string $dir
 * @property int $size
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Order $order
 */
class License extends Entity
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
        'license_no' => true,
        'issued' => true,
        'status_id' => true,
        'customer_id' => true,
        'order_id' => true,
        'license_name' => true,
        'license_qty' => true,
        'startdate' => true,
        'enddate' => true,
        'notice' => true,
        'application' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'customer' => true,
        'order' => true
    ];
}
