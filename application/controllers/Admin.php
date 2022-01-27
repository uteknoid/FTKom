<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {

        parent::__construct();
        $this->load->model('data_models');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));      
    }

    public function index()
    {

        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {
            $this->beranda();
        } else {
            $this->load->view('admin/login');
        } 
    }

    public function login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/login');
        } else {

            $this->_login();
        }
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

        if ($admin) {

            if (password_verify($password, $admin['password'])) {

                $data = [
                    'username' => $admin['username']
                ];

                $this->session->set_userdata($data);
                redirect('admin');
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('admin/login');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tersebut tidak dapat ditemukan!</div>');
            redirect('admin/login');
        }
    }


    //DATA LOGIN======================================================

    public function data_login()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $hari = date('Y-m-d');
            $bulan = date('Y-m');
            $tahun = date('Y');

            $data['maktif'] = 'login';
            $data['title'] = 'Data Login Mahasiswa | Admin';

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin//data-login/data-login');
            $this->load->view('admin/include/footer');

        }else {
            $this->load->view('admin/login');
        }
    }

    public function acak_login()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {
            $data_login = $this->data_models->data('data_login')->result();

            foreach ($data_login as $d) {

                $nim = $d->nim;

                $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $password = array(); 
                $alpha_length = strlen($alphabet) - 1; 
                for ($i = 0; $i < 10; $i++) 
                {
                    $n = rand(0, $alpha_length);
                    $password[] = $alphabet[$n];
                }
                $ranpass = implode($password); 

                $data = array(
                    'password' => $ranpass
                );

                $where = array(
                    'nim' => $nim
                );

                $this->data_models->update($where, $data, 'data_login');
            }
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Login Berhasil Diperbaharui</div>');
            redirect('admin/data_login');

        }else {
            $this->load->view('admin/login');
        }
    }

    public function data_login_pdf()
    {
        $this->load->view('admin/cetak/data-login-pdf');
    }

    public function data_login_excel()
    {
        $this->load->view('admin/cetak/data-login-excel');
    }


    //Beranda======================================================

    public function beranda()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $hari = date('Y-m-d');
            $bulan = date('Y-m');
            $tahun = date('Y');

            $data['maktif'] = 'beranda';
            $data['title'] = 'Beranda | Admin';
            
            $data['data'] = $this->data_models->data('tbl_mahasiswa')->result();
            $data['jml_mhs'] = $this->data_models->data('tbl_mahasiswa')->num_rows();
            $data['jml_tema'] = $this->data_models->data('tbl_tema')->num_rows();
            $data['jml_yudi'] = $this->data_models->data('tbl_yudisium')->num_rows();
            $data['jml_alu'] = $this->data_models->data('tbl_alumni')->num_rows();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/dashboard');
            $this->load->view('admin/include/footer');

        }else {
            $this->load->view('admin/login');
        }
    }


    //Data Induk======================================================

    public function data_induk()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'induk';
            $data['title'] = 'Data Induk Mahasiswa | FTKom UNCP';

            
            $data['data'] = $this->data_models->data('tbl_mahasiswa')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/induk/induk', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function edit_induk($nim)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'induk';

            $where = array(
                'nim' => $nim
            );
            $data['mahasiswa'] = $this->data_models->edit($where, 'tbl_mahasiswa')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/induk/edit-mahasiswa', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    function tambah_mhs()
    {

        $config['upload_path']  = './assets/img/mhs/master/';
        $config['allowed_types']  = 'jpg|jpeg|png|PNG';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Mahasiswa gagal ditambahakan karena gagal mengunggah foto!</div>');
            redirect('admin/data_induk');
        } else {
            date_default_timezone_set("Asia/Makassar");
            $tanggal = date("Y-m-d");
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $data = [

                'nim' => $this->input->post('nim', true),
                'nama' => $this->input->post('nama', true),
                'jenis_kelamin' => $this->input->post('jk', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'agama' => $this->input->post('agama', true),
                'nama_ayah' => $this->input->post('ayah', true),
                'nama_ibu' => $this->input->post('ibu', true),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah', true),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu', true),
                'pekerjaan_mhs' => $this->input->post('pekerjaan', true),
                'alamat_ayah' => $this->input->post('alamat_ayah', true),
                'alamat_ibu' => $this->input->post('alamat_ibu', true),
                'prov_mhs' => $this->input->post('prov', true),
                'kab_mhs' => $this->input->post('kab', true),
                'kec_mhs' => $this->input->post('kec', true),
                'kel_mhs' => $this->input->post('kel', true),
                'alamat_mhs' => $this->input->post('alamat', true),
                'kontak_ayah' => $this->input->post('kontak_ayah', true),
                'kontak_ibu' => $this->input->post('kontak_ibu', true),
                'kontak_mhs' => $this->input->post('kontak', true),
                'email' => $this->input->post('email', true),
                'pendidikan' => $this->input->post('pendidikan', true),
                'prodi' => $this->input->post('prodi', true),
                'tahun_masuk' => $this->input->post('tahun_masuk', true),
                'foto' => $foto
            ];

            $this->db->insert('tbl_mahasiswa', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Induk Mahasiswa Berhasil Ditambahkan!</div>');
            redirect('admin/data_induk');
        }

    }

    function update_induk()
    {

        $config['upload_path']  = './assets/img/mhs/master/';
        $config['allowed_types']  = 'jpg|jpeg|png|PNG';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto')) {

            date_default_timezone_set("Asia/Makassar");

            $nimasli = $this->input->post('nimasli', true);
            $nim = $this->input->post('nim', true);
            $nama = $this->input->post('nama', true);
            $jenis_kelamin = $this->input->post('jk', true);
            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $agama = $this->input->post('agama', true);
            $nama_ayah = $this->input->post('ayah', true);
            $nama_ibu = $this->input->post('ibu', true);
            $pekerjaan_ayah = $this->input->post('pekerjaan_ayah', true);
            $pekerjaan_ibu = $this->input->post('pekerjaan_ibu', true);
            $pekerjaan_mhs = $this->input->post('pekerjaan', true);
            $alamat_ayah = $this->input->post('alamat_ayah', true);
            $alamat_ibu = $this->input->post('alamat_ibu', true);
            $prov_mhs = $this->input->post('prov', true);
            $kab_mhs = $this->input->post('kab', true);
            $kec_mhs = $this->input->post('kec', true);
            $kel_mhs = $this->input->post('kel', true);
            $alamat_mhs = $this->input->post('alamat', true);
            $kontak_ayah = $this->input->post('kontak_ayah', true);
            $kontak_ibu = $this->input->post('kontak_ibu', true);
            $kontak_mhs = $this->input->post('kontak', true);
            $email = $this->input->post('email', true);
            $pendidikan = $this->input->post('pendidikan', true);
            $prodi = $this->input->post('prodi', true);
            $tahun_masuk = $this->input->post('tahun_masuk', true);


            if ($prov_mhs == '') {
                $data = array(
                    'nim' => $nim,
                    'nama' => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'agama' => $agama,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'pekerjaan_ayah' => $pekerjaan_ayah,
                    'pekerjaan_ibu' => $pekerjaan_ibu,
                    'pekerjaan_mhs' => $pekerjaan_mhs,
                    'alamat_ayah' => $alamat_ayah,
                    'alamat_ibu' => $alamat_ibu,
                    'alamat_mhs' => $alamat_mhs,
                    'kontak_ayah' => $kontak_ayah,
                    'kontak_ibu' => $kontak_ibu,
                    'kontak_mhs' => $kontak_mhs,
                    'email' => $email,
                    'pendidikan' => $pendidikan,
                    'prodi' => $prodi,
                    'tahun_masuk' => $tahun_masuk
                );
            }else{
                $data = array(
                    'nim' => $nim,
                    'nama' => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'agama' => $agama,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'pekerjaan_ayah' => $pekerjaan_ayah,
                    'pekerjaan_ibu' => $pekerjaan_ibu,
                    'pekerjaan_mhs' => $pekerjaan_mhs,
                    'alamat_ayah' => $alamat_ayah,
                    'alamat_ibu' => $alamat_ibu,
                    'prov_mhs' => $prov_mhs,
                    'kab_mhs' => $kab_mhs,
                    'kec_mhs' => $kec_mhs,
                    'kel_mhs' => $kel_mhs,
                    'alamat_mhs' => $alamat_mhs,
                    'kontak_ayah' => $kontak_ayah,
                    'kontak_ibu' => $kontak_ibu,
                    'kontak_mhs' => $kontak_mhs,
                    'email' => $email,
                    'pendidikan' => $pendidikan,
                    'prodi' => $prodi,
                    'tahun_masuk' => $tahun_masuk
                );
            }

            $where = array(
                'nim' => $nimasli
            );

            $this->data_models->update($where, $data, 'tbl_mahasiswa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Diubah</div>');
            redirect('admin/data_induk');
        } else {

            date_default_timezone_set("Asia/Makassar");
            $foto = $this->upload->data();
            $foto = $foto['file_name'];

            $nimasli = $this->input->post('nimasli', true);
            $nim = $this->input->post('nim', true);
            $nama = $this->input->post('nama', true);
            $jenis_kelamin = $this->input->post('jk', true);
            $tempat_lahir = $this->input->post('tempat_lahir', true);
            $tgl_lahir = $this->input->post('tgl_lahir', true);
            $agama = $this->input->post('agama', true);
            $nama_ayah = $this->input->post('ayah', true);
            $nama_ibu = $this->input->post('ibu', true);
            $pekerjaan_ayah = $this->input->post('pekerjaan_ayah', true);
            $pekerjaan_ibu = $this->input->post('pekerjaan_ibu', true);
            $pekerjaan_mhs = $this->input->post('pekerjaan', true);
            $alamat_ayah = $this->input->post('alamat_ayah', true);
            $alamat_ibu = $this->input->post('alamat_ibu', true);
            $prov_mhs = $this->input->post('prov', true);
            $kab_mhs = $this->input->post('kab', true);
            $kec_mhs = $this->input->post('kec', true);
            $kel_mhs = $this->input->post('kel', true);
            $alamat_mhs = $this->input->post('alamat', true);
            $kontak_ayah = $this->input->post('kontak_ayah', true);
            $kontak_ibu = $this->input->post('kontak_ibu', true);
            $kontak_mhs = $this->input->post('kontak', true);
            $email = $this->input->post('email', true);
            $pendidikan = $this->input->post('pendidikan', true);
            $prodi = $this->input->post('prodi', true);
            $tahun_masuk = $this->input->post('tahun_masuk', true);


            if ($prov_mhs == '') {
                $data = array(
                    'nim' => $nim,
                    'nama' => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'agama' => $agama,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'pekerjaan_ayah' => $pekerjaan_ayah,
                    'pekerjaan_ibu' => $pekerjaan_ibu,
                    'pekerjaan_mhs' => $pekerjaan_mhs,
                    'alamat_ayah' => $alamat_ayah,
                    'alamat_ibu' => $alamat_ibu,
                    'alamat_mhs' => $alamat_mhs,
                    'kontak_ayah' => $kontak_ayah,
                    'kontak_ibu' => $kontak_ibu,
                    'kontak_mhs' => $kontak_mhs,
                    'email' => $email,
                    'pendidikan' => $pendidikan,
                    'prodi' => $prodi,
                    'tahun_masuk' => $tahun_masuk,
                    'foto' => $foto
                );
            }else{
                $data = array(
                    'nim' => $nim,
                    'nama' => $nama,
                    'jenis_kelamin' => $jenis_kelamin,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'agama' => $agama,
                    'nama_ayah' => $nama_ayah,
                    'nama_ibu' => $nama_ibu,
                    'pekerjaan_ayah' => $pekerjaan_ayah,
                    'pekerjaan_ibu' => $pekerjaan_ibu,
                    'pekerjaan_mhs' => $pekerjaan_mhs,
                    'alamat_ayah' => $alamat_ayah,
                    'alamat_ibu' => $alamat_ibu,
                    'prov_mhs' => $prov_mhs,
                    'kab_mhs' => $kab_mhs,
                    'kec_mhs' => $kec_mhs,
                    'kel_mhs' => $kel_mhs,
                    'alamat_mhs' => $alamat_mhs,
                    'kontak_ayah' => $kontak_ayah,
                    'kontak_ibu' => $kontak_ibu,
                    'kontak_mhs' => $kontak_mhs,
                    'email' => $email,
                    'pendidikan' => $pendidikan,
                    'prodi' => $prodi,
                    'tahun_masuk' => $tahun_masuk,
                    'foto' => $foto
                );
            }

            $where = array(
                'nim' => $nimasli
            );

            $this->data_models->update($where, $data, 'tbl_mahasiswa');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">sejarah Berhasil Diubah</div>');
            redirect('admin/data_induk');
        }

    }

    function hapus_induk($nim)
    {

        $where = array(
            'nim' => $nim
        );

        $this->data_models->hapus($where, 'tbl_mahasiswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('admin/data_induk');

    }

    public function cetak_induk()
    {
        $filter = $this->input->post('filter');

        $waktu = $this->input->post('waktu');
        $jk = $this->input->post('jk');
        $kab = $this->input->post('kabcetak');
        $waktu1 =  $this->input->post('waktu1');
        $waktu2 =  $this->input->post('waktu2');

        if($filter=='Tahun Masuk'){

            $data['mahasiswa'] = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE tahun_masuk = '$waktu' ORDER BY tahun_masuk DESC")->result();

        }elseif($filter=='Jenis Kelamin'){

            $data['mahasiswa'] = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE jenis_kelamin = '$jk'  ORDER BY tahun_masuk DESC")->result();

        }elseif ($filter=='Kabupaten/Kota') {

            $data['mahasiswa'] = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE kab_mhs = '$kab' ORDER BY tahun_masuk DESC")->result();

        }elseif ($filter=='Rentang Tahun Masuk') {

            $data['mahasiswa'] = $this->db->query("SELECT * FROM tbl_mahasiswa WHERE tahun_masuk BETWEEN '%".$waktu1."' AND '%".$waktu2."' ORDER BY tahun_masuk DESC")->result();

        }else{

            $data['mahasiswa'] = $this->db->query("SELECT * FROM tbl_mahasiswa ORDER BY tahun_masuk DESC")->result();

        }


        $this->load->view('admin/cetak/mahasiswa', $data);
    }


    //Data Tema======================================================

    public function data_tema()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'tema';
            $data['title'] = 'Kelola Sejarah | Admin';


            $data['data'] = $this->data_models->data('tbl_tema')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/tema/tema', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function ajukan_tema()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'tema';
            $data['title'] = 'Tambah Data Pengajuan Tema | Admin';


            $data['data'] = $this->data_models->data('tbl_tema')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/tema/ajukan-tema', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function tambah_tema()
    {
        $config['upload_path']  = './assets/img/mhs/ttd/';
        $config['allowed_types']  = 'png|PNG';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('ttd')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Tema gagal diajukan karena gagal mengunggah gambar!</div>');
            redirect('admin/ajukan_tema');
        } else {
            date_default_timezone_set("Asia/Makassar");
            $nim = $this->input->post('nim');
            $where = array(
                'nim' => $nim
            );

            $data['datamhs'] = $this->data_models->edit($where, 'tbl_mahasiswa')->result();


            foreach ($data['datamhs'] as $mhs) {
                $nama = $mhs->nama;
                $kontak_mhs = $mhs->kontak_mhs;
            }
            $tanggal = date("Y-m-d");
            $ttd = $this->upload->data();
            $ttd = $ttd['file_name'];
            $data = [

                'nim' => $nim,
                'nama' => $nama,
                'kontak_mhs' => $kontak_mhs,
                'status_mhs' => $this->input->post('status_mhs', true),
                'konsentrasi' => $this->input->post('konsentrasi', true),
                'tgl_pengajuan' => $tanggal,
                'dospem1' => '',
                'dospem2' => '',
                'ttd' => $ttd,
                'masalah' => $this->input->post('masalah', true),
                'solusi' => $this->input->post('usulan', true),
                'software' => $this->input->post('software', true)
            ];

            $this->db->insert('tbl_tema', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tema Berhasil Diajukan!</div>');
            redirect('admin/data_tema');
        }
    }

    public function edit_tema($nim)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'induk';

            $where = array( 
                'nim' => $nim
            );
            $data['tema'] = $this->data_models->edit($where, 'tbl_tema')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/tema/edit-tema', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    function update_tema()
    {

        $config['upload_path']  = './assets/img/mhs/ttd/';
        $config['allowed_types']  = 'png|PNG';
        $this->load->library('upload', $config);

        $nimpilih = $this->input->post('nimpilih');
        $nim = $this->input->post('nim');
        $wheres = array(
            'nim' => $nim
        );

        $data['datamhs'] = $this->data_models->edit($wheres, 'tbl_mahasiswa')->result();


        foreach ($data['datamhs'] as $mhs) {
            $nama = $mhs->nama;
            $kontak_mhs = $mhs->kontak_mhs;
        }
        $tanggal = date("Y-m-d");


        if ( ! $this->upload->do_upload('ttd')) {


            $data = array(
                'nim' => $nim,
                'nama' => $nama,
                'kontak_mhs' => $kontak_mhs,
                'status_mhs' => $this->input->post('status_mhs', true),
                'konsentrasi' => $this->input->post('konsentrasi', true),
                'tgl_pengajuan' => $this->input->post('tgl_pengajuan', true),
                'dospem1' => $this->input->post('dospem1', true),
                'dospem2' => $this->input->post('dospem2', true),
                'masalah' => $this->input->post('masalah', true),
                'solusi' => $this->input->post('usulan', true),
                'software' => $this->input->post('software', true)
            );

            $where = array(
                'nim' => $nimpilih
            );

            $this->data_models->update($where, $data, 'tbl_tema');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pengajuan Tema Berhasil Diperbaharui</div>');
            redirect('admin/data_tema');
        } else {

            $ttd = $this->upload->data();
            $ttd = $ttd['file_name'];

            $data = array(
                'nim' => $nim,
                'nama' => $nama,
                'kontak_mhs' => $kontak_mhs,
                'status_mhs' => $this->input->post('status_mhs', true),
                'konsentrasi' => $this->input->post('konsentrasi', true),
                'tgl_pengajuan' => $this->input->post('tgl_pengajuan', true),
                'dospem1' => $this->input->post('dospem1', true),
                'dospem2' => $this->input->post('dospem2', true),
                'ttd' => $ttd,
                'masalah' => $this->input->post('masalah', true),
                'solusi' => $this->input->post('usulan', true),
                'software' => $this->input->post('software', true)
            );

            $where = array(
                'nim' => $nimpilih
            );

            $this->data_models->update($where, $data, 'tbl_tema');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pengajuan Tema Berhasil Diperbaharui</div>');
            redirect('admin/data_tema');
        }

    }

    function hapus_tema($nim)
    {

        $where = array(
            'nim' => $nim
        );

        $this->data_models->hapus($where, 'tbl_tema');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('admin/data_tema');

    }

    public function cetak_tema($nim)
    {
        $where = array(
            'nim' => $nim
        );
        $data['tema'] = $this->data_models->edit($where, 'tbl_tema')->result();
        $data['mahasiswa'] = $this->data_models->edit($where, 'tbl_mahasiswa')->result();
        $data['yudisium'] = $this->data_models->edit($where, 'tbl_yudisium')->result();

        $this->load->view('admin/cetak/tema', $data);
    }


    function setujui_tema()
    {
        $nim = $this->input->post('nim');

        $data = array(
            'dospem1' => $this->input->post('dospem1', true),
            'dospem2' => $this->input->post('dospem2', true)
        );

        $where = array(
            'nim' => $nim
        );

        $this->data_models->update($where, $data, 'tbl_tema');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pengajuan Tema Berhasil Disetujui</div>');
        redirect('admin/data_tema');

    }


    function batal_setujui_tema($nim)
    {

        $data = array(
            'dospem1' => '',
            'dospem2' => ''
        );

        $where = array(
            'nim' => $nim
        );

        $this->data_models->update($where, $data, 'tbl_tema');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Persetujuan Tema Berhasil Dibatalkan</div>');
        redirect('admin/data_tema');

    }


    //Data Yudisium======================================================

    public function data_yudisium()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'yudisium';
            $data['title'] = 'Kelola Sejarah | Admin';


            $data['data'] = $this->data_models->data('tbl_yudisium')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/yudisium/yudisium', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function tambah_yudisium()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'sejarah';
            $data['title'] = 'Tambah Data Sejarah | Admin';


            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/yudisium/tambah-yudisium', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function edit_yudisium($nim)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'induk';

            $where = array( 
                'nim' => $nim
            );
            $data['yudisium'] = $this->data_models->edit($where, 'tbl_yudisium')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/yudisium/edit-yudisium', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    function simpan_yudisium()
    {            
        $nim = $this->input->post('nim');
        $tgl_yudisium = $this->input->post('tgl_yudisium');
        $wheres = array(
            'nim' => $nim
        );

        $data['datamhs'] = $this->data_models->edit($wheres, 'tbl_mahasiswa')->result();


        foreach ($data['datamhs'] as $mhs) {
            $nama = $mhs->nama;
            $tgl_masuk = $mhs->tahun_masuk;
        }
        $date1 = date_create(date('Y-m-d',strtotime($tgl_masuk))); 
        $date2 = date_create(date('Y-m-d',strtotime($tgl_yudisium))); 


        $interval = date_diff($date1, $date2); 

        if($interval->y!='0' && $interval->m!='0'){
            $lama_studi = $interval->y . " Tahun " . $interval->m." Bulan ";
        }elseif ($interval->y!='0' && $interval->m=='0') {
            $lama_studi = $interval->y . " Tahun ";
        }elseif ($interval->y=='0' && $interval->m!='0') {
            $lama_studi = $interval->m." Bulan ";
        }
        $data = [

            'nim' => $nim,
            'nama' => $nama,
            'tgl_yudisium' => $tgl_yudisium,
            'tgl_ujian_proposal' => $this->input->post('tgl_sempro', true),
            'judul_skripsi' => $this->input->post('judul', true),
            'penguji_1' => $this->input->post('penguji1', true),
            'penguji_2' => $this->input->post('penguji2', true),
            'penguji_3' => $this->input->post('penguji3', true),
            'penguji_4' => $this->input->post('penguji4', true),
            'tgl_ujian_skripsi' => $this->input->post('tgl_ujian', true),
            'nilai' => $this->input->post('nilai', true),
            'lama_studi' => $lama_studi,
            'total_sks' => $this->input->post('total_sks', true),
            'ipk' => $this->input->post('ipk', true),
            'predikat' => $this->input->post('predikat', true)
        ];

        $this->db->insert('tbl_yudisium', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Yudisium Berhasil Ditambahkan!</div>');
        redirect('admin/data_yudisium');

    }

    function update_yudisium()
    {

        $nimpilih = $this->input->post('nimpilih');
        $nim = $this->input->post('nim');
        $tgl_yudisium = $this->input->post('tgl_yudisium');
        $wheres = array(
            'nim' => $nim
        );

        $data['datamhs'] = $this->data_models->edit($wheres, 'tbl_mahasiswa')->result();


        foreach ($data['datamhs'] as $mhs) {
            $nama = $mhs->nama;
            $tgl_masuk = $mhs->tahun_masuk;
        }
        $date1 = date_create(date('Y-m-d',strtotime($tgl_masuk))); 
        $date2 = date_create(date('Y-m-d',strtotime($tgl_yudisium))); 


        $interval = date_diff($date1, $date2); 

        if($interval->y!='0' && $interval->m!='0'){
            $lama_studi = $interval->y . " Tahun " . $interval->m." Bulan ";
        }elseif ($interval->y!='0' && $interval->m=='0') {
            $lama_studi = $interval->y . " Tahun ";
        }elseif ($interval->y=='0' && $interval->m!='0') {
            $lama_studi = $interval->m." Bulan ";
        }


        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'tgl_yudisium' => $tgl_yudisium,
            'tgl_ujian_proposal' => $this->input->post('tgl_sempro', true),
            'judul_skripsi' => $this->input->post('judul', true),
            'penguji_1' => $this->input->post('penguji1', true),
            'penguji_2' => $this->input->post('penguji2', true),
            'penguji_3' => $this->input->post('penguji3', true),
            'penguji_4' => $this->input->post('penguji4', true),
            'tgl_ujian_skripsi' => $this->input->post('tgl_ujian', true),
            'nilai' => $this->input->post('nilai', true),
            'lama_studi' => $lama_studi,
            'total_sks' => $this->input->post('total_sks', true),
            'ipk' => $this->input->post('ipk', true),
            'predikat' => $this->input->post('predikat', true)
        );

        $where = array(
            'nim' => $nimpilih
        );

        $this->data_models->update($where, $data, 'tbl_yudisium');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Yudisium Berhasil Diperbaharui!</div>');
        redirect('admin/data_yudisium');


    }

    function hapus_yudisium($nim)
    {

        $where = array(
            'nim' => $nim
        );

        $this->data_models->hapus($where, 'tbl_yudisium');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('admin/data_yudisium');

    }


    public function cetak_yudisium()
    {
        $filter = $this->input->post('filter');

        $waktu = $this->input->post('waktu');
        $waktu1 =  $this->input->post('waktu1');
        $waktu2 =  $this->input->post('waktu2');

        if($filter=='Harian'){
            $data['yudisium'] = $this->db->query("SELECT * FROM tbl_yudisium WHERE tgl_yudisium = 'waktu' ORDER BY tgl_yudisium DESC")->result();
        }elseif($filter=='Bulanan'){
            $data['yudisium'] = $this->db->query("SELECT * FROM tbl_yudisium WHERE tgl_yudisium LIKE '".$waktu."%' ORDER BY tgl_yudisium DESC")->result();
        }elseif ($filter=='Tahunan') {
            $data['yudisium'] = $this->db->query("SELECT * FROM tbl_yudisium WHERE tgl_yudisium LIKE '".$waktu."%' ORDER BY tgl_yudisium DESC")->result();
        }elseif ($filter=='Semester') {
            $data['yudisium'] = $this->db->query("SELECT * FROM tbl_yudisium WHERE tgl_yudisium BETWEEN '".$waktu1."' AND '".$waktu2."' ORDER BY tgl_yudisium DESC")->result();
        }else{
            $data['yudisium'] = $this->db->query("SELECT * FROM tbl_yudisium ORDER BY tgl_yudisium DESC")->result();
        }


        $this->load->view('admin/cetak/yudisium', $data);
    }


    //Data Alumni===================================================

    public function data_alumni()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'alumni';
            $data['title'] = 'Kelola Sejarah | Admin';


            $data['data'] = $this->data_models->data('tbl_alumni')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/alumni/alumni', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function tambah_alumni()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'alumni';
            $data['title'] = 'Tambah Data Alumni | Admin';


            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/alumni/tambah-alumni', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    public function edit_alumni($nim)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' =>
            $this->session->userdata('username')])->row_array();
        if (isset($data['admin']['username']) == true) {

            $data['maktif'] = 'alumni';
            $data['title'] = 'Edit Data Alumni | Admin';

            $where = array(
                'nim' => $nim
            );
            $data['alumni'] = $this->data_models->edit($where, 'tbl_alumni')->result();

            $this->load->view('admin/include/header', $data);
            $this->load->view('admin/alumni/edit-alumni', $data);
            $this->load->view('admin/include/footer');
        } else {
            redirect('admin/login');
        }
    }

    function simpan_alumni()
    {

        $config['upload_path']  = './assets/img/mhs/alumni/';
        $config['allowed_types']  = 'jpg|jpeg|png|PNG';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto')) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data alumni gagal ditambahakan karena gagal mengunggah foto!</div>');
            redirect('admin/tambah_alumni');
        } else {
            date_default_timezone_set("Asia/Makassar");
            $tanggal = date("Y-m-d");
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $data = [

                'nim' => $this->input->post('nim', true),
                'tgl_lulus' => $this->input->post('tgl_lulus', true),
                'foto' => $foto
            ];

            $this->db->insert('tbl_alumni', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Alumni Berhasil Ditambahkan!</div>');
            redirect('admin/data_alumni');
        }

    }

    function update_alumni()
    {

        $nimpilih = $this->input->post('nimpilih');

        $config['upload_path']  = './assets/img/mhs/alumni/';
        $config['allowed_types']  = 'jpg|jpeg|png|PNG';
        $this->load->library('upload', $config);

        $where = array(
            'nim' => $nimpilih
        );

        if ( ! $this->upload->do_upload('foto')) {
            date_default_timezone_set("Asia/Makassar");
            $tanggal = date("Y-m-d");
            $data = array(

                'nim' => $this->input->post('nim', true),
                'tgl_lulus' => $this->input->post('tgl_lulus', true)
            );

            $this->data_models->update($where, $data, 'tbl_alumni');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Alumni Berhasil Diperbaharui!</div>');
            redirect('admin/data_alumni');
        } else {
            date_default_timezone_set("Asia/Makassar");
            $tanggal = date("Y-m-d");
            $foto = $this->upload->data();
            $foto = $foto['file_name'];
            $data = array(

                'nim' => $this->input->post('nim', true),
                'tgl_lulus' => $this->input->post('tgl_lulus', true),
                'foto' => $foto
            );

            $this->data_models->update($where, $data, 'tbl_alumni');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Alumni Berhasil Diperbaharui!</div>');
            redirect('admin/data_alumni');
        }

    }

    function hapus_alumni($nim)
    {

        $where = array(
            'nim' => $nim
        );

        $this->data_models->hapus($where, 'tbl_alumni');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Berhasil Dihapus</div>');
        redirect('admin/data_alumni');

    }

    public function cetak_peralumni($nim)
    {
        $where = array(
            'nim' => $nim
        );
        $data['alumni'] = $this->data_models->edit($where, 'tbl_alumni')->result();
        $data['mahasiswa'] = $this->data_models->edit($where, 'tbl_mahasiswa')->result();
        $data['yudisium'] = $this->data_models->edit($where, 'tbl_yudisium')->result();
        $this->load->view('admin/cetak/alumni', $data);
    }

    public function cetak_alumni()
    {
        $filter = $this->input->post('filter');

        $waktu = $this->input->post('waktu');
        $waktu1 =  $this->input->post('waktu1');
        $waktu2 =  $this->input->post('waktu2');

        if($filter=='Harian'){
            $data['alumni'] = $this->db->query("SELECT * FROM tbl_alumni WHERE tgl_lulus = 'waktu' ORDER BY tgl_lulus DESC")->result();
        }elseif($filter=='Bulanan'){
            $data['alumni'] = $this->db->query("SELECT * FROM tbl_alumni WHERE tgl_lulus LIKE '".$waktu."%' ORDER BY tgl_lulus DESC")->result();
        }elseif ($filter=='Tahunan') {
            $data['alumni'] = $this->db->query("SELECT * FROM tbl_alumni WHERE tgl_lulus LIKE '".$waktu."%' ORDER BY tgl_lulus DESC")->result();
        }elseif ($filter=='Semester') {
            $data['alumni'] = $this->db->query("SELECT * FROM tbl_alumni WHERE tgl_lulus BETWEEN '".$waktu1."' AND '".$waktu2."' ORDER BY tgl_lulus DESC")->result();
        }else{
            $data['alumni'] = $this->db->query("SELECT * FROM tbl_alumni ORDER BY tgl_lulus DESC")->result();
        }


        $this->load->view('admin/cetak/alumni', $data);
    }


    //Ganti Password===========================================================

    function ganti_password()
    {

        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = array(
            'password' => $password
        );

        $where = array(
            'username' => $this->session->userdata('username')
        );

        $this->data_admin->update_admin($where, $data, 'admin');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, Anda Berhasil Mendaftar! Silahkan Menunggu Sampai Akun Anda Aktif Untuk Login!</div>');
        redirect('admin');
    }


    //Logout===========================================================


    public function logout()
    {

        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Keluar!</div>');
        redirect('admin/');
    }
} 
