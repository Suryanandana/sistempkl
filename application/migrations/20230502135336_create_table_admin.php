<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableAdmin extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Admin', ['id' => 'id_admin']);
        $table->addColumn('email', 'string', ['length' => 60])
            ->addColumn('nama', 'string', ['length' => 60, 'null' => false])
            ->addIndex('email', ['unique' => true])
            ->create();
    }
}
