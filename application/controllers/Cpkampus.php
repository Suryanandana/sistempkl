<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpkampus extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiPkampus();
    }

	public function index()
	{
		$data['content'] = $this->load->view('pkampus/dashboard', [], true);
        $this->load->view('pkampus/main', $data);
	}

    public function profile() 
    {
        $data['content'] = $this->load->view('pkampus/profile', [], true);
        $this->load->view('pkampus/main', $data);
    }
}