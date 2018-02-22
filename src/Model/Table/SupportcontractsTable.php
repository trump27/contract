<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Supportcontracts Model
 *
 * @method \App\Model\Entity\Supportcontract get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supportcontract newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Supportcontract[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supportcontract|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supportcontract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supportcontract[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supportcontract findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SupportcontractsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('supportcontracts');
        $this->setDisplayField('eu_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'bindingKey' => 'company_code', // リレーション先のカラム名
            'foreignKey' => 'eu_company_code', // FK
        ]);

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('company_code')
            ->allowEmpty('company_code');

        $validator
            ->scalar('contractor')
            ->allowEmpty('contractor');

        $validator
            ->scalar('eu_company_code')
            ->allowEmpty('eu_company_code');

        $validator
            ->scalar('eu_name')
            ->allowEmpty('eu_name');

        $validator
            ->scalar('category')
            ->allowEmpty('category');

        $validator
            ->scalar('contract_no')
            ->allowEmpty('contract_no');

        $validator
            ->scalar('contract_no2')
            ->allowEmpty('contract_no2');

        $validator
            ->scalar('product_name')
            ->allowEmpty('product_name');

        $validator
            ->date('contract_date')
            ->allowEmpty('contract_date');

        $validator
            ->date('startdate')
            ->allowEmpty('startdate');

        $validator
            ->date('enddate')
            ->allowEmpty('enddate');

        $validator
            ->integer('term')
            ->allowEmpty('term');

        $validator
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->scalar('sales_dept')
            ->allowEmpty('sales_dept');

        $validator
            ->scalar('sales_staff')
            ->allowEmpty('sales_staff');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        return $validator;
    }
}
