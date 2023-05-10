<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use \Phinx\Util\Literal;

final class CreateTableMasterMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Master_Mahasiswa', ['id' => false, 'primary_key' => 'nim']);
        $table
            ->addColumn('nim', 'string', ['length' => 10])
            ->addColumn('nama_lengkap', 'string', ['length' => 60])
            ->addColumn('jurusan', 'string', ['length' => 30])
            ->addColumn('prodi', 'string', ['length' => 30])
            ->addColumn('tahun_masuk', Literal::from('year'))
            ->addColumn('jenis_kelamin', 'enum', [
                'values' => ['Laki-laki', 'Perempuan']
            ])
            ->addColumn('tempat_lahir', 'string', ['length' => 30])
            ->addColumn('tanggal_lahir', 'date')
            ->addColumn('alamat', 'text')
            ->addColumn('agama', 'enum', [
                'values' => ['Hindu', 'Islam', 'Katolik', 'Protestan', 'Budha', 'Konghucu']
            ])
            ->addIndex('nama_lengkap')
            ->create();
    }
}