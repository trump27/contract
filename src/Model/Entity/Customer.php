<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $customer_name
 * @property string $notice
 * @property string $admin_name1
 * @property string $div1
 * @property string $mail1
 * @property string $admin_name2
 * @property string $div2
 * @property string $mail2
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\Licensehistory[] $licensehistories
 * @property \App\Model\Entity\License[] $licenses
 */
class Customer extends Entity
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
        'customer_name' => true,
        'notice' => true,
        'admin_name1' => true,
        'div1' => true,
        'mail1' => true,
        'admin_name2' => true,
        'div2' => true,
        'mail2' => true,
        'client' => true,
        'licensehistories' => true,
        'licenses' => true
    ];
}
