<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Database\Expression\IdentifierExpression;

/**
 * Clients Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\HasMany $Customers
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
        $this->hasMany('Licenses', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('Orders', [
            'bindingKey' => 'company_code', // リレーション先のカラム名
            'foreignKey' => 'company_code', // FK
        ]);
        $this->belongsTo('Partners', [      // 自身への参照
            'className' => 'Clients',
            'finder' => 'partner'
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

    // 汎用用リスト（パートナー名付き）
    public function findWithpartner(Query $query, array $options)
    {


        // $conc = $query->func()->concat([
        //         'Clients.client_name' => 'identifier',
        //         ' （',
        //         'Partners.client_name' => 'identifier',
        //         '）'
        //     ]);
        // $query
        //     ->select(['Clients.id', 'Clients.client_name', 'Partners.client_name'])
        //     // ->select(['name' => $conc])
        //     // ->select(['Clients.id', 'Clients.client_name', 'Partners.client_name'])
        //     ->contain('Partners')
        //     // ->func()->concat([
        //     //     'Clients.client_name' => 'identifier',
        //     //     '---'.
        //     //     'Clients.id' => 'identifier',
        //     // ]);
        //     // ->contain(['Partners' => ['fields' => ['id', 'client_name']]]);
        //     // ->combine('id', 'name')
        //     ->select(['name' => $conc])
        //     // ->map(function ($row) {
        //     //     // debug($row);
        //     //     $row->client_name = $row->client_name . empty($row->partner->client_name) ? '' : ' （' . $row->partner->client_name . '）';
        //     //     return $row;
        //     // })
        //     // ->combine('id', 'Clients.client_name');
        //     // ->toArray();
        //     ->formatResults(function (\Cake\Datasource\ResultSetInterface $results) {
        //         // debug($results);
        //         return $results->combine('id', 'name');//. 'client_name');
        //     });
            // debug($query->toArray());
// $query = $this->Attendees->find()->contain(['Users']);
// $lastModifedCase = $query->newExpr()->addCase($query->newExpr()
//         ->add(['Attendees.modified <' => 'Users.modified']), ['Users.modified', 'Attendees.modified'], 'datetime');
// $query->select(['Attendees.id', 'lastModified' => $lastModifedCase, 'Users.firstName', 'Users.lastName']);

        $query
            ->select(['Clients.id', 'Clients.client_name', 'Partners.client_name'])
            ->contain(['Partners']);
        $case = $query->newExpr()
            ->addCase(
                [$query->newExpr()->add(['Partners.client_name IS' => null])],
                ['', new IdentifierExpression('Partners.client_name')],
                // ['', 'Partners.client_name'],
                'string'
            );
        $conc = $query->func()->concat([
                'Clients.client_name' => 'identifier',
                ' /',
                'pname' => 'identifier',
            ]);
        $query
            ->select(['pname' => $case, 'name' => $conc]);
            // ->select(['pname' => $case]);
        $query
            // ->select(['name' => $conc])
            ->formatResults(function (\Cake\Datasource\ResultSetInterface $results) {
                // debug($results);
                return $results->combine('id', 'name');//. 'client_name');
            });
        // debug($query);
        // debug($query->toArray());
        return $query;
    }

    // Search
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->value('partner_flag')
            ->value('partner_id')
            ->like('client_name', [
                'before' => true,
                'after' => true,
            ]);
            // ->add('partner_name', 'Search.Callback', [
            //     'callback' => function ($query, $args, $filter) {
            //         $partner_name = $args['partner_name'];
            //         $query->matching('Partners', function ($q) use ($partner_name) {
            //             return $q->where(['Partners.client_name LIKE' => "%$partner_name%"]);
            //         });
            //     }]
            // );

        return $searchManager;
    }

    public function findPartner(Query $query, array $options)
    {
        return $query->select(['Partners.id', 'Partners.client_name'])
            ->where(['Partners.partner_flag' => 1]);
    }

    public function beforeSave($event, $entity, $options)
    {

        if ($entity->isNew()) {

            // 最大値＋１をセットする
            $query = $this->find();
            $ret = $query->select(['max_id' => $query->func()->max('identity1')])
                ->first();
            $max_id = intval($ret->max_id);
            if (!$max_id) {
                $max_id = 1000;
            }
            $entity->set('identity1', ++$max_id);
        }
        // return false;
    }
}
