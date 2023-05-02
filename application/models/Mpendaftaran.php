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
            if ($this->db->trans_status() === FALSE)
            {
                $error = $this->db->error();
                echo $error['message'];
                if(str_contains($error['message'], 'Duplicate entry')){
                    if(str_contains($error['message'], 'PRIMARY')){
                        $message = 'NIM yang anda registrasikan sudah terdaftar!';
                    }
                    if(str_contains($error['message'], "'email'")){
                        $message = "Email yang anda registrasikan sudah terdaftar!";
                    }
                } else {
                    $message = 'Registrasi gagal!';
                }
                $this->session->set_flashdata('regis_gagal', $message);
                $this->db->trans_rollback();
            }
            else
            {
                $this->db->trans_commit();
                $message = "Transaksi berhasil! Silahkan periksa email untuk melihat akun!";
                $this->session->set_flashdata('regis_berhasil', $message);
            }
            $this->db->db_debug = $db_debug;
            // $this->session->set_flashdata('regis_gagal', 'gagal registrasi');
        }
    

    }
?>


         
		
