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
				if($session['status'] == "Pembimbing_Kampus") {
					redirect("Cpkampus");
				}
				if($session['status'] == "Pembimbing_Industri") {
					$this->db->select('id_pembimbing_industri');
					$this->db->from('pembimbing_industri');
					$this->db->where('email', $session['username']);
					$query = $this->db->get();
            		$data = $query->result();
					$this->session->set_userdata(["username" => $data[0]->id_pembimbing_industri]);
					redirect("Cpindustri");
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