<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Mata_Pelajaran extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
        }
        function index(){
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_mata_pelajaran');
                $this->load->library('pagination');

                $config['base_url'] = 'http://localhost/LBBNoermandiri/Mata_Pelajaran/index';
                $config['total_rows'] = $this->M_mata_pelajaran->hitung_mapel();
                $config['per_page'] = 5;

                //initialize
                $this->pagination->initialize($config);

                $d['start'] = $this->uri->segment(3);
                $rows = $this->M_mata_pelajaran->tampilkanSemua($config['per_page'],$d['start'])->result();
                $data = array(
                        'mata_ajar'    => $rows,
        	            'title'        => 'Data Mata Pelajaran',
        	            'content'      => 'tabel/t_mata_pelajaran',
        	            'judul'        => 'Data Mata Pelajaran',
                        'start'        => $this->uri->segment(3)
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        public function get_mapel(){
            $kode = $this->input->post('kode_mapel');
            $data =$this->M_mata_pelajaran->getMapelById($kode);
            echo json_encode($data);
        }
        public function tambah() {
            //jika sebagai admin
            if($this->session->userdata('akses') == 'admin'){

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">','</div>');
            
            $data = array(
                
                'judul'     => 'Form Tambah Mata Pelajaran',
                'title'     => 'Tambah Data Mata Pelajaran',
                'content'   => 'form/f_mata_pelajaran',
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
            $this->form_validation->set_error_delimiters('<div style="color:red; margin-bottom: 5px">','</div>');

            //rules validasi
            $this->form_validation->set_rules('id_mapel', 'ID Mapel', 'trim|required|min_length[3]|max_length[6]', [
                'required' => 'ID mapel tidak boleh kosong',
                'min_length'=>'Minimal 3 karakter',
                'max_length' => 'Maksimal 6 karakter']);

            $this->form_validation->set_rules('nama_mapel', 'ID Mapel', 'trim|required|min_length[3]|max_length[16]', [
                'required' => 'Nama mapel tidak boleh kosong',
                'min_length'=>'Minimal 3 karakter',
                'max_length' => 'Maksimal 16 karakter']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_MAPEL'   => $this->input->post('id_mapel', TRUE),
                            'NAMA_MAPEL'  => $this->input->post('nama_mapel', TRUE),
                        );

                        $this->load->model('M_mata_pelajaran');
                        $this->M_mata_pelajaran->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');

                        redirect(site_url('Mata_Pelajaran'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'admin'){
                $id = $this->input->post('id_edit', TRUE);
                $data = array(
                    'NAMA_MAPEL'     => $this->input->post('nama_edit', TRUE)
                );
                $this->load->model('M_mata_pelajaran');
                $this->M_mata_pelajaran->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('Mata_Pelajaran'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>