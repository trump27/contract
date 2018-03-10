<?php
use Migrations\AbstractMigration;

class Regenaratedump extends AbstractMigration
{

    public function up()
    {

        $this->table('licenses')
            ->changeColumn('license_no', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('relate_no', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('product_name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('license_name', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('license_key', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('file', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('dir', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->changeColumn('type', 'string', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->update();

        $this->table('clients')
            ->addIndex(
                [
                    'client_name',
                ],
                [
                    'name' => 'clients_client_name',
                ]
            )
            ->addIndex(
                [
                    'company_code',
                ],
                [
                    'name' => 'clients_company_code',
                ]
            )
            ->update();

        $this->table('contracts')
            ->addIndex(
                [
                    'status_id',
                ],
                [
                    'name' => 'contracts_status',
                ]
            )
            ->update();

        $this->table('customers')
            ->addIndex(
                [
                    'customer_name',
                ],
                [
                    'name' => 'customers_customer_name',
                ]
            )
            ->update();

        $this->table('licenses')
            ->addIndex(
                [
                    'issued',
                ],
                [
                    'name' => 'license_issued',
                ]
            )
            ->addIndex(
                [
                    'status_id',
                ],
                [
                    'name' => 'licenses_status',
                ]
            )
            ->update();

        $this->table('orders')
            ->addIndex(
                [
                    'order_date',
                    'company_code',
                ],
                [
                    'name' => 'orders_order_date',
                ]
            )
            ->addIndex(
                [
                    'status_id',
                ],
                [
                    'name' => 'orders_status',
                ]
            )
            ->update();

        $this->table('requests')
            ->addIndex(
                [
                    'status_id',
                ],
                [
                    'name' => 'requests_status',
                ]
            )
            ->update();

        $this->table('supportcontracts')
            ->addIndex(
                [
                    'company_code',
                ],
                [
                    'name' => 'supportcontracts_company_code',
                ]
            )
            ->addIndex(
                [
                    'eu_name',
                ],
                [
                    'name' => 'supportcontracts_eu_name',
                ]
            )
            ->update();
    }

    public function down()
    {

        $this->table('clients')
            ->removeIndexByName('clients_client_name')
            ->removeIndexByName('clients_company_code')
            ->update();

        $this->table('contracts')
            ->removeIndexByName('contracts_status')
            ->update();

        $this->table('customers')
            ->removeIndexByName('customers_customer_name')
            ->update();

        $this->table('licenses')
            ->removeIndexByName('license_issued')
            ->removeIndexByName('licenses_status')
            ->update();

        $this->table('licenses')
            ->changeColumn('license_no', 'string', [
                'default' => null,
                'length' => 20,
                'null' => true,
            ])
            ->changeColumn('relate_no', 'string', [
                'default' => null,
                'length' => 20,
                'null' => true,
            ])
            ->changeColumn('product_name', 'string', [
                'default' => null,
                'length' => 256,
                'null' => true,
            ])
            ->changeColumn('license_name', 'string', [
                'default' => null,
                'length' => 256,
                'null' => true,
            ])
            ->changeColumn('license_key', 'string', [
                'default' => null,
                'length' => 256,
                'null' => true,
            ])
            ->changeColumn('file', 'string', [
                'default' => null,
                'length' => 256,
                'null' => true,
            ])
            ->changeColumn('dir', 'string', [
                'default' => null,
                'length' => 256,
                'null' => true,
            ])
            ->changeColumn('type', 'string', [
                'default' => null,
                'length' => 64,
                'null' => true,
            ])
            ->update();

        $this->table('orders')
            ->removeIndexByName('orders_order_date')
            ->removeIndexByName('orders_status')
            ->update();

        $this->table('requests')
            ->removeIndexByName('requests_status')
            ->update();

        $this->table('supportcontracts')
            ->removeIndexByName('supportcontracts_company_code')
            ->removeIndexByName('supportcontracts_eu_name')
            ->update();
    }
}

