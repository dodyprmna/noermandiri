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
                $this->load->model('M_tentor');
                //pagination
                $this->load->library('pagination');

                // filter search
                if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('keyword');
                }else{
                    $d['keyword'] = null;
                }

                //config
                $config['base_url'] = 'http://localhost/LBBNoermandiri/Tentor/index';
                $this->db->like('NAMA_TENTOR',$d['keyword']);
                $this->db->from('tentor');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 5;

                //initialize
                $this->pagination->initialize($config);

                $dataa['start'] = $this->uri->segment(3);
                $rows = $this->M_tentor->tampilkanSemua($config['per_page'],$dataa['start'],$d['keyword'])->result();
                $data = array(
                        'tentor'     => $rows,
        	            'title'     => 'Data Tentor',
        	            'content'   => 'tabel/t_tentor',
        	            'judul'     => 'Data Tentor',
                        'start'     => $this->uri->segment(3)
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
            $this->load->model('M_API');
            $mata_ajar = $this->M_API->getAll('mata_pelajaran')->result();
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
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            //rules validasi
            $this->form_validation->set_rules('nama', 'nama', 'required|max_length[30]',[
                'required' =>'*nama tidak boleh kosong',
                'max_length'=> '*nama maksimal 30 karakter']);
            $this->form_validation->set_rules('alamat', 'alamat', 'required|max_length[50]',[
                'required' =>'*alamat tidak boleh kosong',
                'max_length'=> '*lamat maksimal 50 karakter']);
            $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required',[
                'required' =>'*tanggal lahir tidak boleh kosong']);
            $this->form_validation->set_rules('notelp', 'notelp', 'required|max_length[13]|numeric',[
                'required' =>'*telepon tidak boleh kosong',
                'max_length'=> '*telepon maksimal 13 karakter']);
            $this->form_validation->set_rules('email', 'email', 'required|max_length[50]',[
                'required' =>'*email tidak boleh kosong',
                'max_length'=> '*email maksimal 50 karakter']);
            $this->form_validation->set_rules('mapel','mapel', 'required',['required' => '*mata pelajaran tidak boleh kosong']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $data = array(
                            'ID_TENTOR'           => '',
                            'ID_MAPEL'            => $this->input->post('mapel', TRUE),
                            'NAMA_TENTOR'         => $this->input->post('nama', TRUE),
                            'JK_TENTOR'           => $this->input->post('jk', TRUE),
                            'ALAMAT_TENTOR'       => $this->input->post('alamat', TRUE),
                            'TGL_LAHIR_TENTOR'    => $this->input->post('tgl_lahir', TRUE),
                            'NOTELP_TENTOR'       => $this->input->post('notelp', TRUE),
                            'EMAIL_TENTOR'        => $this->input->post('email', TRUE),
                            'PASSWORD_TENTOR'     => MD5($this->input->post('notelp', TRUE)),
                            'STATUS_TENTOR'       => '1',

                        );
                        $this->load->model('M_API');
                        $this->M_API->saveData('tentor',$data);
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
                            'NAMA_TENTOR'           => $this->input->post('nama_edit', TRUE),
                            'ALAMAT_TENTOR'         => $this->input->post('alamat_edit', TRUE),
                            'TGL_LAHIR_TENTOR'      => $this->input->post('tgl_lahir_edit', TRUE),
                            'NOTELP_TENTOR'         => $this->input->post('notelp_edit', TRUE),
                            'EMAIL_TENTOR'          => $this->input->post('email_edit', TRUE),
                            'STATUS_TENTOR'         => $this->input->post('status_edit', TRUE)
                        );
                        $this->load->model('M_tentor');
                        $this->M_tentor->update($data, $id);
                        $this->session->set_flashdata('flash','ubah');

                        redirect(site_url('Tentor'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>