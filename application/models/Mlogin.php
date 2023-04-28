<?php
	class Mlogin extends CI_Model
	{

		function proseslogin()
		{
			$Username=$this->input->post('Username');
			$Password=$this->input->post('Password');
			
			$sql="select * from login where Username='".$Username."' ";
			$sql.="and Password='".$Password."'";
			$query=$this->db->query($sql);	
			if ($query->num_rows()>0)
			{
				//ada data	
				$data=$query->row();
				$Username=$data->Username;
				
				$session=array(
					'Username'=>$Username,
				);

				$this->session->set_userdata($session);

				redirect('admin/index');
			}
			else
			{
				//tidak ada data	
				$this->session->set_flashdata('pesan','Login gagal');
				redirect('authentication/tampilLogin');
				
			}
		}
	}
?>