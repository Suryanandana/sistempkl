<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateFulltextTablePIndustri extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pembimbing_industri');
        $table->addIndex('nama_lengkap', ['type' => 'fulltext'])
              ->update();
    }
}
