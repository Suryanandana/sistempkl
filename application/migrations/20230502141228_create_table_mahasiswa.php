<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Mahasiswa', ['id' => false, 'primary_key' => 'nim']);
        $table
            ->addColumn('nim', 'string', ['length' => 10])
            ->addColumn('email', 'string', ['length' => 60])
            ->addColumn('no_hp', 'string', ['length' => 15, 'null' => true])
            ->addColumn('nama_lengkap', 'string', ['length' => 60])
            ->addColumn('jenis_kelamin', 'enum', [
                'null' => true,
                'values' => ['Laki-laki', 'Perempuan']
            ])
            ->addColumn('tempat_lahir', 'string', ['length' => 30, 'null' => true])
            ->addColumn('tanggal_lahir', 'date', ['null' => true])
            ->addColumn('alamat', 'text', ['null'=>true])
            ->addColumn('agama', 'enum', [
                'values' => ['Hindu', 'Islam', 'Katolik', 'Protestan', 'Budha', 'Konghucu'],
                'null' => true
            ])
            ->addColumn('foto', 'string', ['length' => 100, 'null' => true])
            ->addIndex('nama_lengkap')
            ->addIndex('email', ['unique' => true])
            ->create();

    }
}
