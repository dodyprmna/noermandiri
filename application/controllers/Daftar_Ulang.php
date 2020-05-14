<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Daftar_Ulang extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        $this->load->library('form_validation');
        }

        public function index()
        {
            if($this->session->userdata('akses') == 'admin'){
                
                $this->load->model('M_daftar_ulang');
                //config
                $this->load->library('pagination');
                //ambil data search
                if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('keyword');
                }else{
                    $d['keyword'] = null;
                }

                
                $config['base_url'] = 'http://localhost/LBBNoermandiri/Daftar_Ulang/index';
                $this->db->like('ID_DAFTAR_ULANG',$d['keyword']);
                $this->db->from('daftar_ulang');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 5;

                //initialize
                $this->pagination->initialize($config);

                $d['start'] = $this->uri->segment(3);
                $rows = $this->M_daftar_ulang->getDataDaftarUlangSiswa($config['per_page'],$d['start'],$d['keyword'])->result();
                $data = array(
                        'daftar_ulang'      => $rows,
                        'title'             => 'Data Daftar Ulang',
                        'content'           => 'tabel/t_daftar_ulang',
                        'judul'             => 'Data Daftar Ulang',
                        'start'             =>  $this->uri->segment(3)
                    );
                    $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }
        
        function tambah(){
            //jika sebagai siswa
            if($this->session->userdata('akses') == 'siswa'){
            $this->load->library('form_validation');          
            $this->load->model('M_jenjang_kelas');
            $jenjang = $this->M_jenjang_kelas->tampilkanSemua()->result();
            $data = array(
                'jenjang' => $jenjang,
                'judul'     => 'Form Daftar Ulang',
                'title'     => 'Daftar Ulang',
                'content'   => 'form/f_daftar_ulang',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function simpan()
        {
            if($this->session->userdata('akses') == 'siswa'){
                $id = $this->input->post('jenjang', true);
                $this->load->model('M_jenjang_kelas');
                $biaya = $this->M_jenjang_kelas->getBiaya($id)->result();
                $data = array(
                    'ID_DAFTAR_ULANG'           => '',
                    'ID_JENJANG'                => $this->input->post('jenjang', TRUE),
                    'NO_INDUK'                  => $this->session->userdata('ses_id'),
                    'TGL_DAFTAR_ULANG'          => date("Y-m-d"),
                    'TOTAL_BIAYA_DAFTAR_ULANG'  => $biaya[0]->BIAYA,
                    'STATUS_DAFTAR_ULANG'       => '0'
                );

                $this->load->model('M_API');
                $this->M_API->saveData('daftar_ulang',$data);
                $this->session->set_flashdata('flash','Disimpan');
                redirect(site_url('Daftar_Ulang/tagihan_pembayaran'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function tagihan_pembayaran()
        {
            if($this->session->userdata('akses') == 'siswa'){        
            $this->load->model('M_daftar_ulang');
            $tagihan = $this->M_daftar_ulang->getDaftarUlangSiswa()->result();
            $data = array(
                'judul'     => 'Tagihan Pembayaran',
                'title'     => 'Tagihan Pembayaran',
                'content'   => 'tabel/t_tagihan_pembayaran',
                'tagihan'   => $tagihan
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }