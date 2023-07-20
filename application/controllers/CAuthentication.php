<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class Cauthentication extends CI_Controller
{
    public function tampilLogin()
    {
        $this->load->view('authentication/login');
    }

    public function tampilRegister()
    {
        $this->load->view('authentication/register');
    }

    public function tampilLupaPassword()
    {
        $this->load->view('authentication/lupa-password');
    }

    function buatString()
    {
        $kata = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
        $password = substr(str_shuffle($kata), 0, 10);
        return $password;
    }

    public function kirimEmail($string, $userEmail)
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
        $mail->Subject = "Reset Password";
        $mail->Body = "Silahkan klik link berikut untuk mereset password:" . base_url('ubah-password?token=' . $string);
        $mail->AltBody = '';
        $mail->isSMTP();
        $mail->SMTPAuth = true;

        if (!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }
    
    public function prosesLupaPassword()
    {
        // cek apakah ada username di tabel login, jika ada maka ambil emailnya
        $username = $this->input->post('Username');
        $this->load->model('mauthentication');
        $email = $this->mauthentication->prosesLupaPassword($username);
        // kirimkan email dan buat string
        $string = $this->buatString();
        $kirimEmail = $this->kirimEmail($string, $email);
        // jika berhasil buatkan session berdasarkan string
        if ($kirimEmail) {
            $this->session->set_userdata('string', $string);
            $this->session->set_userdata('username_ubah', $username);
            $this->session->set_flashdata('reset_berhasil', 'Silahkan cek email anda untuk mereset password');
            redirect('lupa-password');
        } else {
            $this->session->set_flashdata('reset_gagal', 'Terjadi Kesalahan dalam mengirimkan email');
            redirect('lupa-password');
        }
    }

    public function tampilUbahPassword()
    {
        $this->load->view('authentication/ubah-password');
    }

    public function prosesUbahPassword()
    {
        $this->load->model('mauthentication');
        $data = array(
            'username' => $this->session->userdata('username_ubah'),
            'password' => password_hash($this->input->post('Password'), PASSWORD_DEFAULT)
        );
        $this->mauthentication->prosesUbahPassword($data);
    }
}