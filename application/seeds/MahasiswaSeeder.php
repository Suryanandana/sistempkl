<?php


use Phinx\Seed\AbstractSeed;

class MahasiswaSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [[
            "nim" => "2115354001",
            "email" => "budi@gmail.com",
            "nama_lengkap" => "Wayan Budi"
        ]];
        $mhs = $this->table('mahasiswa');
        $mhs->insert($data)->saveData();
    }
}