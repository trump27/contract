<?php
use Migrations\AbstractMigration;

class CreateSupportcontracts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('supportcontracts');
        $table->addColumn('company_code', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('contractor', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => false,
        ]);
        $table->addColumn('eu_company_code', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('eu_name', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => false,
        ]);
        $table->addColumn('category', 'string', [
            'default' => null,
            'limit' => 128,
            'null' => false,
        ]);
        $table->addColumn('contract_no', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('contract_no2', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false,
        ]);
        $table->addColumn('product_name', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => false,
        ]);
        $table->addColumn('contract_date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('startdate', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('enddate', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('term', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('price', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('sales_dept', 'string', [
            'default' => null,
            'limit' => 512,
            'null' => false,
        ]);
        $table->addColumn('sales_staff', 'string', [
            'default' => null,
            'limit' => 128,
            'null' => false,
        ]);
        $table->addColumn('remarks', 'text', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
