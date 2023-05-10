<?php
	class Mlogin extends CI_Model
	{

		function proseslogin()
		{
			$username=$this->input->post('Username');
			$password=$this->input->post('Password');
			
			$sql="select * from login where Username='$username' AND Password='$password'";
			$query=$this->db->query($sql);	
			if ($query->num_rows()>0)
			{
				//ada data	
				$data=$query->row();
				// buat session
				$session=(array)$data;
				// ambil levelnya untuk di validasi
				$this->session->set_userdata($session);
				// jika level yang mencoba login adalah admin
				if($session['status'] == "Admin") {
					redirect("Cadmin");
				}
				// jika level yang mencoba login adalah mahasiswa
				if($session['status'] == "Mahasiswa") {
					redirect("Cmahasiswa");
				}
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