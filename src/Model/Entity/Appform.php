<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Appform Entity
 *
 * @property int $id
 * @property string $form_name
 * @property string $file
 * @property string $dir
 */
class Appform extends Entity
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
        'form_name' => true,
        'file' => true,
        'dir' => true
    ];
}
