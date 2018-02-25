<?php
use Migrations\AbstractMigration;

class CreateAppforms extends AbstractMigration
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
        $table = $this->table('appforms');
        $table->addColumn('form_name', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => false,
        ]);
        $table->addColumn('file', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => false,
        ]);
        $table->addColumn('dir', 'string', [
            'default' => null,
            'limit' => 256,
            'null' => false,
        ]);
        $table->create();
    }
}
