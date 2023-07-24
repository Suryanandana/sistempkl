<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class DeleteIndexTableMMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('master_mahasiswa');
        $table->removeIndex('nama_lengkap')
              ->update();
    }
}
