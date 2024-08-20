<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UsersAndPasswordsAndUsersPasswordsTablesMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */

    public function change(): void
    {
        $users = $this->table('users', ['id' => 'u_id']);

        $users->addColumn('login', 'string', ['limit' => 40])
            ->addColumn('password', 'text')
            ->addTimestamps()
            ->addIndex(['login'], ['unique' => true]);

        $users->create();

        $passwords = $this->table('passwords', ['id' => 'p_id']);

        $passwords->addColumn('login', 'string', ['limit' => 40])
            ->addColumn('password', 'text')
            ->addTimestamps()
            ->addIndex(['login'], ['unique' => true]);

        $passwords->create();

        $users_passwords = $this->table('users_passwords');

        $users_passwords->addColumn('user_id', 'integer', ['null' => false, 'signed' => false])
            ->addColumn('password_id', 'integer', ['null' => false, 'signed' => false])
            ->addForeignKey('user_id', 'users', 'u_id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
            ->addForeignKey('password_id', 'passwords', 'p_id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
            ->addTimestamps();

        $users_passwords->create();
    }
}
