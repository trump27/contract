<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Supportcontract Entity
 *
 * @property int $id
 * @property string $company_code
 * @property string $contractor
 * @property string $eu_company_code
 * @property string $eu_name
 * @property string $category
 * @property string $contract_no
 * @property string $contract_no2
 * @property string $product_name
 * @property \Cake\I18n\FrozenDate $contract_date
 * @property \Cake\I18n\FrozenDate $startdate
 * @property \Cake\I18n\FrozenDate $enddate
 * @property int $term
 * @property int $price
 * @property string $sales_dept
 * @property string $sales_staff
 * @property string $remarks
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Supportcontract extends Entity
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
        'company_code' => true,
        'contractor' => true,
        'eu_company_code' => true,
        'eu_name' => true,
        'category' => true,
        'contract_no' => true,
        'contract_no2' => true,
        'product_name' => true,
        'contract_date' => true,
        'startdate' => true,
        'enddate' => true,
        'term' => true,
        'price' => true,
        'sales_dept' => true,
        'sales_staff' => true,
        'remarks' => true,
        'created' => true,
        'modified' => true
    ];
}
