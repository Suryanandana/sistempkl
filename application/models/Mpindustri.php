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

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan_berhasil', 'Data berhasil disimpan!');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan!');
        }
    }

    public function dataBimbinganMahasiswa($id_pembimbing_industri)
    {
        $this->db->select('*')->from('pembimbing_mahasiswa')
            ->where('pembimbing_mahasiswa.id_pembimbing_industri', $id_pembimbing_industri)
            ->join('pembimbing_industri', 'pembimbing_mahasiswa.id_pembimbing_industri = pembimbing_industri.id_pembimbing_industri')
            ->join('mahasiswa', 'pembimbing_mahasiswa.nim = mahasiswa.nim')
            ->join('aktivitas', 'pembimbing_mahasiswa.id_pembimbing_mahasiswa = aktivitas.id_pembimbing_mahasiswa');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    // Mengambil data mahasiswa yang dibimbing oleh pembimbing industri
    public function dataNilai($id_pembimbing_industri)
    {
        // perintah query untuk mengambil data mahasiswa yang dibimbing oleh pembimbing industri
        $this->db->select('nilai.*,mahasiswa.nama_lengkap')->from('pembimbing_mahasiswa')
            ->where('pembimbing_mahasiswa.id_pembimbing_industri', $id_pembimbing_industri)
            ->join('pembimbing_industri', 'pembimbing_mahasiswa.id_pembimbing_industri = pembimbing_industri.id_pembimbing_industri')
            ->join('mahasiswa', 'pembimbing_mahasiswa.nim = mahasiswa.nim')
            ->join('nilai', 'pembimbing_mahasiswa.id_pembimbing_mahasiswa = nilai.id_pembimbing_mahasiswa');
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function getNIM($id_pembimbing_industri)
    {
        $this->db->select('nim');
        $this->db->where('id_pembimbing_industri', $id_pembimbing_industri);
        $query = $this->db->get('pembimbing_mahasiswa');
        $listNIM = array();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $listNIM[] = $row;
            }
        }

        return $listNIM;
    }

    public function nimPembimbingMahasiswa($nim)
    {
        return $this->db->get_where('pembimbing_mahasiswa', ['nim' => $nim])->row_array();
    }

    public function tambahDataNilai($data)
    {
        // cek apakah nim sudah diberi nilai sebelumnya
        $this->db->select('nilai_motivasi_kampus, nilai_kreativitas_kampus, nilai_disiplin_kampus, nilai_pembahasan_kampus');
        $this->db->where('id_pembimbing_mahasiswa', $data['id_pembimbing_mahasiswa']);
        $query = $this->db->get('nilai');
        $nilai = $query->row_array();

        if (empty($nilai)) {
            $this->db->insert('nilai', $data);
        } else {
            $total = 0;
            foreach ($nilai as $totalKampus) {
                $total += $totalKampus;
            }
            $total += $data['nilai_motivasi_industri'] + $data['nilai_kreativitas_industri'] + $data['nilai_disiplin_industri'] + $data['nilai_pembahasan_industri'];
            $rataRata = $total / 8;
            $bulatkan = round($rataRata);
            $data['total_nilai'] = $bulatkan;
            $this->db->where('id_pembimbing_mahasiswa', $data['id_pembimbing_mahasiswa']);
            $this->db->update('nilai', $data);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan_berhasil', "Berhasil Memberi Nilai!");
        } else {
            $this->session->set_flashdata('pesan_gagal', "Gagal Memberi Nilai!");
        }
        redirect('cpindustri/tampilnilai');
    }

    // validasi aktivitas
    public function tampilAktivitas($id)
    {
        $this->db->select('aktivitas.*, mahasiswa.nama_lengkap, mahasiswa.nim');
        $this->db->join('pembimbing_mahasiswa', 'pembimbing_mahasiswa.id_pembimbing_mahasiswa = aktivitas.id_pembimbing_mahasiswa');
        $this->db->join('mahasiswa', 'pembimbing_mahasiswa.nim = mahasiswa.nim');
        $this->db->where('pembimbing_mahasiswa.id_pembimbing_industri', $id);
        $query = $this->db->get('aktivitas');
        return $query->result();
    }

    public function validasiAktivitas($data, $id_aktivitas)
    {
        $this->db->where('id_aktivitas', $id_aktivitas);
        $this->db->update('aktivitas', $data);
        return $this->db->affected_rows();
    }
}