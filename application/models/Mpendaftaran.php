<?php
class Mpendaftaran extends CI_Model
{
    //insert data ke dalam tabel mahasiswa dan login
    public function insert_data($data1, $data2)
    {
        // simpan settingan default dan disable debug
        $db_debug = $this->db->db_debug;
        $this->db->db_debug = false;
        // panggil fungsi untuk validasi mahasiswa yang akan registrasi
        $this->validasi_mahasiswa($data1, $data2);
        $this->validasi_tahun_akademik($data1);
        // mulai transaksi
        $this->db->trans_begin();
        $this->db->insert('login', $data2);
        $this->db->insert('mahasiswa', $data1);
        // mengecek apakah berhasil menyimpan dlm transaksi database
        if ($this->db->trans_status() === TRUE) {
            $message = "Registrasi berhasil! Silahkan cek email anda.";
            $this->session->set_flashdata('regis_berhasil', $message);
            $this->db->trans_commit(); //menyimpan semua transaksi
        } else {
            $message = "Registrasi gagal! terjadi kesalahan saat menyimpan data.";
            $this->session->set_flashdata('regis_gagal', $message);
            $this->db->trans_rollback(); // membatalkan transaksi
        }
        $this->db->db_debug = $db_debug;
    }

    public function validasi_mahasiswa($data1, $data2)
    {
        // load helper form dan library form_validation
        $this->load->helper('form');
        $this->load->library('form_validation');
        // set rules untuk form validation
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric|exact_length[10]|is_unique[mahasiswa.nim]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[mahasiswa.email]');
        $this->form_validation->set_message('required', '{field} harus diisi!');
        $this->form_validation->set_message('numeric', '{field} harus angka yang valid!');
        $this->form_validation->set_message('exact_length', '{field} harus berjumlah {param} digit!');
        $this->form_validation->set_message('valid_email', '{field} yang diinput tidak valid!');
        $this->form_validation->set_message('is_unique', '{field} yang diinput sudah terdaftar!');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('regis_gagal', validation_errors());
            redirect('register');
        }
    }

    public function validasi_tahun_akademik($data)
    {
        // ambil data tahun masuk berdasarkan nim
        $this->db->select('tahun_masuk');
        $this->db->where('nim', $data['nim']);
        $tahun_masuk = $this->db->get('master_mahasiswa')->row()->tahun_masuk;
        // jika kosong, maka mahasiswa tersebut tidak bisa registrasi
        if (empty($tahun_masuk)) {
            $message = "NIM yang anda masukkan tidak terdaftar di sistem! Silahkan hubungi admin.";
            $this->session->set_flashdata('regis_gagal', $message);
            redirect('register');
        }

        // timestamp sekarang versi real
        $tahun_sekarang = date('Y'); // tahun sekarang
        // $waktu_sekarang = date('Y-m-d'); // waktu sekarang

        // timestamp sekarang versi dummy
        // $tahun_masuk = "2022";
        // $tahun_sekarang = "2023";
        $waktu_sekarang = "2023-09-01";

        // dapatkan semester
        if($waktu_sekarang >= $tahun_sekarang."-03-01" AND $waktu_sekarang <= $tahun_sekarang."-08-31"){
            $semester = (($tahun_sekarang-1) - $tahun_masuk + 1) * 2; // semester genap
        } else if ($waktu_sekarang >= $tahun_sekarang."-09-01" AND $waktu_sekarang <= $tahun_sekarang."-12-31") {
            $semester = ($tahun_sekarang - $tahun_masuk) * 2 + 1; // semester ganjil
        } else if ($waktu_sekarang >= $tahun_sekarang."-01-01" AND $waktu_sekarang <= $tahun_sekarang."-02-28"){
            $semester = (($tahun_sekarang-1) - $tahun_masuk) * 2 + 1; // semester ganjil
        } else {
            $semester = 0;
        }

        // jika semester tidak sama dengan 7, maka mahasiswa tidak bisa registrasi
        if($semester != 7){
            $message = "Registrasi hanya dapat dilakukan oleh mahasiswa semester 7!";
            $this->session->set_flashdata('regis_gagal', $message);
            redirect('register');
        }
    }
}
?>