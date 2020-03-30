<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Siswa extends CI_Controller {

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
                $this->load->model('M_siswa');
                $row = $this->M_siswa->tampilkanSemua()->result();
                $data = array(
                        'murid'    => $row, 
        	            'title'    => 'Data Siswa',
        	            'content'  => 'tabel/t_siswa',
        	            'judul' => 'Data Siswa',
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        function simpan()
        {
            if($this->session->userdata('akses') == 'admin'){
                $id = $this->input->post('no_regist', TRUE);
                $this->load->model('M_siswa');
                $data = array(
                    'NOINDUK'            => '',
                    'ID_KELAS'           => $this->input->post('kelas', TRUE),
                    'NAMA_SISWA'         => $this->input->post('nama', TRUE),
                    'ALAMAT_SISWA'       => $this->input->post('alamat', TRUE),
                    'TGL_LAHIR_SISWA'    => $this->input->post('tgl_lahir',TRUE),
                    'JENIS_KELAMIN'      => $this->input->post('jk', TRUE),
                    'EMAIL_SISWA'        => $this->input->post('email', TRUE),
                    'NOTELP_ORTU_SISWA'  => $this->input->post('telp_ortu', TRUE),
                    'NOTELP_SISWA'       => $this->input->post('telp', TRUE),
                    'ASAL_SEKOLAH'       => $this->input->post('asal_sekolah', TRUE),
                    'STATUS_SISWA'       => '1',
                    'PASSWORD_SISWA'     => MD5($this->input->post('telp', TRUE))
                );
                $this->db->insert('siswa', $data);
                $this->session->set_flashdata('flash','Disimpan');
                redirect(site_url('Siswa'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }