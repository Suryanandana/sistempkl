<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableLogin extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Login', ['id' => false, 'primary_key' => 'username']);
        $table->addColumn('username', 'string', ['length' => 60])
            ->addColumn('password', 'string', ['length' => 100, 'null' => false])
            ->addColumn('level', 'enum', [
                'values' => ['Mahasiswa', 'Admin', 'Pembimbing_Kampus', 'Pembimbing_Industri'],
                'default' => 'Mahasiswa'
            ])
            ->create();
    }

}
