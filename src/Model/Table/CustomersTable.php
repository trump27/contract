<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
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
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Contracts', [
            'foreignKey' => 'customer_id',
        ]);
        $this->hasMany('Licensehistories', [
            'foreignKey' => 'customer_id',
        ]);
        $this->hasMany('Licenses', [
            'foreignKey' => 'customer_id',
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
            ->scalar('customer_name')
            ->maxLength('customer_name', 128)
            ->requirePresence('customer_name', 'create')
            ->notEmpty('customer_name');

        $validator
            ->scalar('division')
            ->maxLength('division', 256);

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    // Search
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->like('customer_name', [
                'before' => true,
                'after' => true,
            ])
            ->add('client_name', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    $client_name = $args['client_name'];
                    $query->matching('Clients', function ($q) use ($client_name) {
                        return $q->where(['Clients.client_name LIKE' => "%$client_name%"]);
                    });
                }]
            );

        return $searchManager;
    }

    public function beforeSave($event, $entity, $options)
    {

        if ($entity->isNew()) {

            // 最大値＋１をセットする
            $query = $this->find();
            $ret = $query->select(['max_id' => $query->func()->max('identity2')])
                ->where(['client_id' => $entity->client_id])
                ->first();
            $max_id = intval($ret->max_id);
            if (!$max_id) {
                $max_id = 1000;
            }
            $entity->set('identity2', ++$max_id);
        }
        // return false;
    }
}
