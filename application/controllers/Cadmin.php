<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasi();
    }

    public function index()
    {
        $this->load->view('admin/index');
    }
}