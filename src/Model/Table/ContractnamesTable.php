<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contractnames Model
 *
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 *
 * @method \App\Model\Entity\Contractname get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contractname newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contractname[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contractname|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contractname patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contractname[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contractname findOrCreate($search, callable $callback = null, $options = [])
 */
class ContractnamesTable extends Table
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

        $this->setTable('contractnames');
        $this->setDisplayField('contract_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Contracts', [
            'foreignKey' => 'contractname_id'
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
            ->scalar('contract_name')
            ->maxLength('contract_name', 256)
            ->allowEmpty('contract_name');

        return $validator;
    }
}