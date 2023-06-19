<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateTableAktivitasPKL extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('aktivitas');
        $table->addColumn('tanggal_aktivitas', 'date', ['after' => 'deskripsi_aktivitas'])->save();
    }
}