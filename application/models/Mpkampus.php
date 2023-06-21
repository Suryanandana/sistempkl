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
    
    }


?>