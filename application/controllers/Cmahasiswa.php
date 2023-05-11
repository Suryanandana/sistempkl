<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiadmin();
    }

    public function index()
    {
        // masukkan view dashboard ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/dashboard', [], true);
        // tampilkan view dashboard ke view main
        $this->load->view('mahasiswa/main', $data);
    }

    public function profile()
    {
        // masukkan view profile ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/profile', [], true);
        // tampilkan view profile ke view main
        $this->load->view('mahasiswa/main', $data);
    }

    public function form()
    {
        // masukkan view profile ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/form', [], true);
        // tampilkan view profile ke view main
        $this->load->view('mahasiswa/main', $data);
    }
}