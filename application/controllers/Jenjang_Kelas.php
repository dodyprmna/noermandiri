<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Jenjang_Kelas extends CI_Controller {

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
                $this->load->model('M_jenjang_kelas');
                $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
                $data = array(
                        'jenjang'    => $row, 
        	            'title'    => 'Data Jenjang Kelas',
        	            'content'  => 'tabel/t_jenjang_kelas',
        	            'judul' => 'Data Jenjang Kelas',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah() {
            if($this->session->userdata('akses') == 'admin'){
            $this->load->library('form_validation');
            $data = array(
                'judul'     => 'Form Tambah Data Jenjang Kelas',
                'title'     => 'Tambah Data Jenjang Kelas',
                'content'   => 'form/f_jenjang_kelas',
            );
            $this->load->view('layout', $data);
            }else{//jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('nama_jenjang', 'NAMA JENJANG', 'required|min_length[3]|max_length[5]',['required' => 'Nama jenjang tidak boleh kosong',
                'min_length' => 'Nama jenjang minimal 3 karakter',
                'max_length' => 'Nama jenjang minimal 5 karakter',]);
            $this->form_validation->set_rules('biaya', 'BIAYA', 'required|min_length[7]|max_length[7]|integer|',['required' => 'biaya kelas tidak boleh kosong',
                'min_length' => 'Nama jenjang minimal 7 karakter',
                'max_length' => 'Nama jenjang minimal 7 karakter',
                'integer' => 'Biaya harus berupa angka']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_JENJANG'      =>  str_replace(' ', '', $this->input->post('nama_jenjang', TRUE)),
                            'NAMA_JENJANG'    => $this->input->post('nama_jenjang', TRUE),
                            'BIAYA'           => $this->input->post('biaya', TRUE),
                        );
                        $this->load->model('M_jenjang_kelas');
                        $this->M_jenjang_kelas->tambah($data);
                        $this->session->set_flashdata('success','Data berhasil disimpan');

                        redirect(site_url('Jenjang_Kelas'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }