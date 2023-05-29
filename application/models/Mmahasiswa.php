<?php
class Mmahasiswa extends CI_Model
{
    public function mahasiswaLogin($nim)
    {
        // select * from mahasiswa where nim = nim yang login
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $nim);
        // eksekusi query
        $query = $this->db->get();
        $data = $query->result();
        // kembalikan data mahasiswa yang login ke controller
        return $data;
    }

    public function fotoMahasiswa($nim)
    {
        // select * from mahasiswa where nim = nim yang login
        $this->db->select('foto');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $nim);
        // eksekusi query
        $query = $this->db->get();
        $data = $query->result();
        // kembalikan data mahasiswa yang login ke controller
        return $data;
    }
    public function simpanProfile($data)
    {
        // memasukkan nim kedalam variabel
        $nim = $data['nim'];
        // hapus index nim pada array agar tidak ikut terupdate
        unset($data['nim']);
        // update data sesuai pk
        $this->db->where('nim', $nim);
        $this->db->update('mahasiswa', $data);
        // jika berhasil update data
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan_berhasil', 'Data berhasil disimpan!');
        } else { // jika gagal
            $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan!');
        }
    }
}