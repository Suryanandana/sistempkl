<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTablePembimbingIndustri extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Pembimbing_Industri', ['id' => 'id_pembimbing_industri']);
        $table
            ->addColumn('email', 'string', ['length' => 60, 'null' => false])
            ->addColumn('nama_lengkap', 'string', ['length' => 60, 'null' => false])
            ->addColumn('jabatan', 'string', ['length' => 30, 'null' => true])
            ->addColumn('no_hp', 'string', ['length' => 15, 'null' => true])
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
            ->addColumn('id_industri', 'integer', ['signed' => false])
            ->addIndex('nama_lengkap')
            ->addIndex('email', ['unique' => true])
            ->addForeignKey('id_industri', 'industri', 'id_industri')
            ->create();
    }
}
