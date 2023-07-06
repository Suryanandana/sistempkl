<?php
	class Mvalidasi extends CI_Model
	{
		function validasiAdmin()
		{
			if ($this->session->userdata('username')=='' OR $this->session->userdata('status') != "Admin")
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini harap melakukan login terlebih dahulu !');</script>";
				redirect('login','refresh');
			}
		}
		function validasiMahasiswa()
		{
			if ($this->session->userdata('username')=='' OR $this->session->userdata('status') != "Mahasiswa")
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini harap melakukan login terlebih dahulu !');</script>";
				redirect('login','refresh');
			}
		}
		function validasiPkampus()
		{
			if ($this->session->userdata('username')=='' OR $this->session->userdata('status') != "Pembimbing_Kampus")
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini harap melakukan login terlebih dahulu !');</script>";
				redirect('login','refresh');
			}
		}

		function validasiPindustri()
		{
			if ($this->session->userdata('username')=='' OR $this->session->userdata('status') != "Pembimbing_Industri")
			{
				echo "<script>alert ('Anda tidak dapat mengakses halaman ini harap melakukan login terlebih dahulu !');</script>";
				redirect('login','refresh');
			}
		}
	}
?>