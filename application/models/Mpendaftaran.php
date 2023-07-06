 <?php
	class Mpendaftaran extends CI_Model
	{
        
        //insert data ke dalam tabel mahasiswa dan login
        function insert_data($data1, $data2) 
        {
            // simpan settingan default dan disable debug
            $db_debug = $this->db->db_debug;
            $this->db->db_debug = false;
            // mulai transaksi
            $this->db->trans_begin();
            $this->db->insert('login', $data2);
            $this->db->insert('mahasiswa', $data1);
            // mengecek apakah terjadi kegagalan dlm transaksi database
            if ($this->db->trans_status() === FALSE)
            {
                // mengambil informasi terkait error. 
                $error = $this->db->error();
                echo $errorMessage = $error['message'];
                strpos($errorMessage,'PRIMARY');
                if(strpos($errorMessage,'Duplicate') >= 0){
                    if(strpos($errorMessage, 'PRIMARY') > 0){
                        $message = 'NIM yang anda registrasikan sudah terdaftar!';
                    }
                    if(strpos($errorMessage, "'email'") > 0){
                        $message = "Email yang anda registrasikan sudah terdaftar!";
                    }
                } else {
                    $message = 'Registrasi gagal!';
                }
                $this->session->set_flashdata('regis_gagal', $message);
                $this->db->trans_rollback(); // membatalkan transaksi
            }
            else
            {
                $this->db->trans_commit(); //menyimpan semua transaksi
                $message = "Registrasi berhasil!";
                $this->session->set_flashdata('regis_berhasil', $message);
            }
            $this->db->db_debug = $db_debug;
            // $this->session->set_flashdata('regis_gagal', 'gagal registrasi');
        }
    

    }
?>