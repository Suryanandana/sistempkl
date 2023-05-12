<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpindustri extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiPindustri();
    }

	public function index()
	{
        //mengirim view dashboard ke dalam variabel data ['conten']
		$data['content'] = $this->load->view('pindustri/dashboard', [], true);	
        //menampilkan view dashboard ke view admin
        $this->load->view('pindustri/main', $data);
	}

    public function profile()
    {
        $data['content'] = $this->load->view('pindustri/profile', [], true);
        $this->load->view('pindustri/main', $data);
    }
}