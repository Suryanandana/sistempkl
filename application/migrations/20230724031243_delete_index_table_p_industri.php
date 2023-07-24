<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class DeleteIndexTablePIndustri extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pembimbing_industri');
        $table->removeIndex('nama_lengkap')
              ->update();
    }
}
