<?php
	class Mvalidasi extends CI_Model
	{
		function validasiAdmin()
		{
			if ($this->session->userdata('username')=='' AND $this->session->userdata('status') != "Admin")
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini harap melakukan login terlebih dahulu !');</script>";
				redirect('login','refresh');
			}
		}
	}
?>