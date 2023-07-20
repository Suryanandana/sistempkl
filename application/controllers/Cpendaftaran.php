<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

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
        $kata = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
        $password = substr(str_shuffle($kata), 0, 8);
        return $password;
    }

    public function kirimEmail($userNim, $userEmail, $userPassword)
    {
        $mail = new PHPMailer(true);

        $mail->SMTPDebug = 2;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "suryanandana85@gmail.com";
        $mail->Password = "ouedyfdrtkleyvtl";
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->setFrom("suryanandana85@gmail.com", 'pnb');
        $mail->addAddress($userEmail);

        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = "Pendaftaran Akun";
        $mail->Body = "Username : " . $userNim . "<br/>Password : " . $userPassword;
        $mail->AltBody = '';
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
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
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        $status = $this->kirimEmail($data2['username'], $data1['email'], $password);
        if($status){
            $this->mpendaftaran->insert_data($data1, $data2);
        }
        $this->session->set_flashdata('regis_gagal', "gagal");
        redirect('register');
    }

}
?>