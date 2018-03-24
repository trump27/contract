<?php
use Migrations\AbstractMigration;

class TypeLength256 extends AbstractMigration
{

    public function up()
    {

        $this->table('contracts')
            ->changeColumn('file', 'string', [
                'default' => null,
                'limit' => 512,
                'null' => true,
            ])
            ->changeColumn('dir', 'string', [
                'default' => null,
                'limit' => 512,
                'null' => true,
            ])
            ->changeColumn('type', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->update();


        $this->table('licenses')
            ->changeColumn('file', 'string', [
                'default' => null,
                'limit' => 512,
                'null' => true,
            ])
            ->changeColumn('dir', 'string', [
                'default' => null,
                'limit' => 512,
                'null' => true,
            ])
            ->changeColumn('type', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->update();

        $this->table('orders')
            ->changeColumn('file', 'string', [
                'default' => null,
                'limit' => 512,
                'null' => true,
            ])
            ->changeColumn('dir', 'string', [
                'default' => null,
                'limit' => 512,
                'null' => true,
            ])
            ->changeColumn('type', 'string', [
                'default' => null,
                'limit' => 256,
                'null' => true,
            ])
            ->update();

    }
}

