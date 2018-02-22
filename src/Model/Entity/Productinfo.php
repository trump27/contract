<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Productinfo Entity
 *
 * @property int $id
 * @property string $category
 * @property int $use_support
 * @property string $product_code
 * @property string $product_name
 * @property string $segment
 * @property int $price
 * @property string $remarks
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Productinfo extends Entity
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
        'category' => true,
        'use_support' => true,
        'product_code' => true,
        'product_name' => true,
        'segment' => true,
        'price' => true,
        'remarks' => true,
        'created' => true,
        'modified' => true
    ];
}
