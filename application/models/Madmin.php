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

	public function tampildatamahasiswa($batas, $page, $cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$this->db->limit($batas, $page);
		$query = $this->db->get('mahasiswa');
		return $query->result();
	}

	public function totalmahasiswa($cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$query = $this->db->get('mahasiswa');
		return $query->num_rows();
	}

	public function tambahmahasiswa($data)
	{
		// tulis nama tabel dan data yang dikirim lewat form
		$this->db->insert('mahasiswa', $data);
		// cek jika data berhasil disimpan atau jika gagal buatkan pesan
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Tambah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Tambah Data!");
		}
		redirect('cadmin/tampilmahasiswa');
	}

	public function hapusmahasiswa($id)
	{
		$this->db->where('nim', $id);
		$this->db->delete('mahasiswa');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Hapus Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Hapus Data!");
		}
		redirect('cadmin/tampilmahasiswa');
	}

	public function editmahasiswa($id, $data)
	{
		$this->db->where('nim', $id);
		$this->db->update('mahasiswa', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Ubah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Ubah Data!");
		}
		redirect('cadmin/tampilmahasiswa');
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

	public function tampilDataPkampus($batas, $page, $cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$this->db->limit($batas, $page);
		$query = $this->db->get('pembimbing_kampus');
		return $query->result();
	}

	public function totalPkampus($cari = "")
	{
		$this->db->like('nama_lengkap', $cari);
		$query = $this->db->get('pembimbing_kampus');
		return $query->num_rows();
	}

	public function tambahPkampus($data)
	{
		// tulis nama tabel dan data yang dikirim lewat form
		$this->db->insert('pembimbing_kampus', $data);
		// cek jika data berhasil disimpan atau jika gagal buatkan pesan
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Tambah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Tambah Data!");
		}
		redirect('cadmin/tampilPkampus');
	}

	public function hapusPkampus($id)
	{
		$this->db->where('nip', $id);
		$this->db->delete('pembimbing_kampus');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Hapus Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Hapus Data!");
		}
		redirect('cadmin/tampilPkampus');
	}

	public function editPkampus($id, $data)
	{
		$this->db->where('nip', $id);
		$this->db->update('pembimbing_kampus', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Ubah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Ubah Data!");
		}
		redirect('cadmin/tampilPkampus');
	}

	// Surat
	public function tampilSurat()
    {
        $data = $this->db->get('data_surat')->result();
        return $data;
    }

	public function tambahSuratPengantarPKL($data)
    {
        $this->db->insert('data_surat', $data);

        if ($this->db->affected_rows() > 0) 
		{
            $this->session->set_flashdata('pesan_berhasil', 'Data berhasil disimpan!');
        } 
		else 
		{
            $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan!');
        }

		redirect('cadmin/surat');
    }

	public function hapusSurat($id)
	{
		$this->db->where('jenis_surat', $id);
		$this->db->delete('data_surat');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Hapus Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Hapus Data!");
		}
		redirect('cadmin/surat');
	}

	// Pilih Pembimbing

	public function tampilpilihpembimbing()
    {
        $this->db->select('mahasiswa.nim, mahasiswa.nama_lengkap, pembimbing_kampus.nip, pembimbing_kampus.nama_lengkap AS nama_lengkap_kampus, pembimbing_industri.nama_lengkap AS nama_lengkap_industri, industri.nama, pembimbing_mahasiswa.id_pembimbing_mahasiswa');
        $this->db->from('pembimbing_mahasiswa');
        $this->db->join('mahasiswa', 'mahasiswa.nim = pembimbing_mahasiswa.nim');
        $this->db->join('pembimbing_kampus', 'pembimbing_mahasiswa.nip = pembimbing_kampus.nip');
        $this->db->join('pembimbing_industri', 'pembimbing_mahasiswa.id_pembimbing_industri = pembimbing_industri.id_pembimbing_industri');
        $this->db->join('industri', 'pembimbing_industri.id_industri = industri.id_industri');
        $query = $this->db->get();
        return $query->result();
    }

	public function tampilNIM() {
		$query = $this->db->get('mahasiswa');
		$listNIM = array();
	
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$listNIM[] = $row;
			}
		}
	
		return $listNIM;
	}

	public function tampilNIP() {
		$query = $this->db->get('pembimbing_kampus');
		$listNIP = array();
	
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$listNIP[] = $row;
			}
		}
	
		return $listNIP;
	}

	public function tampilIdPindustri() {
		$query = $this->db->get('pembimbing_industri');
		$listIdPindustri = array();
	
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$listIdPindustri[] = $row;
			}
		}
	
		return $listIdPindustri;
	}

	public function tambahPmahasiswa($data)
	{
		$db_debug = $this->db->db_debug;
            $this->db->db_debug = false;
		// tulis nama tabel dan data yang dikirim lewat form
		$this->db->insert('pembimbing_mahasiswa', $data);

		$error = $this->db->error();
                if(str_contains($error['message'], 'Duplicate entry')){
                    if(str_contains($error['message'], 'nim')){
                        $message = 'NIM yang anda registrasikan sudah terdaftar!';
						$this->session->set_flashdata('pesan_gagal', $message);
						redirect('cadmin/tampilpilihpembimbing');
                    }
                } 
				
		// cek jika data berhasil disimpan atau jika gagal buatkan pesan
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Tambah Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Tambah Data!");
		}
		$this->db->db_debug = $db_debug;
		redirect('cadmin/tampilpilihpembimbing');
	}
	public function hapusPmahasiswa($id)
	{
		$this->db->where('id_pembimbing_mahasiswa', $id);
		$this->db->delete('pembimbing_mahasiswa');
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('pesan_berhasil', "Berhasil Hapus Data!");
		} else {
			$this->session->set_flashdata('pesan_gagal', "Gagal Hapus Data!");
		}
		redirect('cadmin/tampilpilihpembimbing');
	}

	// surat resmi
	public function tampilMhsValid($batas, $page, $cari="", $jumlah = false)
    {
		$subSurat = $this->db->select('nim')
                            ->from('surat')
                            ->where('jenis_surat', 'surat pengajuan')
                            ->where('status', 'valid')
                            ->get_compiled_select();
		
		$subSuratMahasiswa = $this->db->select('nim')
                            ->from('surat_mahasiswa')
                            ->get_compiled_select();

        $this->db->distinct();
        $this->db->select('mahasiswa.*');
        $this->db->from('mahasiswa');
		$this->db->like('nama_lengkap', $cari);
        $this->db->join('surat', 'mahasiswa.nim = surat.nim');
        $this->db->where('(surat.jenis_surat = "surat pengantar" AND surat.status = "valid")');
		$this->db->where('mahasiswa.nim IN ('.$subSurat.')');
		$this->db->where('mahasiswa.nim NOT IN ('.$subSuratMahasiswa.')');
		if($jumlah){
			$query = $this->db->get();
			return $query->num_rows();
		} else {
			$this->db->limit($batas, $page);
			$query = $this->db->get();
			return $query->result();
		}
    }

	public function simpanSuratResmi($data)
    {
        $this->db->insert('surat_mahasiswa', $data);
        return $this->db->affected_rows();
    }
}