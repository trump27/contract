<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * License Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $customer_id
 * @property int $order_id
 * @property int $status_id
 * @property \Cake\I18n\FrozenDate $issued
 * @property string $license_no
 * @property string $relate_no
 * @property string $product_name
 * @property string $license_name
 * @property int $language_id
 * @property int $license_qty
 * @property \Cake\I18n\FrozenDate $startdate
 * @property \Cake\I18n\FrozenDate $enddate
 * @property string $license_key
 * @property string $notice
 * @property string $file
 * @property string $dir
 * @property int $size
 * @property string $type
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\User $user
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
        'client_id' => true,
        'customer_id' => true,
        'order_id' => true,
        'status_id' => true,
        'issued' => true,
        'license_no' => true,
        'relate_no' => true,
        'product_name' => true,
        'license_name' => true,
        'language_id' => true,
        'license_qty' => true,
        'startdate' => true,
        'enddate' => true,
        'license_key' => true,
        'condition_id' => true,
        'notice' => true,
        'file' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'customer' => true,
        'order' => true,
        'status' => true,
        'language' => true,
        'user' => true
    ];
}
