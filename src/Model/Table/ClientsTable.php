<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\HasMany $Customers
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('client_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Customers', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Licenses', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Orders', [
            'bindingKey' => 'company_code', // リレーション先のカラム名
            'foreignKey' => 'company_code', // FK
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
            ->scalar('client_name')
            ->maxLength('client_name', 128)
            ->requirePresence('client_name', 'create')
            ->notEmpty('client_name');

        $validator
            ->scalar('company_code')
            ->maxLength('company_code', 20)
            ->allowEmpty('company_code');

        $validator
            ->scalar('identity1')
            ->maxLength('identity1', 4)
            ->allowEmpty('identity1');

        $validator
            ->scalar('partner_flag')
            ->allowEmpty('partner_flag');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        return $validator;
    }
}
