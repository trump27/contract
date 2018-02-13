<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\HasMany $Customers
 * @property \App\Model\Table\LicensehistoriesTable|\Cake\ORM\Association\HasMany $Licensehistories
 * @property \App\Model\Table\LicensesTable|\Cake\ORM\Association\HasMany $Licenses
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Contracts', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Customers', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Licensehistories', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Licenses', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Orders', [
            'bindingKey' => 'company_code', // リレーション先のカラム名
            'foreignKey' => 'company_code', // FK
        ]);

        $this->addBehavior('Muffin/Footprint.Footprint', [
            'events' => [
                'Model.beforeSave' => [
                    'user_id' => 'always',
                ],
            ],
        ]);
        $this->addBehavior('Search.Search');

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
            ->notEmpty('company_code');

        $validator
            ->scalar('identity1')
            ->maxLength('identity1', 4)
            ->allowEmpty('identity1');

        $validator
            ->integer('partner_flag');
            // ->allowEmpty('partner_flag');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->isUnique(['company_code']));

        return $rules;
    }

    // Orders用リスト
    public function findOrderlist(Query $query, array $options)
    {
        // return $query
        //     ->select(['code', 'client_name']);
        $query->formatResults(function (\Cake\Datasource\ResultSetInterface $results) {
            return $results->combine('company_code', 'client_name');
        });
        return $query;
    }

    // Search
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->like('client_name', [
                'before' => true,
                'after' => true
            ]);

        return $searchManager;
    }
}
