<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $customer_id
 * @property int $appform_id
 * @property int $status_id
 * @property string $product_name
 * @property string $license_name
 * @property int $language_id
 * @property int $license_qty
 * @property \Cake\I18n\FrozenDate $license_date
 * @property \Cake\I18n\FrozenDate $startsupp_date
 * @property string $notice
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Appform $appform
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\User $user
 */
class Request extends Entity
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
        'appform_id' => true,
        'status_id' => true,
        'product_name' => true,
        'license_name' => true,
        'language_id' => true,
        'license_qty' => true,
        'license_date' => true,
        'startsupp_date' => true,
        'notice' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'customer' => true,
        'appform' => true,
        'status' => true,
        'language' => true,
        'user' => true
    ];
}
