<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableNilai extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('nilai', ['id' => 'id_nilai']);
        $table
            ->addColumn('nilai_motivasi_kampus', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_kreativitas_kampus', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_disiplin_kampus', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_pembahasan_kampus', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_motivasi_industri', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_kreativitas_industri', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_disiplin_industri', 'smallinteger', ['signed' => false])
            ->addColumn('nilai_pembahasan_industri', 'smallinteger', ['signed' => false])
            ->addColumn('total_nilai', 'smallinteger', ['signed' => false])
            ->addColumn('feedback_kampus', 'text')
            ->addColumn('feedback_industri', 'text')
            ->addColumn('id_pembimbing_mahasiswa', 'integer', ['signed' => false, 'null' => false])
            ->addForeignKey('id_pembimbing_mahasiswa', 'pembimbing_mahasiswa', 'id_pembimbing_mahasiswa')
            ->create();
    }
}
