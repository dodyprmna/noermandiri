<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Kelas extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_kelas');
                $rows = $this->M_kelas->tampilkanSemua()->result();
                $data = array(
                        'kelas'     => $rows,
        	            'title'     => 'Data Kelompok Belajar',
        	            'content'   => 'tabel/t_kelas',
        	            'judul'     => 'Data Kelompok Belajar',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $this->load->model('M_jenjang_kelas');
            $rows = $this->M_jenjang_kelas->TampilkanSemua()->result();
            $data = array(
                'jenjang' => $rows,
                'judul'     => 'Form Tambah Data Kelompok Belajar',
                'title'     => 'Tambah Data Kelompok Belajar',
                'content'   => 'form/f_kelas',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            //rules validasi
            $this->form_validation->set_rules('nama_kelas', 'NAMA KELAS', 'required|min_length[7]|max_length[7]',[
                'required' =>'Nama kelas tidak boleh kosong',
                'min_length' => 'Nama kelas minimal 7 karakter',
                'max_length'=> 'Nama kelas maksimal 7 karakter']);
            $this->form_validation->set_rules('jenjang','ID JENJANG', 'required',['required' => 'Jenjang Kelas tidak boleh kosong']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_KELAS'      =>  str_replace(' ', '', $this->input->post('nama_kelas', TRUE)),
                            'ID_JENJANG'    => $this->input->post('jenjang', TRUE),
                            'NAMA_KELAS'    => $this->input->post('nama_kelas', TRUE),
                        );
                        $this->load->model('M_kelas');
                        $this->M_kelas->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('Kelas'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function tampilKelas()
        {
            $jenjang = $this->input->post('jenjang',TRUE);
            $this->load->model('M_kelas');
            $data    = $this->M_kelas->getKelas($jenjang)->result();
            echo json_encode($data);
        }
    }
?>