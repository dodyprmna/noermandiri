<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pegawai extends CI_Controller {

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
                $this->load->model('M_pegawai');
                $this->load->library('pagination');

                // filter search
                if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('keyword');
                }else{
                    $d['keyword'] = null;
                }

                //config
                $config['base_url'] = 'http://localhost/LBBNoermandiri/Pegawai/index';
                $this->db->like('NAMA_PEGAWAI',$d['keyword']);
                $this->db->from('pegawai');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 5;

                //initialize
                $this->pagination->initialize($config);

                $d['start'] = $this->uri->segment(3);
                $rows = $this->M_pegawai->tampilkanSemua($config['per_page'],$d['start'],$d['keyword'])->result();
                $data = array(
                        'peg'          => $rows,
        	            'title'        => 'Data Pegawai',
        	            'content'      => 'tabel/t_pegawai',
        	            'judul'        => 'Data Pegawai',
                        'start'        => $this->uri->segment(3)
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
                'judul'     => 'Form Tambah Data Pegawai',
                'title'     => 'Tambah data pegawai',
                'content'   => 'form/f_tambah_pegawai',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'nama', 'required|max_length[30]',[
                'required' =>'*nama tidak boleh kosong',
                'max_length'=> '*nama maksimal 30 karakter']);
            $this->form_validation->set_rules('alamat', 'alamat', 'required|max_length[50]',[
                'required' =>'*alamat tidak boleh kosong',
                'max_length'=> '*alamat maksimal 50 karakter']);
            $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required',[
                'required' =>'*tanggal lahir tidak boleh kosong']);
            $this->form_validation->set_rules('notelp', 'notelp', 'required|max_length[13]|numeric',[
                'required' =>'*telepon tidak boleh kosong',
                'max_length'=> '*telepon maksimal 13 karakter']);
            $this->form_validation->set_rules('email', 'email', 'required|max_length[50]',[
                'required' =>'*email tidak boleh kosong',
                'max_length'=> '*email maksimal 50 karakter']);
            $this->form_validation->set_rules('level','level', 'required',['required' => '*level tidak boleh kosong']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah pegawai
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_PEGAWAI'          => '',
                            'NAMA_PEGAWAI'        => $this->input->post('nama', TRUE),
                            'ALAMAT_PEGAWAI'      => $this->input->post('alamat', TRUE),
                            'JK_PEGAWAI'          => $this->input->post('jk', TRUE),
                            'TGL_LAHIR_PEG'       => $this->input->post('tgl_lahir', TRUE),
                            'NOTELP_PEGAWAI'      => $this->input->post('notelp', TRUE),
                            'EMAIL'               => $this->input->post('email', TRUE),
                            'LEVEL'               => $this->input->post('level', TRUE),
                            'PASSWORD_PEGAWAI'    => MD5($this->input->post('notelp', TRUE)),
                            'STATUS_PEGAWAI'      => '1'

                        );
                        $this->load->model('M_pegawai');
                        $this->M_pegawai->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('Pegawai'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

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
                            'STATUS_PEGAWAI'        => $this->input->post('status_edit', TRUE)
                        );
                        $this->load->model('M_pegawai');
                        $this->M_pegawai->update($data, $id);
                        $this->session->set_flashdata('flash','ubah');

                        redirect(site_url('Pegawai'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>