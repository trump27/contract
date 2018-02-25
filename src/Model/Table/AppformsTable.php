<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appforms Model
 *
 * @method \App\Model\Entity\Appform get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appform newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Appform[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appform|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appform patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appform[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appform findOrCreate($search, callable $callback = null, $options = [])
 */
class AppformsTable extends Table
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

        $this->setTable('appforms');
        $this->setDisplayField('form_name');
        $this->setPrimaryKey('id');
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
            ->scalar('form_name')
            ->maxLength('form_name', 256)
            ->allowEmpty('form_name');

        $validator
            ->scalar('file')
            ->maxLength('file', 256)
            ->allowEmpty('file');

        $validator
            ->scalar('dir')
            ->maxLength('dir', 256)
            ->allowEmpty('dir');

        return $validator;
    }
}
