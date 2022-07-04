<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
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

        $data['mahasiswa'] = $this->db->get_where('data_login', ['nim' =>
            $this->session->userdata('nim')])->row_array();
        if (isset($data['mahasiswa']['nim']) == true) {
            $this->tema();
        } else {
            $this->load->view('mahasiswa/login');
        } 
    }

    public function login()
    {

        $this->form_validation->set_rules('nim', 'nim', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('mahasiswa/login');
        } else {

            $this->_login();
        }
    }

    private function _login()
    {

        $nim = $this->input->post('nim');
        $password = $this->input->post('password');


        $mahasiswa = $this->db->get_where('data_login', ['nim' => $nim])->row_array();

        if ($mahasiswa) {

            if ($password == $mahasiswa['password']) {

                $data = [
                    'nim' => $mahasiswa['nim']
                ];

                $this->session->set_userdata($data);
                redirect('mahasiswa');
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('mahasiswa/login');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIM tersebut tidak dapat ditemukan!</div>');
            redirect('mahasiswa/login');
        }
    }



    public function tema()
    {

        $data['mahasiswa'] = $this->db->get_where('data_login', ['nim' =>
            $this->session->userdata('nim')])->row_array();
        if (isset($data['mahasiswa']['nim']) == true) {

            $nim = $data['mahasiswa']['nim'];

            $data['mahasiswa'] = $this->db->get_where('tbl_mahasiswa', ['nim' => $nim])->result();

            $data['tema_cek'] = $this->db->get_where('tbl_tema', ['nim' => $nim])->num_rows();
            $data['tema'] = $this->db->get_where('tbl_tema', ['nim' => $nim])->result();

            $hari = date('Y-m-d');
            $bulan = date('Y-m');
            $tahun = date('Y');

            $data['maktif'] = 'tema';

            $this->load->view('mahasiswa/include/header', $data);
            $this->load->view('mahasiswa/index');
            $this->load->view('mahasiswa/include/footer');
        }else {
            $this->load->view('mahasiswa/login');
        }
    }


    public function ajukan_tema()
    {

        $data['mahasiswa'] = $this->db->get_where('data_login', ['nim' =>
            $this->session->userdata('nim')])->row_array();
        if (isset($data['mahasiswa']['nim']) == true) {

            $nim = $data['mahasiswa']['nim'];

            $data['mahasiswa'] = $this->db->get_where('tbl_mahasiswa', ['nim' => $nim])->result();

            $data['tema_cek'] = $this->db->get_where('tbl_tema', ['nim' => $nim])->num_rows();
            $data['tema'] = $this->db->get_where('tbl_tema', ['nim' => $nim])->result();

            $hari = date('Y-m-d');
            $bulan = date('Y-m');
            $tahun = date('Y');

            $data['maktif'] = 'tema';

            $this->load->view('mahasiswa/include/header', $data);
            $this->load->view('mahasiswa/ajukan-tema');
            $this->load->view('mahasiswa/include/footer');
        }else {
            $this->load->view('mahasiswa/login');
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
            $data['datatema'] = $this->data_models->edit($where, 'tbl_tema')->num_rows();

            foreach ($data['datamhs'] as $mhs) {
                $nama = $mhs->nama;
                $kontak_mhs = $mhs->kontak_mhs;
            }

            $tanggal = date("Y-m-d");
            $ttd = $this->upload->data();
            $ttd = $ttd['file_name'];

            if ($data['datatema'] > 0) {

                $data = array(
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
                    'software' => $this->input->post('software', true),
                    'status' => '0'
                );

                $where = array(
                    'nim' => $nim
                );

                $this->data_models->update($where, $data, 'tbl_tema');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pengajuan Tema Berhasil Diperbaharui</div>');
                redirect('mahasiswa');
            }else{

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
                    'software' => $this->input->post('software', true),
                    'status' => '0'
                ];

                $this->db->insert('tbl_tema', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tema Berhasil Diajukan!</div>');
                redirect('mahasiswa');

            }
        }
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


    public function profile()
    {

        $data['mahasiswa'] = $this->db->get_where('data_login', ['nim' =>
            $this->session->userdata('nim')])->row_array();
        if (isset($data['mahasiswa']['nim']) == true) {

            $nim = $data['mahasiswa']['nim'];

            $data['mahasiswa'] = $this->db->get_where('tbl_mahasiswa', ['nim' => $nim])->result();

            $hari = date('Y-m-d');
            $bulan = date('Y-m');
            $tahun = date('Y');

            $data['maktif'] = 'profile';

            $this->load->view('mahasiswa/include/header', $data);
            $this->load->view('mahasiswa/profile');
            $this->load->view('mahasiswa/include/footer');
        }else {
            $this->load->view('mahasiswa/login');
        }
    }


    public function logout()
    {

        $this->session->unset_userdata('nim');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Keluar!</div>');
        redirect('mahasiswa/');
    }
}
