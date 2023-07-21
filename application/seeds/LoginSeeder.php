<?php


use Phinx\Seed\AbstractSeed;

class LoginSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [[
            'username' => 'admin',
            'password' => '$2y$10$HoE126gY3Y2f46Mk1cwRX.7YDBQfUJuqimxb1jNl9q3ahAukG3edy',
            'status' => 'Admin'
        ],[
            'username' => '2115354001',
            'password' => '$2y$10$elMc.DjnIbAAFyaFXOzXxu4nflNxt8JaE2rYIkvu80nbNvG.QDrhe',
            'status' => 'Mahasiswa'
        ],[
            'username' => '111111111111111111',
            'password' => '$2y$10$5AjAzC5LNAciw63kr.wCKu4i/I5UUTMIlzHUqIAOMvLad/WTqnugK',
            'status' => 'Pembimbing_Kampus'
        ],[
            'username' => 'bruno@gmail.com',
            'password' => '$2y$10$LMI3W15rHGU1TY4h/R5a5u.7krp8PkkLv6BG./ml65RYNJ50/mSOC',
            'status' => 'Pembimbing_Industri'
        ]];
        $login = $this->table('login');
        $login->insert($data)->saveData();
    }
}