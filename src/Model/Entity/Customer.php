<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property int $client_id
 * @property string $customer_name
 * @property string $address
 * @property string $identity2
 * @property string $sales_dept
 * @property string $sales_staff
 * @property string $remarks
 * @property string $admin_name1
 * @property string $div1
 * @property string $mail1
 * @property string $admin_name2
 * @property string $div2
 * @property string $mail2
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contract[] $contracts
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
        'division' => true,
        'address' => true,
        'identity2' => true,
        'sales_dept' => true,
        'sales_staff' => true,
        'remarks' => true,
        'admin_name1' => true,
        'div1' => true,
        'mail1' => true,
        'admin_name2' => true,
        'div2' => true,
        'mail2' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'user' => true,
        'contracts' => true,
        'licensehistories' => true,
        'licenses' => true
    ];
}
