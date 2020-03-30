<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Ruangan extends CI_Controller {

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
                $this->load->model('M_ruangan');
                $rows = $this->M_ruangan->tampilkanSemua()->result();
                $data = array(
                        'ruangan'    => $rows,
        	            'title'        => 'Data Ruangan',
        	            'content'      => 'tabel/t_ruangan',
        	            'judul'        => 'Data Ruangan',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
            $data = array(
                'judul'     => 'Form Tambah Data Ruangan',
                'title'     => 'Tambah Data Ruangan',
                'content'   => 'form/f_ruangan',
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

            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'NAMA RUANGAN', 'required|min_length[9]|max_length[10]',['required' => 'Nama ruangan tidak boleh kosong',
                'min_length' => 'Nama ruangan minimal 9 karakter',
                'max_length' => 'Nama ruangan maksimal 10 karakter',]);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'NAMA_RUANGAN'    => $this->input->post('nama', TRUE),
                        );
                        $this->load->model('M_ruangan');
                        $this->M_ruangan->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('Ruangan'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>