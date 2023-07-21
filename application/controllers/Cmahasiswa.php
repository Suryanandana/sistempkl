<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cmahasiswa extends CI_Controller
{
    protected $nim;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mmahasiswa');
        // mengambil data mahasiswa yang login
        $this->nim = $this->session->userdata('username');
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiMahasiswa();
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
        // ambil data yang login
        $login['data'] = $this->mmahasiswa->mahasiswalogin($this->nim);
        // masukkan view profile ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/profile', $login, TRUE);
        // tampilkan view profile ke view main
        $this->load->view('mahasiswa/main', $data);
    }

    public function simpanProfile()
    {
        // ambil data foto yang login
        $login['data'] = $this->mmahasiswa->fotomahasiswa($this->nim);
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
        $this->mmahasiswa->simpanprofile($_POST);
        // tampilkan halaman profile mhs
        redirect('cmahasiswa/profile');
    }

    public function surat()
    {
        // ambil data yang login
        $login['data'] = $this->mmahasiswa->mahasiswalogin($this->nim);
        // ambil data surat yang bisa didownload
        $login['dataSurat'] = $this->mmahasiswa->ambilDataSurat();
        // ambil surat yang sudah diupload mahasiswa
        $login['surat'] = $this->mmahasiswa->ambilSurat($this->nim);
        $login['suratMhs'] = $this->mmahasiswa->ambilSuratMhs($this->nim);
        // var_dump($login['surat']);die;
        // masukkan view profile ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/surat', $login, TRUE);
        // tampilkan view profile ke view main
        $this->load->view('mahasiswa/main', $data);
    }

    public function downloadDataSurat()
    {
        $fileName = str_replace(' ', '%20', $_GET['file']);
        $this->load->helper('download');
        $data = file_get_contents(base_url() . 'resource/file/' . $fileName);
        force_download($fileName, $data);
    }

    public function downloadSurat()
    {
        $fileName = str_replace(' ', '%20', $_GET['file']);
        $this->load->helper('download');
        $data = file_get_contents(base_url() . 'resource/suratMahasiswa/' . $fileName);
        force_download($fileName, $data);
    }

    public function uploadSurat()
    {
        // load helper
        $this->load->helper(['form', 'url']);
        // konfigurasi format gambar
        $config['upload_path'] = './resource/suratMahasiswa/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 10000;
        // load library upload dengan konfigurasi yang ada
        $this->load->library('upload', $config);
        // jika upload gambar berhasil
        if ($this->upload->do_upload('dokumen')) {
            $dokumen = $this->upload->data();
            $_POST['dokumen'] = $dokumen['file_name'];
        } else { // jika gagal
            var_dump($this->upload->display_errors());
            die;
        }

        // simpan data
        $this->mmahasiswa->simpanDokumen($_POST);
        // jika berhasil dan gagal
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan_berhasil', 'Data berhasil disimpan!');
        } else { // jika gagal
            $this->session->set_flashdata('pesan_gagal', 'Data gagal disimpan!');
        }
        // tampilkan halaman profile mhs
        redirect('cmahasiswa/surat');
    }
    
    //public function aktivitasPKL()
    //{
        // ambil data yang login
        //$login['data'] = $this->mmahasiswa->ambilAktivitas($this->nim);
        // masukkan view profile ke variabel data['content']
        //$data['content'] = $this->load->view('mahasiswa/aktivitasPKL', $login, TRUE);
        // tampilkan view profile ke view main
        //$this->load->view('mahasiswa/main', $data);
    //}

    public function downloadSuratPKL()
    {
        $fileName = str_replace(' ', '%20', $_GET['file']);
        $this->load->helper('download');
        $data = file_get_contents(base_url() . 'resource/dokumenPKL/' . $fileName);
        force_download($fileName, $data);
    }

    //aktivitas PKL
    public function tampilAktivitasPKL(){
        $nim = $this->session->userdata('username');
       // ambil data yang login
        $login['data'] = $this->mmahasiswa->tampildataaktivitaspkl($this->nim);
        // masukkan view profile ke variabel data['content']
        $data['content'] = $this->load->view('mahasiswa/aktivitasPKL', $login, TRUE);
        // tampilkan view profile ke view main
        $this->load->view('mahasiswa/main', $data); 
    }


    public function tambahAktivitasPKL()
    {    
        $id_pembimbing_mahasiswa = $this->mmahasiswa->getidpembimbingmahasiswa($this->nim);

        // simpan data yang dikirim lewat form kedalam variabel $data
        $data = array(
            'nama_aktivitas' => $this->input->post('nama_aktivitas'),
            'deskripsi_aktivitas' => $this->input->post('deskripsi_aktivitas'),
            'tanggal_aktivitas' => $this->input->post('tanggal_aktivitas'),
            'dokumen' => '',
            'validasi_kampus' => "Belum Tervalidasi",
            'validasi_industri' => "Belum Tervalidasi",
            'id_pembimbing_mahasiswa' => $id_pembimbing_mahasiswa
        );
        $this->mmahasiswa->tambahdataaktivitaspkl($data);
    }

    // fitur bimbingan mahasiswa
    public function tampilBimbinganPKL()
    {
        $mahasiswa['bimbingan'] = $this->mmahasiswa->getDataBimbinganPkl($this->nim);
        $data['content'] = $this->load->view('mahasiswa/bimbingan', $mahasiswa, TRUE);
        $this->load->view('mahasiswa/main', $data);
    }

    public function simpanBimbingan()
    {
        $limitBimbingan = 4;
        $id_pembimbing_mahasiswa = $this->mmahasiswa->getidpembimbingmahasiswa($this->nim);

        $data = array(
            'keterangan_bimbingan' => $this->input->post('keterangan_bimbingan'),
            'tanggal_bimbingan' => $this->input->post('tanggal_bimbingan'),
            'status' => "Belum Tervalidasi",
            'id_pembimbing_mahasiswa' => $id_pembimbing_mahasiswa
        );

        $jumlahBimbingan = $this->mmahasiswa->getJumlahBimbingan($id_pembimbing_mahasiswa);

        if($jumlahBimbingan>=$limitBimbingan){
            $this->session->set_flashdata('pesan_gagal', 'Mahasiswa maksimal bimbingan 4 kali!');
        } else {
            $affected_rows = $this->mmahasiswa->simpanBimbingan($data);
            if ($affected_rows > 0) {
                $this->session->set_flashdata('pesan_berhasil', 'Data bimbingan berhasil disimpan!');
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Data bimbingan gagal disimpan!');
            }
        }

        redirect('cmahasiswa/tampilBimbinganPKL');
    }

    public function tampilNilai()
    {
        $login['data'] = $this->mmahasiswa->mahasiswalogin($this->nim);
        $id = $this->mmahasiswa->ambilIdPembimbingMhs($this->nim);
        $login['nilai'] = $this->mmahasiswa->ambilNilai($id[0]->id_pembimbing_mahasiswa)[0];
        $data['content'] = $this->load->view('mahasiswa/nilai', $login, TRUE);
        $this->load->view('mahasiswa/main', $data);
    }

}