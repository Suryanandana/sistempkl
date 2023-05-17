<?php
	class Mpindustri extends CI_Model
	{
        public function pindustriLogin($id_pembimbing_industri)
        {
            $this->db->select('*');
            $this->db->from('pembimbing_industri');
            $this->db->where('id_pembimbing_industri', $id_pembimbing_industri);
            $query = $this->db->get();
            $data = $query->result();
            return $data;  
        }

        public function fotoPindustri($id_pembimbing_industri)
        {
            $this->db->select('foto');
            $this->db->from('pembimbing_industri');
            $this->db->where('id_pembimbing_industri', $id_pembimbing_industri);
            $query = $this->db->get();
            $data = $query->result();
            return $data;
        }
        
        public function simpanProfile($data)
        {
            $id_pembimbing_industri = $data['id_pembimbing_industri'];
            unset($data['id_pembimbing_industri']);
            $this->db->where('id_pembimbing_industri', $id_pembimbing_industri);
            $this->db->update('pembimbing_industri', $data);
            
            if($this->db->affected_rows() > 0)
            {
                $this->session->set_flashdata('pesan_berhasil', 'Data berhasil disimpan!');
            }else 
            {
                $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan!');
            }
        }
    }