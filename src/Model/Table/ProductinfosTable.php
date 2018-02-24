<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productinfos Model
 *
 * @method \App\Model\Entity\Productinfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Productinfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Productinfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Productinfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productinfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Productinfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Productinfo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductinfosTable extends Table
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

        $this->setTable('productinfos');
        $this->setDisplayField('product_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('category')
            ->maxLength('category', 128)
            ->allowEmpty('category');

        $validator
            ->integer('use_support')
            ->allowEmpty('use_support');

        $validator
            ->scalar('product_code')
            ->maxLength('product_code', 20)
            ->allowEmpty('product_code');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 512)
            ->allowEmpty('product_name');

        $validator
            ->scalar('segment')
            ->maxLength('segment', 20)
            ->allowEmpty('segment');

        $validator
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        return $validator;
    }
    // Search
    public function searchManager()
    {
        $searchManager = $this->behaviors()->Search->searchManager();
        $searchManager
            ->like('category', [
                'before' => true,
                'after' => true
            ])
            ->like('product_name', [
                'before' => true,
                'after' => true
            ]);

        return $searchManager;
    }

}
