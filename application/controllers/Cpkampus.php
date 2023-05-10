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
		$this->load->view('pkampus/index');		
	}
}