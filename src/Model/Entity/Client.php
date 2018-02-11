<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Client Entity
 *
 * @property int $id
 * @property string $client_name
 * @property string $company_code
 * @property string $identity1
 * @property int $partner_flag
 * @property string $remarks
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Contract[] $contracts
 * @property \App\Model\Entity\Customer[] $customers
 * @property \App\Model\Entity\Licensehistory[] $licensehistories
 * @property \App\Model\Entity\License[] $licenses
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
        'company_code' => true,
        'identity1' => true,
        'partner_flag' => true,
        'remarks' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'contracts' => true,
        'customers' => true,
        'licensehistories' => true,
        'licenses' => true,
        'orders' => true
    ];
}
