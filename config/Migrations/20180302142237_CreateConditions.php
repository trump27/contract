<?php
use Migrations\AbstractMigration;

class CreateConditions extends AbstractMigration
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
        $table = $this->table('conditions');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 64,
            'null' => false,
        ]);
        $table->create();
    }
}
