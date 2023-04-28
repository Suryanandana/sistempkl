 <?php
	class Mpendaftaran extends CI_Model
	{
        
        //insert data ke dalam tabel mahasiswa dan login
        function insert_data($data1, $data2) 
        {
            $this->db->insert('mahasiswa', $data1);
            $this->db->insert('login', $data2);
        }
    

    }
?>


         
		
