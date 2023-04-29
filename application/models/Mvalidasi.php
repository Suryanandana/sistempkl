<?php
	class Mvalidasi extends CI_Model
	{
		function validasi()
		{
			if ($this->session->userdata('username')=='')
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini harap melakukan login terlebih dahulu !');</script>";
				redirect('login','refresh');
			}
		}
	}
?>