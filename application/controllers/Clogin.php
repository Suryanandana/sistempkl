<?php
 	class Clogin extends CI_Controller
	{
		public function __construct()
		{
			parent :: __construct();
			$this->load->model('mlogin');
		}

		function proseslogin()
		{
			$this->mlogin->proseslogin();	
		}
		function logout() {
			$this->session->sess_destroy();
			redirect('login');
		}
    }
	
?>