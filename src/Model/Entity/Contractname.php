<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contractname Entity
 *
 * @property int $id
 * @property string $contract_name
 *
 * @property \App\Model\Entity\Contract[] $contracts
 */
class Contractname extends Entity
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
        'contract_name' => true,
        'contracts' => true
    ];
}
