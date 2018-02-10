<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\LicensehistoriesTable|\Cake\ORM\Association\HasMany $Licensehistories
 * @property \App\Model\Table\LicensesTable|\Cake\ORM\Association\HasMany $Licenses
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customers');
        $this->setDisplayField('customer_name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Licensehistories', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Licenses', [
            'foreignKey' => 'customer_id'
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
            ->scalar('customer_name')
            ->maxLength('customer_name', 128)
            ->requirePresence('customer_name', 'create')
            ->notEmpty('customer_name');

        $validator
            ->scalar('address')
            ->maxLength('address', 512)
            ->allowEmpty('address');

        $validator
            ->scalar('identity2')
            ->maxLength('identity2', 4)
            ->allowEmpty('identity2');

        $validator
            ->scalar('sales_dept')
            ->maxLength('sales_dept', 256)
            ->allowEmpty('sales_dept');

        $validator
            ->scalar('sales_staff')
            ->maxLength('sales_staff', 128)
            ->allowEmpty('sales_staff');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        $validator
            ->scalar('admin_name1')
            ->maxLength('admin_name1', 128)
            ->allowEmpty('admin_name1');

        $validator
            ->scalar('div1')
            ->maxLength('div1', 256)
            ->allowEmpty('div1');

        $validator
            ->scalar('mail1')
            ->maxLength('mail1', 256)
            ->allowEmpty('mail1');

        $validator
            ->scalar('admin_name2')
            ->maxLength('admin_name2', 128)
            ->allowEmpty('admin_name2');

        $validator
            ->scalar('div2')
            ->maxLength('div2', 256)
            ->allowEmpty('div2');

        $validator
            ->scalar('mail2')
            ->maxLength('mail2', 256)
            ->allowEmpty('mail2');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['client_id'], 'Clients'));

        return $rules;
    }
}
