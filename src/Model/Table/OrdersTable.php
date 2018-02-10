<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \App\Model\Table\LicensehistoriesTable|\Cake\ORM\Association\HasMany $Licensehistories
 * @property \App\Model\Table\LicensesTable|\Cake\ORM\Association\HasMany $Licenses
 *
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('product_name');
        $this->setPrimaryKey('id');

        $this->hasMany('Licensehistories', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('Licenses', [
            'foreignKey' => 'order_id',
        ]);
        $this->hasMany('Clients', [
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
            ->scalar('company_code')
            ->maxLength('company_code', 20)
            ->requirePresence('company_code', 'create')
            ->notEmpty('company_code');

        $validator
            ->scalar('company_name1')
            ->maxLength('company_name1', 256)
            ->allowEmpty('company_name1');

        $validator
            ->scalar('company_name2')
            ->maxLength('company_name2', 256)
            ->allowEmpty('company_name2');

        $validator
            ->date('order_date')
            ->allowEmpty('order_date');

        $validator
            ->scalar('order_no')
            ->maxLength('order_no', 20)
            ->allowEmpty('order_no');

        $validator
            ->scalar('order_detail_no')
            ->maxLength('order_detail_no', 20)
            ->allowEmpty('order_detail_no');

        $validator
            ->scalar('purchase_no')
            ->maxLength('purchase_no', 20)
            ->allowEmpty('purchase_no');

        $validator
            ->date('delivery_date')
            ->allowEmpty('delivery_date');

        $validator
            ->date('sales_date')
            ->allowEmpty('sales_date');

        $validator
            ->scalar('status_msg')
            ->maxLength('status_msg', 64)
            ->allowEmpty('status_msg');

        $validator
            ->scalar('product_category')
            ->maxLength('product_category', 256)
            ->allowEmpty('product_category');

        $validator
            ->scalar('product_code')
            ->maxLength('product_code', 20)
            ->allowEmpty('product_code');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 256)
            ->allowEmpty('product_name');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

        $validator
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->scalar('sales_dept')
            ->maxLength('sales_dept', 256)
            ->allowEmpty('sales_dept');

        $validator
            ->scalar('sales_staff')
            ->maxLength('sales_staff', 128)
            ->allowEmpty('sales_staff');

        $validator
            ->scalar('file')
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
}
