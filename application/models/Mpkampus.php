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
    }

?>