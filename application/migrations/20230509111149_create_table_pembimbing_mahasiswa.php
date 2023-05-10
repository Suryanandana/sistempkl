<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTablePembimbingMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pembimbing_mahasiswa', ['id' => 'id_pembimbing_mahasiswa']);
        $table
            ->addColumn('nim', 'string', ['length' => 10, 'null' => false])
            ->addColumn('nip', 'string', ['length' => 18, 'null' => false])
            ->addColumn('id_pembimbing_industri', 'integer', ['signed' => false, 'null' => false])
            ->addForeignKey('nim', 'mahasiswa', 'nim')
            ->addForeignKey('nip', 'pembimbing_kampus', 'nip')
            ->addForeignKey('id_pembimbing_industri', 'pembimbing_industri', 'id_pembimbing_industri')
            ->create();
    }
}
