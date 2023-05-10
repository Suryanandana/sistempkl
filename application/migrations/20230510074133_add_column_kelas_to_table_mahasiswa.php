<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
final class AddColumnKelasToTableMahasiswa extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('mahasiswa');
        $table->addColumn('kelas', 'char', [
            'length' => 2,
            'after' => 'nama_lengkap'
        ])->update();
    }
}
