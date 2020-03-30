<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Tentor extends CI_Controller {

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
                //pagination
                $this->load->library('pagination');

                //config
                $config[base_url] = 'http://localhost/LBBnoermandiri'

                $this->load->model('M_tentor');
                $rows = $this->M_tentor->tampilkanSemua()->result();
                $data = array(
                        'tentor'     => $rows,
        	            'title'     => 'Data Tentor',
        	            'content'   => 'tabel/t_tentor',
        	            'judul'     => 'Data Tentor',
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
                'judul'     => 'Form Tambah Data Tentor',
                'title'     => 'Input Data Tentor',
                'content'   => 'form/f_tambah_tentor',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'nama', 'required|max_length[30]',[
                'required' =>'Nama tidak boleh kosong',
                'max_length'=> 'Nama maksimal 30 karakter']);
            $this->form_validation->set_rules('alamat', 'alamat', 'required|max_length[50]',[
                'required' =>'Alamat tidak boleh kosong',
                'max_length'=> 'Alamat maksimal 50 karakter']);
            $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required',[
                'required' =>'Tanggal lahir tidak boleh kosong']);
            $this->form_validation->set_rules('notelp', 'notelp', 'required|max_length[13]|numeric',[
                'required' =>'Telepon tidak boleh kosong',
                'max_length'=> 'Telepon maksimal 13 karakter']);
            $this->form_validation->set_rules('email', 'email', 'required|max_length[50]',[
                'required' =>'Email tidak boleh kosong',
                'max_length'=> 'Email maksimal 50 karakter']);
            $this->form_validation->set_rules('mapel','mapel', 'required',['required' => 'Mata pelajaran tidak boleh kosong']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_PEGAWAI'          => '',
                            'ID_MAPEL'            => $this->input->post('mapel', TRUE),
                            'ID_JABATAN'          => 'TNTR',
                            'NAMA_PEGAWAI'        => $this->input->post('nama', TRUE),
                            'ALAMAT_PEGAWAI'      => $this->input->post('alamat', TRUE),
                            'TGL_LAHIR_PEG'       => $this->input->post('tgl_lahir', TRUE),
                            'NOTELP_PEGAWAI'      => $this->input->post('notelp', TRUE),
                            'EMAIL'               => $this->input->post('email', TRUE),
                            'LEVEL'               => '3',
                            'STATUS'              => '1',
                            'PASSWORD_PEGAWAI'    => MD5($this->input->post('notelp', TRUE)),

                        );
                        $this->load->model('M_pegawai');
                        $this->M_pegawai->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('Tentor'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">', '</div>');

            //rules validasi
            $this->form_validation->set_rules('nama_edit', 'NAMA', 'required|max_length[30]',[
                'required' =>'Nama tidak boleh kosong',
                'max_length'=> 'Nama maksimal 30 karakter']);
            $this->form_validation->set_rules('alamat_edit', 'ALAMAT', 'required|max_length[50]',[
                'required' =>'Alamat tidak boleh kosong',
                'max_length'=> 'Alamat maksimal 50 karakter']);
            $this->form_validation->set_rules('tgl_lahir_edit', 'TANGGAL LAHIR', 'required',[
                'required' =>'Tanggal Lahir tidak boleh kosong']);
            $this->form_validation->set_rules('notelp_edit', 'TELEPON', 'required|max_length[13]|numeric',[
                'required' =>'No Telepon tidak boleh kosong',
                'max_length'=> 'No Telepon maksimal 13 karakter']);
            $this->form_validation->set_rules('email_edit', 'TELEPON', 'required|max_length[50]',[
                'required' =>'Email tidak boleh kosong',
                'max_length'=> 'Email maksimal 50 karakter']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->session->set_flashdata('flash','error');
                    redirect(site_url('Pegawai'));
                    } else {    
                    //jika validasi berhasil
                        $id = $this->input->post('id_edit', TRUE);
                        $data = array(
                            'NAMA_PEGAWAI'          => $this->input->post('nama_edit', TRUE),
                            'ALAMAT_PEGAWAI'        => $this->input->post('alamat_edit', TRUE),
                            'TGL_LAHIR_PEG'         => $this->input->post('tgl_lahir_edit', TRUE),
                            'NOTELP_PEGAWAI'        => $this->input->post('notelp_edit', TRUE),
                            'EMAIL'                 => $this->input->post('email_edit', TRUE),
                            'STATUS'                => $this->input->post('status_edit', TRUE)
                        );
                        $this->load->model('M_pegawai');
                        $this->M_pegawai->update($data, $id);
                        $this->session->set_flashdata('flash','ubah');

                        redirect(site_url('Tentor'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>