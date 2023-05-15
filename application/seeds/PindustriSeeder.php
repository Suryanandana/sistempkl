<?php


use Phinx\Seed\AbstractSeed;

class PindustriSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [[
            "email" => "bruno@gmail.com",
            "nama_lengkap" => "Made Bruno"
        ]];
        $mhs = $this->table('pembimbing_industri');
        $mhs->insert($data)->saveData();
    }
}