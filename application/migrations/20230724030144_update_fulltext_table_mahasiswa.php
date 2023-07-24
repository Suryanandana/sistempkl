<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateFulltextTableMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('mahasiswa');
        $table->addIndex(['nama_lengkap'], ['type' => 'fulltext'])
              ->update();
    }
}
