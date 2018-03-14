<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Licenses Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\OrdersTable|\Cake\ORM\Association\BelongsTo $Orders
 * @property \App\Model\Table\StatusesTable|\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\LanguagesTable|\Cake\ORM\Association\BelongsTo $Languages
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\License get($primaryKey, $options = [])
 * @method \App\Model\Entity\License newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\License[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\License|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\License patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\License[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\License findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LicensesTable extends Table
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

        $this->setTable('licenses');
        $this->setDisplayField('license_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->belongsTo('Conditions', [
            'foreignKey' => 'condition_id',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->addBehavior('Muffin/Footprint.Footprint', [
            'events' => [
                'Model.beforeSave' => [
                    'user_id' => 'always',
                ],
            ],
        ]);
        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'file' => [
                'path' => 'webroot{DS}files{DS}{model}{DS}{field}{DS}',
                // 'nameCallback' => function ($data, $settings) {
                //     return urlencode($data['name']);
                // },
                'keepFilesOnDelete' => false,
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
            ->date('issued');
        // ->allowEmpty('issued');

        $validator
            ->scalar('license_no')
            ->maxLength('license_no', 20);
        // ->allowEmpty('license_no');

        $validator
            ->scalar('relate_no')
            ->maxLength('relate_no', 20)
            ->allowEmpty('relate_no');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 256);
        // ->allowEmpty('product_name');

        $validator
            ->scalar('license_name')
            ->maxLength('license_name', 256);
        // ->allowEmpty('license_name');

        $validator
            ->integer('license_qty');
        // ->allowEmpty('license_qty');

        $validator
            ->date('startdate');
        // ->allowEmpty('startdate');

        $validator
            ->date('enddate');
        // ->allowEmpty('enddate');

        $validator
            ->scalar('license_key')
            ->maxLength('license_key', 256)
            ->allowEmpty('license_key');

        $validator
            ->scalar('notice')
            ->allowEmpty('notice');

        $validator
            // ->scalar('file')
            ->maxLength('file', 512)
            ->allowEmpty('file');

        $validator
            ->scalar('dir')
            ->maxLength('dir', 256)
            ->allowEmpty('dir');

        $validator
            ->integer('size')
            ->allowEmpty('size');

        $validator
            ->scalar('type')
            ->maxLength('type', 64)
            ->allowEmpty('type');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['status_id'], 'Statuses'));
        $rules->add($rules->existsIn(['condition_id'], 'Conditions'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

    // Search
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->value('status_id')
            ->value('condition_id')
            ->like('license_no', [
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
            )
            ->add('customer_name', 'Search.Callback', [
                'callback' => function ($query, $args, $filter) {
                    $customer_name = $args['customer_name'];
                    $query->matching('Customers', function ($q) use ($customer_name) {
                        return $q->where(['Customers.customer_name LIKE' => "%$customer_name%"]);
                    });
                }]
            );

        return $searchManager;
    }

}
