<?php


use Phinx\Seed\AbstractSeed;

class LoginSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [[
            'username' => 'admin',
            'password' => 'admin123',
            'status' => 'Admin'
        ],[
            'username' => '2115354001',
            'password' => 'budi123',
            'status' => 'Mahasiswa'
        ],[
            'username' => '111111111111111111',
            'password' => 'sucipto123',
            'status' => 'Pembimbing_Kampus'
        ],[
            'username' => 'bruno@gmail.com',
            'password' => 'bruno123',
            'status' => 'Pembimbing_Industri'
        ]];
        $login = $this->table('login');
        $login->insert($data)->saveData();
    }
}