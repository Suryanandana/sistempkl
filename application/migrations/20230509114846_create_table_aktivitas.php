<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableAktivitas extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('aktivitas', ['id' => 'id_aktivitas']);
        $table
            ->addColumn('nama_aktivitas', 'string', ['length' => 30, 'null' => false])
            ->addColumn('deskripsi_aktivitas', 'text',['null' => false])
            ->addColumn('dokumen', 'string', ['length' => 100, 'null' => false])
            ->addColumn('validasi_kampus', 'enum', [
                'values' => ['valid', 'tidak valid', 'belum tervalidasi'],
                'default' => 'belum tervalidasi'
            ])
            ->addColumn('validasi_industri', 'enum', [
                'values' => ['valid', 'tidak valid', 'belum tervalidasi'],
                'default' => 'belum tervalidasi'
            ])
            ->addColumn('id_pembimbing_mahasiswa', 'integer', ['signed' => false, 'null' => false])
            ->addForeignKey('id_pembimbing_mahasiswa', 'pembimbing_mahasiswa', 'id_pembimbing_mahasiswa')
            ->create();
    }
}
