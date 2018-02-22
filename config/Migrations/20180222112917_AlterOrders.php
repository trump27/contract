<?php
use Migrations\AbstractMigration;

class AlterOrders extends AbstractMigration
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
        $table = $this->table('orders');
        $table->addColumn('orderym', 'string', [
            'default' => null,
            'limit' => 6,
            'null' => false,
        ]);
        $table->update();
    }
}
