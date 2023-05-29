<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mmahasiswa');
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiadmin();
    }

    public function index()
    {
        // masukkan view dashboard ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/dashboard', [], true);
        // tampilkan view dashboard ke view main
        $this->load->view('mahasiswa/main', $data);
    }

    // yang berhubungan dengan views
    public function profile()
    {
        // mengambil data mahasiswa yang login
        $nim = $this->session->userdata('username');
        // ambil data yang login
        $login['data'] = $this->mmahasiswa->mahasiswalogin($nim);
        // masukkan view profile ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/profile', $login, TRUE);
        // tampilkan view profile ke view main
        $this->load->view('mahasiswa/main', $data);
    }

    public function simpanProfile()
    {
        // mengambil data mahasiswa yang login
        $nim = $this->session->userdata('username');
        // ambil data foto yang login
        $login['data'] = $this->mmahasiswa->fotomahasiswa($nim);
        // simpan lokasi foto lama
        $fotoLama = $login['data'][0]->foto;

        // load helper
        $this->load->helper(['form', 'url']);
        // konfigurasi format gambar
        $config['upload_path'] = './resource/img/fotoMahasiswa';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        // load library upload dengan konfigurasi yang ada
        $this->load->library('upload', $config);
        // jika upload gambar berhasil
        if ($this->upload->do_upload('foto')) {
            $dataImg = $this->upload->data();
            // masukkan nama foto untuk dikirim ke model
            $_POST['foto'] = $dataImg['file_name'];
            // lakukan pengecekan lagi jika sudah pernah mengisi foto maka hapus yang lama
            if (isset($fotoLama)) {
                unlink('./resource/img/fotoMahasiswa/' . $fotoLama);
            }
        } else { // jika gagal
            var_dump($this->upload->display_errors());
        }

        // simpan data
        $this->load->model('mmahasiswa');
        $this->mmahasiswa->simpanprofile($_POST);
        // tampilkan halaman profile mhs
        redirect('cmahasiswa/profile');
    }
}