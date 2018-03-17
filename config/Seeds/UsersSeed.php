<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'name' => 'admin',
                'password' => '$2y$10$2uzz1kfg5SqYyr9ToYw0LOFkBN6TRJ8AYupIV7sLXpC19QCAz.tki',
                'email' => 'admin@localhost.localhost',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
