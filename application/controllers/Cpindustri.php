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

        if($this->upload->do_upload('foto'))
        {
            $dataImg = $this->upload->data();
            $_POST['foto'] = $dataImg['file_name'];
            if(isset($fotoLama))
            {
                unlink('./resource/img/fotoPembimbingIndustri/'.$fotoLama);
            }
        } 
        
        else 
        { 
            var_dump($this->upload->display_errors());
        }
        
        // simpan data
        $this->load->model('mpindustri');
        $this->mpindustri->simpanProfile($_POST);
        redirect('cpindustri/profile');
    }
}