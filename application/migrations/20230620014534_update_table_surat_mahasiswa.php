<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Table;

final class UpdateTableSuratMahasiswa extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('surat_mahasiswa');
        $table->addColumn('id_surat_mahasiswa', 'integer', [
                'after' => \Phinx\Db\Adapter\MysqlAdapter::FIRST,
                'signed' => false,
            ])
            ->changePrimaryKey('id_surat_mahasiswa')
            ->save();
    }

    public function down()
    {
        $table = $this->table('surat_mahasiswa');
        $table->removeColumn('id_surat_mahasiswa')->save();
    }
}
