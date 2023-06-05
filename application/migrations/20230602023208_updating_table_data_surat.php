<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdatingTableDataSurat extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('data_surat');
        $table->changeColumn('jenis_surat', 'enum', [
            'values' => ['surat pengajuan', 'surat pengantar'],
            'null' => false
        ])->save();
    }

    public function down(): void
    {
        $table = $this->table('data_surat');
        $table->changeColumn('jenis_surat', 'enum', [
            'values' => ['surat pengajuan', 'surat pengantar', 'surat resmi pkl', 'surat bimbingan'],
            'null' => false
        ])->save();
    }
}