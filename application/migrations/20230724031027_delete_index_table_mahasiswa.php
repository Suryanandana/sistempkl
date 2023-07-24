<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class DeleteIndexTableMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('mahasiswa');
        $table->removeIndex(['nama_lengkap'])
              ->update();
    }
}
