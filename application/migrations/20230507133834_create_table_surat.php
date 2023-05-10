<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableSurat extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Surat', ['id' => false, 'primary_key' => 'kode_surat']);
        $table
            ->addColumn('kode_surat', 'string', ['length' => 20, 'null' => false])
            ->addColumn('nim', 'string', ['length' => 10, 'null' => false])
            ->addColumn('jenis_surat', 'enum', [
                'values' => ['surat pengajuan', 'surat pengantar', 'surat resmi pkl', 'surat bimbingan'],
                'null' => false
            ])
            ->addColumn('dokumen', 'string', ['length' => 100, 'null' => false])
            ->addColumn('status', 'enum', [
                'values' => ['valid', 'tidak valid', 'belum tervalidasi'],
                'default' => 'belum tervalidasi'
            ])
            ->addForeignKey('nim','Mahasiswa','nim')
            ->create();
    }
}
