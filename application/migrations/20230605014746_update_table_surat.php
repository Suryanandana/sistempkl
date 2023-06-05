<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateTableSurat extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('surat');
        $table->renameColumn('kode_surat', 'id_surat')->save();
        $table->changeColumn('id_surat', 'integer', ['signed' => false, 'identity' => true])->save();
    }
}