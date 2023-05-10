<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddUniqueFKToTableNilai extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('nilai');
        $table->addIndex('id_pembimbing_mahasiswa', ['unique' => true])->update();
    }
}
