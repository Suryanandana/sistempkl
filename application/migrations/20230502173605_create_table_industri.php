<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableIndustri extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Industri', ['id' => 'id_industri']);
        $table
            ->addColumn('nama', 'string', ['length' => 60, 'null' => false])
            ->addColumn('alamat', 'text', ['null' => false])
            ->addColumn('telp', 'string', ['length' => 15, 'null' => false])
            ->addIndex('nama')
            ->create();
    }
}
