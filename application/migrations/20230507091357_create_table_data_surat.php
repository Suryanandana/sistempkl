<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableDataSurat extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Data_Surat', ['id' => false]);
        $table
            ->addColumn('jenis_surat', 'enum', [
            'values' => ['surat pengajuan', 'surat pengantar', 'surat resmi pkl', 'surat bimbingan'],
            'null' => false])
            ->addColumn('dokumen', 'string', [
                'length' => 100, 'null' => false
            ])
            ->addIndex('jenis_surat', ['unique' => true])
            ->create();
    }
}
