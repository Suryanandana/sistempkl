<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableBimbingan extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('bimbingan', ['id' => 'id_bimbingan']);
        $table
            ->addColumn('keterangan_bimbingan', 'text', ['null' => false])
            ->addColumn('tanggal_bimbingan', 'date', ['null' => false])
            ->addColumn('status', 'enum',[
                'values' => ['valid', 'tidak valid', 'belum tervalidasi'],
                'default' => 'belum tervalidasi'
            ])
            ->addColumn('id_pembimbing_mahasiswa', 'integer', ['signed' => false, 'null' => false])
            ->addForeignKey('id_pembimbing_mahasiswa', 'pembimbing_mahasiswa', 'id_pembimbing_mahasiswa')
            ->create();
    }
}
