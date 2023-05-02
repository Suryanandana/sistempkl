<?php
	class Mlogin extends CI_Model
	{

		function proseslogin()
		{
			$username=$this->input->post('Username');
			$password=$this->input->post('Password');
			
			$sql="select * from login where Username='$username' AND Password='$password' AND status='Admin'";
			$query=$this->db->query($sql);	
			if ($query->num_rows()>0)
			{
				//ada data	
				$data=$query->row();
				// ambil levelnya untuk di validasi
				$session=(array)$data;

				$this->session->set_userdata($session);				
				echo "<script>alert('berhasil login!')
				window.location.replace('../admin')</script>";
				
			}
			else
			{
				//tidak ada data	
				$this->session->set_flashdata('login_gagal','Login gagal! Username atau Password salah!');
				redirect('login');
			}
		}
	}
?>