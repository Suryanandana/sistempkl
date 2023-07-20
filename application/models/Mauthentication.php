<?php
class Mauthentication extends CI_Model
{
	function prosesLupaPassword($username)
	{
		$query = $this->db->select('*')->from('login')
			->where('username', $username)
			->get();
		if ($query->num_rows() > 0) {
			//ada data	
			$data = $query->row();
			if ($data->status == "Pembimbing_Kampus") {
                $query = $this->db->select('email')->from('pembimbing_kampus')->where('username', $username)->get();
                $email = $query->row();
			}
			if ($data->status == "Pembimbing_Industri") {
                $email = $username;
			}
			if ($data->status == "Mahasiswa") {
				$query = $this->db->select('email')->from('mahasiswa')->where('nim', $username)->get();
                $email = $query->row();
			}
			return $email->email;
		} else {
			//tidak ada data	
			$this->session->set_flashdata('reset_gagal', 'Username yang anda masukkan tidak terdaftar');
        	redirect('lupa-password');
		}
	}

	public function prosesUbahPassword($data)
	{
		$this->db->where('username', $data['username']);
		$this->db->update('login', $data);
		$this->session->set_flashdata('login_berhasil', 'Password berhasil diubah, silahkan login kembali');
		redirect('login');
	}
}
?>