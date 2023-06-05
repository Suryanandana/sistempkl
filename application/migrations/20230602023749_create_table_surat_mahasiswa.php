<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableSuratMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('surat_mahasiswa', ['id' => false]);
        $table->addColumn('jenis_surat', 'enum', [
            'values' => ['surat resmi pkl', 'surat bimbingan'],
            'null' => false
        ])->addColumn('dokumen', 'string', [
                'length' => 100,
                'null' => false
            ])
            ->addColumn('nim', 'string', ['length' => 10, 'null' => false])
            ->addForeignKey('nim', 'mahasiswa', 'nim')
            ->create();
    }
}