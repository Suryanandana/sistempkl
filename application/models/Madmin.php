<?php
class Madmin extends CI_Model
{
	public function tampilDataIndustri($batas, $page, $cari = "")
	{
		$this->db->like('nama', $cari);
		$this->db->limit($batas, $page);
		$query = $this->db->get('industri');
		return $query->result();
	}

	public function totalIndustri($cari = "")
	{
		$this->db->like('nama', $cari);
		$query = $this->db->get('industri');
		return $query->num_rows();
	}

	public function tambahIndustri($data)
	{
		// tulis nama tabel dan data yang dikirim lewat form
		$this->db->insert('industri', $data);
		// cek jika data berhasil disimpan atau jika gagal buatkan pesan
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Tambah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Tambah Data!");
		}
		redirect('cadmin/tampilIndustri');
	}

	public function hapusIndustri($id)
	{
		$this->db->where('id_industri', $id);
		$this->db->delete('industri');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Hapus Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Hapus Data!");
		}
		redirect('cadmin/tampilIndustri');
	}

	public function editIndustri($id, $data)
	{
		$this->db->where('id_industri', $id);
		$this->db->update('industri', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Ubah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Ubah Data!");
		}
		redirect('cadmin/tampilIndustri');
	}

	// CRUD Master Mahasiswa
	public function tampilMaster($batas, $page, $cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$this->db->limit($batas, $page);
		$query = $this->db->get('master_mahasiswa');
		return $query->result();
	}

	public function totalMaster($cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$query = $this->db->get('master_mahasiswa');
		return $query->num_rows();
	}

	public function importData($import)
	{
		$this->db->trans_begin();
		$this->db->insert_batch("master_mahasiswa", $import);
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('pesan_gagal', "Gagal Import Data!");
			$this->db->trans_rollback();
		} else {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Import Data!");
			$this->db->trans_commit();
		}
		redirect('cadmin/tampilMaster');
	}

	public function tambahMaster($data)
	{
		// tulis nama tabel dan data yang dikirim lewat form
		$this->db->insert('master_mahasiswa', $data);
		// cek jika data berhasil disimpan atau jika gagal buatkan pesan
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Tambah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Tambah Data!");
		}
		redirect('cadmin/tampilMaster');
	}

	public function hapusMaster($id)
	{
		$this->db->where('nim', $id);
		$this->db->delete('master_mahasiswa');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Hapus Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Hapus Data!");
		}
		redirect('cadmin/tampilMaster');
	}

	public function editMaster($id, $data)
	{
		$this->db->where('nim', $id);
		$this->db->update('master_mahasiswa', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Ubah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Ubah Data!");
		}
		redirect('cadmin/tampilMaster');
	}


	//pembimbing industri
	public function tampilDataPembimbingIndustri($batas, $page, $cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$this->db->limit($batas, $page);
		$query = $this->db->get('pembimbing_industri');
		return $query->result();
	}

	public function totalPembimbingIndustri($cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$query = $this->db->get('pembimbing_industri');
		return $query->num_rows();
	}

	public function tambahPembimbingIndustri($data)
	{
		// tulis nama tabel dan data yang dikirim lewat form
		$this->db->insert('pembimbing_industri', $data);
		// cek jika data berhasil disimpan atau jika gagal buatkan pesan
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Tambah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Tambah Data!");
		}
		redirect('cadmin/tampilPembimbingIndustri');
	}

	public function hapusPembimbingIndustri($id)
	{
		$this->db->where('id_pembimbing_industri', $id);
		$this->db->delete('pembimbing_industri');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Hapus Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Hapus Data!");
		}
		redirect('cadmin/tampilPembimbingIndustri');
	}

	public function editPembimbingIndustri($id, $data)
	{
		$this->db->where('id_pembimbing_industri', $id);
		$this->db->update('pembimbing_industri', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Ubah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Ubah Data!");
		}
		redirect('cadmin/tampilPembimbingIndustri');
	}
}