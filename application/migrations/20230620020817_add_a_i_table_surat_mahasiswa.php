<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddAITableSuratMahasiswa extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('surat_mahasiswa');
        $table->changeColumn('id_surat_mahasiswa', 'integer', ['identity' => true])
            ->save();
    }

    public function down(): void
    {
        $table = $this->table('surat_mahasiswa');
        $table->changeColumn('id_surat_mahasiswa', 'integer', ['identity' => false])
            ->save();
    }
}
