<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateFulltextTableMMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('master_mahasiswa');
        $table->addIndex(['nama_lengkap'], ['type' => 'fulltext'])
              ->update();
    }
}
