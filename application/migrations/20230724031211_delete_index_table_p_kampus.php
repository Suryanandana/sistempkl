<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class DeleteIndexTablePKampus extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pembimbing_kampus');
        $table->removeIndex('nama_lengkap')
              ->update();
    }
}
