<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableNilai extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('nilai', ['id' => 'id_nilai']);
        $table
            ->addColumn('nilai_kampus', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_industri', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_total', 'smallinteger', ['signed' => false])
            ->addColumn('feedback_kampus', 'text',)
            ->addColumn('feedback_industri', 'text',)
            ->addColumn('id_pembimbing_mahasiswa', 'integer', ['signed' => false, 'null' => false])
            ->addForeignKey('id_pembimbing_mahasiswa', 'pembimbing_mahasiswa', 'id_pembimbing_mahasiswa')
            ->create();
    }
}
