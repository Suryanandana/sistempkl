<?php


use Phinx\Seed\AbstractSeed;

class IndustriSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [[
            'nama' => "google",
            'alamat' => "jl. Mukak Nuansa C4",
            'telp' => 911
        ]];
        $mhs = $this->table('industri');
        $mhs->insert($data)->saveData();
    }
}