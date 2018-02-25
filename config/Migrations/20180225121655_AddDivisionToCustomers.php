<?php
use Migrations\AbstractMigration;

class AddDivisionToCustomers extends AbstractMigration
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
        $table = $this->table('customers');
        $table->addColumn('division', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => false,
        ]);
        $table->update();
    }
}
