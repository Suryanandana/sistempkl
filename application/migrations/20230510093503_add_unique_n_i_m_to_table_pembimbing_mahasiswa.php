<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddUniqueNIMToTablePembimbingMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('pembimbing_mahasiswa');
        $table->addIndex('nim', ['unique' => true])->update();
    }
}
