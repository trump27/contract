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
 * @property string $partner_flag
 * @property string $remarks
 *
 * @property \App\Model\Entity\Customer[] $customers
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
        'customers' => true
    ];
}
