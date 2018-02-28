<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contract Entity
 *
 * @property int $id
 * @property int $client_id
 * @property int $customer_id
 * @property int $contractname_id
 * @property string $remarks
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
 * @property \App\Model\Entity\Contractname $contractname
 * @property \App\Model\Entity\User $user
 */
class Contract extends Entity
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
        'contractname_id' => true,
        'order_id' => true,
        'contract_date' => true,
        'remarks' => true,
        'status_id' => true,
        'file' => true,
        'dir' => true,
        'size' => true,
        'type' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'client' => true,
        'customer' => true,
        'contractname' => true,
        'user' => true
    ];
}
