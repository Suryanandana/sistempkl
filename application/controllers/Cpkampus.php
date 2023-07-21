<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cpkampus extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->model('mpkampus');
        $this->load->model('mvalidasi');
        $this->load->library('pagination');
        $this->mvalidasi->validasiPkampus();
    }

	public function index()
	{
		$data['content'] = $this->load->view('pkampus/dashboard', [], true);
        $this->load->view('pkampus/main', $data);
	}

    public function profile() 
    {
        $nip = $this->session->userdata('username');
        $login['data'] = $this->mpkampus->pkampusLogin($nip);
        $data['content'] = $this->load->view('pkampus/profile', $login, true);
        $this->load->view('pkampus/main', $data);
    }

    public function simpanProfile()
    {
        $nip = $this->session->userdata('username');
        $login['data'] = $this->mpkampus->fotopKampus($nip);
        $fotoLama = $login['data'][0]->foto;

        $this->load->helper(['form', 'url']);
        $config['upload_path'] = './resource/img/fotoPembimbingKampus';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto'))
        {
            $dataImg = $this->upload->data();
            $_POST['foto'] = $dataImg['file_name'];

            if(isset($fotoLama)){
                unlink('./resource/img/fotoPembimbingKampus/'.$fotoLama);
            }

        } 
        else 
        { 
            var_dump($this->upload->display_errors());
        }
        
        $this->load->model('mpkampus');
        $this->mpkampus->simpanProfile($_POST);
        // tampilkan halaman profile mhs
        redirect('cpkampus/profile');
    }



    public function tampilbimbingan()
    {
        $nip = $this->session->userdata('username');
        $login['data'] = $this->mpkampus->tampildatabimbingan($nip);
        $data['content'] = $this->load->view('pkampus/bimbinganMhs', $login, true);
        $this->load->view('pkampus/main', $data);
    }

    public function editbimbingan()
    {
        $id = $this->input->post('id_bimbingan');
        // ambil data perubahan untuk disimpan
        $data = array(
            'id_bimbingan' => $this->input->post('id_bimbingan'),
            'status' => $this->input->post('status'),
        );
        // var_dump($data);die;
        $this->mpkampus->editbimbingan($data);
    }

    public function tampilnilai()
    {
        $nip = $this->session->userdata('username');
        $login['data'] = $this->mpkampus->tampildatanilai($nip);
        $login['listNIM'] = $this->mpkampus->tampilNIM($nip);
        $data['content'] = $this->load->view('pkampus/nilaiMhs', $login, true);
        $this->load->view('pkampus/main', $data);
    }

    public function tambahnilai()
    {
        $nip = $this->session->userdata('username');
        $nim = $this->input->post('nim'); 

        if (!empty($nim)) {
            $mahasiswa = $this->mpkampus->nimPM($nim);
            if (!empty($mahasiswa)) {
                $data = array(
                    'id_pembimbing_mahasiswa' => $mahasiswa['id_pembimbing_mahasiswa'],
                    'nilai_motivasi_kampus' => $this->input->post('nilai_motivasi_kampus'),
                    'nilai_kreativitas_kampus' => $this->input->post('nilai_kreativitas_kampus'),
                    'nilai_disiplin_kampus' => $this->input->post('nilai_disiplin_kampus'),
                    'nilai_pembahasan_kampus' => $this->input->post('nilai_pembahasan_kampus'),
                    'feedback_kampus' => $this->input->post('feedback_kampus')
                );
                $this->mpkampus->tambahdatanilai($data);
            }
        }
    }
    public function tampilaktivitas()
    {
        $nip = $this->session->userdata('username');
        $login['aktivitas'] = $this->mpkampus->tampilaktivitas($nip);
        $data['content'] = $this->load->view('pkampus/aktivitas', $login, true);
        $this->load->view('pkampus/main', $data);
    }

    public function validasiaktivitas()
    {
        $id_aktivitas = $this->input->post('id_aktivitas');
        $data = array(
            'validasi_kampus' => $this->input->post('validasi_kampus')
        );
        $affected_rows = $this->mpkampus->validasiAktivitas($data, $id_aktivitas);
        if ($affected_rows > 0) {
            $this->session->set_flashdata('pesan_berhasil', 'Data berhasil divalidasi');
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data gagal divalidasi');
        }
        return redirect('cpkampus/tampilaktivitas');
    }
}