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
        $this->load->view('mahasiswa/index');
    }
}