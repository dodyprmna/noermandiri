<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Materi_pembelajaran extends CI_Controller {

    function __construct(){
        parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
        }
        $this->load->library('form_validation');
    }

    public function index(){
        if($this->session->userdata('akses') == 'siswa' || $this->session->userdata('akses') == 'tentor'){
            $this->load->model('M_mata_pelajaran');
            $rows = $this->M_mata_pelajaran->tampilMapel()->result();
            $data = array(
                    'mapel'     => $rows,
                    'title'     => 'Modul Pembelajaran',
                    'content'   => 'tabel/t_modul',
                    'judul'     => 'Modul Pembelajaran',
                );
                $this->load->view('layout', $data);
        }else{
            echo"<script>history.go(-1);</script>";
        }
    }

    public function tambah()
    {
        if($this->session->userdata('akses') == 'tentor'){
            $this->load->model('M_jenjang_kelas');
            $this->load->model('M_mata_pelajaran');
            $rows = $this->M_jenjang_kelas->tampilkanSemua()->result();
            $mapel = $this->M_mata_pelajaran->tampilMapel()->result();
            $data = array(
                    'jenjang'   => $rows,
                    'title'     => 'Upload Modul Pembelajaran',
                    'content'   => 'form/f_upload_modul',
                    'judul'     => 'Upload Modul Pembelajaran',
                    'mapel'     => $mapel
            );
            $this->load->view('layout', $data);
        }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
    }

	public function simpan()
    {
        if($this->session->userdata('akses') == 'tentor'){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            //rules validasi
            $this->form_validation->set_rules('judul', 'judul', 'required|max_length[20]',['required' => '*judul tidak boleh kosong',
                'max_length' => '*judul maksimal 20 karakter',]);
            if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                $this->tambah();
            } else {
                $config['upload_path']      = 'upload/modul-pembelajaran/';
                $config['allowed_types']    = 'pdf';
                $config['max_size']         = '5120';
                $config['file_name']        = $this->input->post('judul');
                $this->load->library('upload',$config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('modul')) {
                    $nama = $this->upload->data("file_name");
                    date_default_timezone_set('Asia/Jakarta');
                    $data = array(
                    'ID_MODUL'              => 'Modul_'.str_replace(' ', '_', $this->input->post('judul', TRUE)),
                    'ID_JENJANG'            => $this->input->post('jenjang',TRUE),
                    'ID_MAPEL'              => $this->input->post('mapel', TRUE),
                    'JUDUL'                 => $this->input->post('judul', TRUE),
                    'TANGGAL_UPLOAD_MODUL'  => date("Y-m-d H:i:s"),
                    'FILE'                  => str_replace(' ', '_', $nama),
                    );
                    $this->load->model('M_API');
                    $this->M_API->saveData('Materi_pembelajaran',$data);
                    $this->session->set_flashdata('flash','Disimpan');
                    redirect(site_url('Materi_pembelajaran'));
                }else{
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error',$error);
                    echo "<script>history.go(-1);</script>";
                }
            }
                
        }else{
            echo "TIDAK ADA AKSES";
        }
    }

    public function list($id)
    {
        $this->load->model('M_modul');
        $this->load->model('M_mata_pelajaran');
        $mapel = $this->M_mata_pelajaran->getById($id)->row();

        if ($this->session->userdata('akses') == 'tentor') {
            $modul = $this->M_modul->getByMapel($id)->result();
            $data = array(
                'modul'     => $modul,
                'judul'     => 'Daftar Modul '.$mapel->NAMA_MAPEL,
                'content'   => 'tabel/t_list_modul',
                'title'     => 'Daftar Modul '.$mapel->NAMA_MAPEL
            );
            $this->load->view('layout',$data);
        }elseif($this->session->userdata('akses') == 'siswa'){
            $modul = $this->M_modul->get_modul_siswa($id)->result();
            $data = array(
                'modul'     => $modul,
                'judul'     => 'Daftar Modul '.$mapel->NAMA_MAPEL,
                'content'   => 'tabel/t_list_modul',
                'title'     => 'Daftar Modul '.$mapel->NAMA_MAPEL
            );
            $this->load->view('layout',$data);
        }else{
            echo"<script>history.go(-1);</script>";
        }
         
    }

    public function download($id)
    {
        $this->load->helper('download');
        $this->load->model('M_modul');
        $judul = preg_replace('/%20/', ' '  , $id);
        $modul = $this->M_modul->getByJudul($judul)->row();
        force_download('upload/modul-pembelajaran/'.$modul->FILE,NULL);
    }

    function cek_data(){
        $judul = $this->input->post('judul',TRUE);
        $this->load->model('M_modul');
        $data = $this->M_modul->getByJudul($judul)->num_rows();
        echo json_encode($data);
    }

    public function hapus($id)
    {
        $mapel = $this->uri->segment(3);
        $this->load->model('M_modul');
        if ($this->session->userdata('akses')=='tentor') {
            $judul = preg_replace('/%20/', ' '  , $id);
            $modul = $this->M_modul->getByJudul($judul)->row();

            unlink('upload/modul-pembelajaran/'.$modul->FILE);

            $this->load->model('M_modul');
            $this->M_modul->hapus($modul->ID_MODUL);

            $this->session->set_flashdata('flash','Dihapus');
            redirect(site_url('Materi_pembelajaran/list/'.$modul->ID_MAPEL));
        }else{
            echo"<script>history.go(-1);</script>";
        }
    }

}