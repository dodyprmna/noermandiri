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
                $this->load->model('M_kelas');
                $kelas = $this->M_kelas->tampilkanSemua()->result();
                $this->load->library('pagination');

                // filter search
                if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('keyword');
                }else{
                    $d['keyword'] = null;
                }

                //config
                $config['base_url'] = 'http://localhost/LBBNoermandiri/Siswa/index';
                $this->db->like('NAMA_SISWA',$d['keyword']);
                $this->db->from('siswa');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 5;

                //initialize
                $this->pagination->initialize($config);

                $d['start'] = $this->uri->segment(3);
                $row = $this->M_siswa->tampilkanSemua($config['per_page'],$d['start'],$d['keyword'])->result();
                $data = array(
                        'murid'    => $row, 
        	            'title'    => 'Data Siswa',
        	            'content'  => 'tabel/t_siswa',
        	            'judul'    => 'Data Siswa',
                        'start'    => $this->uri->segment(3),
                        'kelas'    => $kelas
        	        );
        	        $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah(){
            $id = $this->input->post('no_pendaftaran');
            $this->load->model('M_kelas');
            $this->load->model('M_pendaftaran');
            $pendaftaran = $this->M_pendaftaran->getPendaftaranById($id)->row();
            $data = array(
                'kelas'         => $this->M_kelas->tampilkanSemua()->result(),
                'content'       => 'form/f_siswa',
                'title'         => 'Tambah Data Siswa',
                'judul'         => 'Form tambah siswa',
                'nama'          => $pendaftaran->NAMA_PENDAFTAR,
                'nama_jenjang'  => $pendaftaran->NAMA_JENJANG,
                'alamat'        => $pendaftaran->ALAMAT_PENDAFTAR,
                'tgl_lahir'     => $pendaftaran->TGL_LAHIR_PENDAFTAR,
                'jk'            => $pendaftaran->JENIS_KELAMIN,
                'email'         => $pendaftaran->EMAIL_PENDAFTAR,
                'telp_siswa'    => $pendaftaran->NOTELP_PENDAFTAR,
                'telp_ortu'     => $pendaftaran->NOTELP_ORTU,
                'sekolah'       => $pendaftaran->ASAL_SEKOLAH,
                'kelas'         => $this->M_kelas->getKelass($pendaftaran->ID_JENJANG)->result(),
            );
            $this->load->view('layout',$data);
        }

        function simpan()
        {
            if($this->session->userdata('akses') == 'admin'){
                $email = $this->input->post('email', TRUE);
                $this->load->model('M_siswa');
                $siswa = $this->M_siswa->getEmail($email)->result();
                if (count($siswa) == 0) {
                    $data = array(
                    'NO_INDUK'           => '',
                    'ID_KELAS'           => $this->input->post('kelas', TRUE),
                    'NAMA_SISWA'         => $this->input->post('nama', TRUE),
                    'ALAMAT_SISWA'       => $this->input->post('alamat', TRUE),
                    'TGL_LAHIR_SISWA'    => $this->input->post('tgl_lahir',TRUE),
                    'JK_SISWA'           => $this->input->post('jk', TRUE),
                    'EMAIL_SISWA'        => $this->input->post('email', TRUE),
                    'NOTELP_ORTU_SISWA'  => $this->input->post('telp_ortu', TRUE),
                    'NOTELP_SISWA'       => $this->input->post('telp', TRUE),
                    'ASAL_SEKOLAH'       => $this->input->post('asal_sekolah', TRUE),
                    'STATUS_SISWA'       => '1',
                    'PASSWORD_SISWA'     => MD5($this->input->post('telp', TRUE))
                    );
                    $this->load->model('M_siswa');
                    $this->db->insert('siswa', $data);
                    $this->session->set_flashdata('flash','Disimpan');
                    redirect(site_url('Pembayaran/pembayaran_daftar_siswa_baru'));
                }else{
                    redirect(site_url('Siswa'));
                }
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update(){
            if($this->session->userdata('akses') == 'admin'){
                $id = $this->input->post('noinduk_edit', TRUE);
                $data = array(
                    'NAMA_SISWA'          => $this->input->post('nama_edit', TRUE),
                    'ALAMAT_SISWA'        => $this->input->post('alamat_edit', TRUE),
                    'TGL_LAHIR_SISWA'     => $this->input->post('tgl_lahir_edit', TRUE),
                    'NOTELP_SISWA'        => $this->input->post('notelp_edit', TRUE),
                    'NOTELP_ORTU_SISWA'   => $this->input->post('notelp_ortu_edit', TRUE),
                    'ID_KELAS'            => $this->input->post('kelas_edit', TRUE),
                    'STATUS_SISWA'        => $this->input->post('status_edit', TRUE)
                );
                $this->load->model('M_siswa');
                $this->M_siswa->update($data, $id);
                $this->session->set_flashdata('flash','ubah');

                redirect(site_url('Siswa'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function update_kelas()
        {
            $data = array('ID_KELAS' => $this->input->post('kelas',TRUE));
            $this->load->model('M_siswa');
            $this->M_siswa->update($data, $id);
            $this->session->set_flashdata('flash','Disimpan');
            redirect(site_url('Siswa'));
        }
    }