<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('data_berita');
        $this->load->model('data_kategori');
        $this->load->model('data_admin');
        $this->load->model('data_vismis');
        $this->load->model('data_sejarah');
        $this->load->model('data_layanan');
        $this->load->model('data_galeri');
        $this->load->model('data_kontak');
        $this->load->library('pagination');
    }

    public function index()
    {
        date_default_timezone_set('Asia/Makassar');

        $date = new DateTime("now");

        $curr_date = $date->format('Y-m-d');

        $data['maktif'] = 'home';
        $data['title'] = 'Selamat Datang';

        $data['berita'] = $this->data_berita->beritahome()->result();
        $data['sejarah'] = $this->data_sejarah->datasejarah()->result();
        $data['kontak'] = $this->data_kontak->datakontak()->result();

        $this->load->view('include/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('include/footer');
    }

    public function visi_misi()
    {
        date_default_timezone_set('Asia/Makassar');

        $date = new DateTime("now");

        $curr_date = $date->format('Y-m-d');

        $data['maktif'] = 'vismis';
        $data['title'] = 'Visi Misi Desa';

        $data['vismis'] = $this->data_vismis->datavismis()->result();
        $data['beritaside'] = $this->data_berita->beritaterbaru()->result();

        $this->load->view('include/header', $data);
        $this->load->view('home/visi-misi', $data);
        $this->load->view('include/side', $data);
        $this->load->view('include/footer');
    }

    public function sejarah()
    {
        date_default_timezone_set('Asia/Makassar');

        $date = new DateTime("now");

        $curr_date = $date->format('Y-m-d');

        $data['maktif'] = 'sejarah';
        $data['title'] = 'Sejarah Desa | Website Desa Padang Kalua';

        $data['sejarah'] = $this->data_sejarah->datasejarah()->result();
        $data['beritaside'] = $this->data_berita->beritaterbaru()->result();

        $this->load->view('include/header', $data);
        $this->load->view('home/sejarah', $data);
        $this->load->view('include/side', $data);
        $this->load->view('include/footer');
    }

    public function pelayanan_admistrasi($cat)
    {
        date_default_timezone_set('Asia/Makassar');

        $date = new DateTime("now");

        $curr_date = $date->format('Y-m-d');

        $data['maktif'] = 'layanan';
        $data['title'] = 'Syarat Pelayanan Administrasi | Website Desa Padang Kalua';

        if ($cat == 'umum') {
            $data['layananside'] = $this->data_layanan->datalayanan()->result();
            $data['categori'] = $cat;
            $data['layanan'] = $this->data_layanan->datalayanan()->result();
        }else{ 
            $where = array(
                'id_pelayanan' => $cat
            );
            $data['layanan'] = $this->data_layanan->edit_layanan($where, 'pelayanan_admistrasi')->result();
            $data['categori'] = $cat;
            $data['layananside'] = $this->data_layanan->datalayanan()->result(); 
        }

        $data['beritaside'] = $this->data_berita->beritaterbaru()->result();

        $this->load->view('include/header', $data);
        $this->load->view('include/side-kiri', $data);
        $this->load->view('home/syarat-layanan', $data);
        $this->load->view('include/footer');
    }

    public function galeri()
    {
        date_default_timezone_set('Asia/Makassar');

        $data['maktif'] = 'galeri';
        $data['title'] = 'Galeri | Website Desa Padang Kalua';

        $data['galeri'] = $this->data_galeri->datagaleri()->result();

        $this->load->view('include/header', $data);
        $this->load->view('home/galeri', $data);
        $this->load->view('include/footer');
    }

    public function berita()
    {
        date_default_timezone_set('Asia/Makassar');

        $date = new DateTime("now");

        $curr_date = $date->format('Y-m-d');

        $data['maktif'] = 'berita';
        $data['title'] = 'Halaman Berita';

        $data['beritaside'] = $this->data_berita->beritaterbaru()->result();

        $query = "SELECT * FROM berita ORDER BY tulisan_tanggal DESC"; // Query untuk menampilkan semua data siswa

        $config['base_url'] = base_url('home/berita');
        $config['total_rows'] = $this->db->query($query)->num_rows();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['first_link']       = 'Awal';
        $config['last_link']        = 'Akhir';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
        $query .= " LIMIT ".$page.", ".$config['per_page'];

        $data['limit'] = $config['per_page'];
        $data['total_rows'] = $config['total_rows'];
        $data['pagination'] = $this->pagination->create_links();
        $data['berita'] = $this->db->query($query)->result();


        $this->load->view('include/header', $data);
        $this->load->view('home/berita', $data);
        $this->load->view('include/side', $data);
        $this->load->view('include/footer');
    }

    public function baca_berita($id)
    {
        date_default_timezone_set('Asia/Makassar');

        $date = new DateTime("now");

        $curr_date = $date->format('d m Y');
        $where = array('tulisan_id' => $id);
        $data['maktif'] = 'berita';
        $data['berita'] = $this->data_berita->edit_berita($where, 'berita')->result();
        $data['beritajudul'] = $this->data_berita->edit_berita($where, 'berita')->row_array();
        $data['beritaside'] = $this->data_berita->beritaterbaru()->result();
        $data['title'] = ucwords($data['beritajudul']['tulisan_nama']).' | Website Desa Padang Kalua';

        $this->load->view('include/header', $data);
        $this->load->view('home/berita-baca', $data);
        $this->load->view('include/side', $data);
        $this->load->view('include/footer');
    }

    public function kontak()
    {
        $data['maktif'] = 'kontak';
        $data['title'] = 'Kontak | Website Desa Padang Kalua';

        $data['kontak'] = $this->data_kontak->datakontak()->result();

        $this->load->view('include/header', $data);
        $this->load->view('home/kontak', $data);
        $this->load->view('include/footer');
    }





    public function berita_terbaru() {
        $this->db->order_by('berita_tanggal', 'desc');
        return $this->db->get('postingan', 5);
    }
}
