<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateFulltextTablePKampus extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pembimbing_kampus');
        $table->addIndex(['nama_lengkap'], ['type' => 'fulltext'])
              ->update();
    }
}
