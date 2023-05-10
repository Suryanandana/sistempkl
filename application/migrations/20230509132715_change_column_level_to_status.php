<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class ChangeColumnLevelToStatus extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table('login');
        $table->renameColumn('level', 'status')->save();
    }

    public function down(): void
    {
        $table = $this->table('login');
        $table->renameColumn('status', 'level')->save();
    }
}
