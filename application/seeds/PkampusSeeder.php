<?php


use Phinx\Seed\AbstractSeed;

class PkampusSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [[
            "nip" => "111111111111111111",
            "email" => "sucipto@gmail.com",
            "nama_lengkap" => "Komang Sucipto"
        ]];
        $mhs = $this->table('pembimbing_kampus');
        $mhs->insert($data)->saveData();
    }
}