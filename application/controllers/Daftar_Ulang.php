<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Daftar_Ulang extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'siswa'){
                $this->load->model('M_jenjang_kelas');
                $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
                $data = array(
                        'jenjang'    => $row, 
        	            'title'    => 'Daftar Ulang',
        	            'content'  => 'form/f_daftar_ulang',
        	            'judul' => 'Daftar Ulang',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
    }