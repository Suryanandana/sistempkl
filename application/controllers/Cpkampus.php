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
}