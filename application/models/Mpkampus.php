<?php 

    class Mpkampus extends CI_Model
    {
        public function pkampusLogin($nip)
        {
            $this->db->select('*');
            $this->db->from('pembimbing_kampus');
            $this->db->where('nip', $nip);
            $query = $this->db->get();
            $data = $query->result();
            return $data;
        }

        //mengambil foto pembimbing industri
        public function fotoPkampus($nip)
        {
            $this->db->select('foto');
            $this->db->from('pembimbing_kampus');
            $this->db->where('nip', $nip);
            $query = $this->db->get();
            $data = $query->result();
            return $data;
        }

        //function edit profile
        public function simpanProfile($data)
        {
            $nip = $data['nip'];
            unset($data['nip']);
            $this->db->where('nip', $nip);
            $this->db->update('pembimbing_kampus', $data);

            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('pesan_berhasil', 'Data berhasil disimpan!');
            } 
            else 
            {
                $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan!');
            }
        }

        public function tampildatabimbingan($id_pembimbing_kampus)
    {
        $this->db->select('bimbingan.*,mahasiswa.nama_lengkap')->from('pembimbing_mahasiswa')
            ->where('pembimbing_mahasiswa.nip', $id_pembimbing_kampus)
            ->join('pembimbing_kampus', 'pembimbing_mahasiswa.nip = pembimbing_kampus.nip')
            ->join('mahasiswa', 'pembimbing_mahasiswa.nim = mahasiswa.nim')
            ->join('bimbingan', 'pembimbing_mahasiswa.id_pembimbing_mahasiswa = bimbingan.id_pembimbing_mahasiswa');
        $query = $this->db->get();
        $data = $query->result();
        // var_dump($data);die;
        return $data;
    }

    public function editbimbingan($data)
    {
        // var_dump($data);die;
        $id_bimbingan = $data['id_bimbingan'];
        unset($data['id_bimbingan']);
        $this->db->where('id_bimbingan', $id_bimbingan);
        $this->db->update('bimbingan', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan_berhasil', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan!');
        }
        redirect('cpkampus/tampilbimbingan');
    }
    
    public function tampildatanilai($id_pembimbing_kampus)
        {
            $this->db->select('nilai.*,mahasiswa.nama_lengkap')->from('pembimbing_mahasiswa')
                ->where('pembimbing_mahasiswa.nip', $id_pembimbing_kampus)
                ->join('pembimbing_kampus', 'pembimbing_mahasiswa.nip = pembimbing_kampus.nip')
                ->join('mahasiswa', 'pembimbing_mahasiswa.nim = mahasiswa.nim')
                ->join('nilai', 'pembimbing_mahasiswa.id_pembimbing_mahasiswa = nilai.id_pembimbing_mahasiswa');
            $query = $this->db->get();
            $data = $query->result();
            // var_dump($data);die;
            return $data;
        }

        public function tampilNIM($nip)
        {
            $this->db->select('nim');
            $this->db->where('nip', $nip);
            $query = $this->db->get('pembimbing_mahasiswa');
            $listNIM = array();

            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $listNIM[] = $row;
                }
            }

            return $listNIM;
        }

        public function nimPM($nim)
        {
            return $this->db->get_where('pembimbing_mahasiswa', ['nim' => $nim])->row_array();
        }

        public function tambahdatanilai($data)
        {
            $db_debug = $this->db->db_debug;
            $this->db->db_debug = false;

            // cek apakah nim sudah diberi nilai sebelumnya
            $this->db->select('nilai_motivasi_industri, nilai_kreativitas_industri, nilai_disiplin_industri, nilai_pembahasan_industri');
            $this->db->where('id_pembimbing_mahasiswa', $data['id_pembimbing_mahasiswa']);
            $query = $this->db->get('nilai');
            $nilai = $query->row_array();

            if(empty($nilai)){
                $this->db->insert('nilai', $data);
            } else {
                $total = 0;
                foreach($nilai as $totalIndustri){
                    $total += $totalIndustri;
                }
                $total += $data['nilai_motivasi_kampus'] + $data['nilai_kreativitas_kampus'] + $data['nilai_disiplin_kampus'] + $data['nilai_pembahasan_kampus'];
                $rataRata = $total / 8;
                $bulatkan=round($rataRata);
                $data['total_nilai'] = $bulatkan;
                $this->db->where('id_pembimbing_mahasiswa', $data['id_pembimbing_mahasiswa']);
                $this->db->update('nilai', $data);
            }

            $error = $this->db->error();
            if (str_contains($error['message'], 'Duplicate entry')) {
                if (str_contains($error['message'], 'id_pembimbing_mahasiswa')) {
                    $message = 'NIM yang Anda masukkan sudah terdaftar!';
                    $this->session->set_flashdata('pesan_gagal', $message);
                    redirect('cpkampus/tampilnilai');
                }
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan_berhasil', "Berhasil Tambah Data!");
            } else {
                $this->session->set_flashdata('pesan_gagal', "Gagal Tambah Data!");
            }
            $this->db->db_debug = $db_debug;
            redirect('cpkampus/tampilnilai');
        }
    }
?>