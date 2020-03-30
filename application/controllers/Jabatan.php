<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Jabatan extends CI_Controller {

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
                $this->load->model('M_jabatan');
                $row = $this->M_jabatan->tampilkanSemua()->result();
                $data = array(
                        'jabatan'    => $row, 
        	            'title'    => 'Data Jabatan',
        	            'content'  => 'tabel/t_jabatan',
        	            'judul' => 'Data Jabatan',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $this->load->library('form_validation');
            $this->load->model('M_mata_pelajaran');
            $mata_ajar = $this->M_mata_pelajaran->TampilkanSemua()->result();
            $data = array(
                'mata_ajar' => $mata_ajar,
                'judul'     => 'Form Tambah Jabatan',
                'title'     => 'Form Tambah Jabatan',
                'content'   => 'form/f_jabatan',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }