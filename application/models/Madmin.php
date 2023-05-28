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