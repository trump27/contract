<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contracts Model
 *
 * @property \App\Model\Table\ClientsTable|\Cake\ORM\Association\BelongsTo $Clients
 * @property \App\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \App\Model\Table\ContractnamesTable|\Cake\ORM\Association\BelongsTo $Contractnames
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Contract get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contract newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contract[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contract|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contract patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contract[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contract findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ContractsTable extends Table
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

        $this->setTable('contracts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
        ]);
        $this->belongsTo('Contractnames', [
            'foreignKey' => 'contractname_id',
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
                // 'path' => 'webroot{DS}files{DS}{model}{DS}{field}{DS}',
                'path' => 'webroot{DS}files{DS}{model}{DS}{field}{DS}{day}{time}{DS}',
                'nameCallback' => function ($data, $settings) {
                    return urlencode($data['name']);
                },
                'keepFilesOnDelete' => false
            ],
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
            ->scalar('remarks')
            ->allowEmpty('remarks');

        $validator
        // ->scalar('file')
        ->maxLength('file', 256)
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
        $rules->add($rules->existsIn(['contractname_id'], 'Contractnames'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
