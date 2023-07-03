<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpindustri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpindustri');
        $this->load->model('mvalidasi');
        $this->mvalidasi->validasiPindustri();
    }

    public function index()
    {
        //mengirim view dashboard ke dalam variabel data ['conten']
        $data['content'] = $this->load->view('pindustri/dashboard', [], true);
        //menampilkan view dashboard ke view admin
        $this->load->view('pindustri/main', $data);
    }

    public function profile()
    {
        $id_pembimbing_industri = $this->session->userdata('username');
        $login['data'] = $this->mpindustri->pindustriLogin($id_pembimbing_industri);
        $data['content'] = $this->load->view('pindustri/profile', $login, true);
        $this->load->view('pindustri/main', $data);
    }

    public function simpanProfile()
    {
        $id_pembimbing_industri = $this->session->userdata('username');
        $login['data'] = $this->mpindustri->fotoPindustri($id_pembimbing_industri);
        $fotoLama = $login['data'][0]->foto;

        $this->load->helper(['form', 'url']);
        // konfig format gambar
        $config['upload_path'] = './resource/img/fotoPembimbingIndustri';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $dataImg = $this->upload->data();
            $_POST['foto'] = $dataImg['file_name'];
            // mengecek foto lama, jika ada maka ganti dengan yang baru
            if (isset($fotoLama)) {
                unlink('./resource/img/fotoPembimbingIndustri/' . $fotoLama);
            }
        } else {
            var_dump($this->upload->display_errors());
        }

        // simpan data
        $this->load->model('mpindustri');
        $this->mpindustri->simpanProfile($_POST);
        redirect('cpindustri/profile');
    }

    public function tampilAktivitas()
    {
        $id_pembimbing_industri = $this->session->userdata('username');
        $login['data'] = $this->mpindustri->pindustriLogin($id_pembimbing_industri);
        $pMahasiswa = $this->mpindustri->dataBimbinganMahasiswa($id_pembimbing_industri);
        var_dump($pMahasiswa);
        die;
        $data['content'] = $this->load->view('pindustri/profile', $login, true);
        $this->load->view('pindustri/main', $data);
    }

    public function tampilNilai()
    {
        $id_pembimbing_industri = $this->session->userdata('username');
        $login['data'] = $this->mpindustri->dataNilai($id_pembimbing_industri);
        $login['listNIM'] = $this->mpindustri->getNIM($id_pembimbing_industri);
        $data['content'] = $this->load->view('pindustri/nilai', $login, true);
        $this->load->view('pindustri/main', $data);
    }

    public function inputNilai()
    {
        $nip = $this->session->userdata('username');
        $nim = $this->input->post('nim'); 

        if (!empty($nim)) {
            $mahasiswa = $this->mpindustri->nimPembimbingMahasiswa($nim);
            if (!empty($mahasiswa)) {
                $data = array(
                    'id_pembimbing_mahasiswa' => $mahasiswa['id_pembimbing_mahasiswa'],
                    'nilai_motivasi_industri' => $this->input->post('nilai_motivasi_industri'),
                    'nilai_kreativitas_industri' => $this->input->post('nilai_kreativitas_industri'),
                    'nilai_disiplin_industri' => $this->input->post('nilai_disiplin_industri'),
                    'nilai_pembahasan_industri' => $this->input->post('nilai_pembahasan_industri'),
                    'feedback_industri' => $this->input->post('feedback_industri')
                );

                $this->mpindustri->tambahDataNilai($data);
            }
        }
    }
}