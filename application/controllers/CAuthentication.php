<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cauthentication extends CI_Controller
{
    public function tampilLogin()
    {
        $this->load->view('authentication/login');
    }

    public function tampilRegister()
    {
        $this->load->view('authentication/register');
    }
}