<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;

require 'vendor/autoload.php';

class Cadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mvalidasi');
        $this->load->model('madmin');
        $this->load->library('pagination');
        $this->mvalidasi->validasiadmin();
    }

    // dashboard / home admin
    public function index()
    {
        $data['content'] = $this->load->view('admin/dashboard', [], true);
        $this->load->view('admin/main', $data);
    }

    public function konfigPagination($url, $jumlahData, $dataPerPage)
    {
        $config['base_url'] = $url;
        $config['page_query_string'] = TRUE;
        $config["total_rows"] = $jumlahData;
        $config["per_page"] = $dataPerPage;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
    }

    public function pencarianData()
    {
        if ($this->input->get('cari')) {
            return html_escape($this->input->get('cari'));
        } else {
            return "";
        }
    }

    public function getPage($dataPerPage)
    {
        if ($this->input->get('per_page')) {
            $page = html_escape($this->input->get('per_page')) - 1;
        } else {
            $page = 0;
        }
        // start limit dari berapa
        return $page * $dataPerPage;
    }

    // crud industri (mulai dari sini yang diatas gk perlu dicopy/diubah)
    public function tampilIndustri()
    {
        // isi sesuai nama class / nama method
        $url = base_url('cadmin/tampilindustri');
        // berfungsi untuk mendapatkan pencarian yang diisi lewat form (gk perlu diubah)
        $pencarian = $this->pencarianData();
        // panggil method totalIndustri (sesuaikan), beserta variabel pencarian untuk mengetahui jumlah datanya
        $jumlahIndustri = $this->madmin->totalIndustri($pencarian);
        /* sesuaikan mau tampilkan berapa data per halamannya, untuk percobaan isi 1 atau 2 biar gk bnyk.
            kalau udh berhasil baru sesuaiin lagi isi 5 biar sama */
        $dataPerPage = 5;
        // jalankan konfigurasi pagination (gk perlu diubah)
        $this->konfigPagination($url, $jumlahIndustri, $dataPerPage);
        // untuk mengetahui sekarang lagi ada di page berapa, untuk menentukan limit data (gk perlu diubah)
        $mulai = $this->getPage($dataPerPage);
        // panggil method tampilDataIndustri pada model untuk menjalankan limit (sesuikan nama method)
        $data["data"] = $this->madmin->tampilDataIndustri($dataPerPage, $mulai, $pencarian);
        // membuat link pagination pada view nantinya (gk perlu diubah)
        $data["links"] = $this->pagination->create_links();
        // untuk menentukan penomeran pada view (keduanya gk perlu diubah)
        $data['dataPerPage'] = $dataPerPage;
        $data['no'] = $mulai + 1;
        // load view (sesuaikan)
        $industri['content'] = $this->load->view('admin/industri', $data, true);
        $this->load->view('admin/main', $industri);
    }

    public function tambahIndustri()
    {
        // simpan data yang dikirim lewat form kedalam variabel $data
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp')
        );
        $this->madmin->tambahindustri($data);
    }

    public function hapusIndustri()
    {
        $id = $this->input->post('id_industri');
        $this->madmin->hapusindustri($id);
    }

    public function editIndustri()
    {
        // ambil id industri
        $id = $this->input->post('id_industri');
        // ambil data perubahan untuk disimpan
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp')
        );
        $this->madmin->editindustri($id, $data);
    }

    // import master
    public function uploadData()
    {
        // load helper
        $this->load->helper(['form', 'url']);
        // konfigurasi format gambar
        $config['upload_path'] = './resource/import/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 1000000;
        // load library upload dengan konfigurasi yang ada
        $this->load->library('upload', $config);
        // jika upload gambar berhasil
        if ($this->upload->do_upload('import')) {
            $fileImport = $this->upload->data();
            $fileName = $fileImport['file_name'];
            $fullPath = $fileImport['full_path'];
            $this->importData($fullPath);
            if (file_exists('./resource/import/' . $fileName)) {
                unlink('./resource/import/' . $fileName);
            }
        } else { // jika gagal
            var_dump($this->upload->display_errors());
        }
    }

    public function importData($file)
    {
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();
        $data = $sheet->rangeToArray('A2:J' . $highestRow);
        // ambil tiap barisnya menjadi array
        $import = array();
        foreach ($data as $baris) {
            $temp = [
                "nim" => $baris[0],
                "nama_lengkap" => $baris[1],
                "jurusan" => $baris[2],
                "prodi" => $baris[3],
                "tahun_masuk" => $baris[4],
                "jenis_kelamin" => $baris[5],
                "tempat_lahir" => $baris[6],
                "tanggal_lahir" => $baris[7],
                "alamat" => $baris[8],
                "agama" => $baris[9],
            ];
            array_push($import, $temp);
        }
        $this->madmin->importData($import);
    }

    // CRUD master mahasiswa
    public function tampilMaster()
    {
        $url = base_url('cadmin/tampilMaster');
        $pencarian = $this->pencarianData();
        $jumlahMaster = $this->madmin->totalMaster($pencarian);
        $dataPerPage = 5;
        // jalankan konfigurasi pagination
        $this->konfigPagination($url, $jumlahMaster, $dataPerPage);
        $mulai = $this->getPage($dataPerPage);
        // panggil method tampilMaster pada model
        $data["data"] = $this->madmin->tampilMaster($dataPerPage, $mulai, $pencarian);
        $data["links"] = $this->pagination->create_links();
        // untuk menentukan penomeran pada view
        $data['dataPerPage'] = $dataPerPage;
        $data['no'] = $mulai + 1;
        // load view (sesuaikan)
        $master['content'] = $this->load->view('admin/master', $data, true);
        $this->load->view('admin/main', $master);
    }

    public function tambahMaster()
    {
        // simpan data yang dikirim lewat form kedalam variabel $data
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jurusan' => $this->input->post('jurusan'),
            'prodi' => $this->input->post('prodi'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama')
        );
        $this->madmin->tambahMaster($data);
    }

    public function hapusMaster()
    {
        $id = $this->input->post('nim');
        $this->madmin->hapusMaster($id);
    }

    public function editMaster()
    {
        // ambil id industri
        $id = $this->input->post('nim');
        // ambil data perubahan untuk disimpan
        $data = array(
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'jurusan' => $this->input->post('jurusan'),
            'prodi' => $this->input->post('prodi'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama')
        );
        $this->madmin->editmaster($id, $data);
    }
}