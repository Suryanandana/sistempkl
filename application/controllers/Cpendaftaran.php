<?php
	class Cpendaftaran extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mpendaftaran');
		}
        
        //buat password
        function buatpwd()
		{
			$kata="ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
			$password=substr(str_shuffle($kata),0,8);
			return $password;
		}


        //insert data ke tabel mahasiswa dan login
        function insert_data() 
        {
            $data1 = array(
                // mengambil nilai dari sebuah input form yang diberi nama 'email'
                // dan menetapkan nilainya ke dalam sebuah array dengan kunci 'email'.
               'nim' => $this->input->post('nim'),
               'nama_lengkap' => $this->input->post('nama_lengkap'),
               'email' => $this->input->post('email')
            );

            $password = $this->buatpwd();
            $data2 = array(
                'username' => $this->input->post('nim'),
                'password' => $password
            );

            $this->mpendaftaran->insert_data($data1, $data2);
            // $this->session->set_flashdata('regis_gagal', "gagal");
            redirect('register');
         }


	}
?>