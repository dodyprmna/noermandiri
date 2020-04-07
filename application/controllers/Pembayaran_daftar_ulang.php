<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class pembayaran_daftar_ulang extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }

            $this->load->library('form_validation');
        }

        public function index(){
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_pembayaran_daftar_ulang');
                //config
                $this->load->library('pagination');
                //ambil data search
                if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('keyword');
                }else{
                    $d['keyword'] = null;
                }

                
                $config['base_url'] = 'http://localhost/LBBNoermandiri/pembayaran_daftar_ulang/index';
                $this->db->like('ID_PEMBAYARAN_DAFTAR_ULANG',$d['keyword']);
                $this->db->from('pembayaran_daftar_ulang');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 5;

                //initialize
                $this->pagination->initialize($config);

                $d['start'] = $this->uri->segment(3);
                $pembayaran = $this->M_pembayaran_daftar_ulang->get_pembayaran_daftar_ulang($config['per_page'],$d['start'],$d['keyword'])->result();
                $data = array(
                    'content'   => 'tabel/t_pembayaran_daftar_ulang',
                    'judul'     => 'Data Pembayaran Daftar Ulang',
                    'title'     => 'Data pembayaran daftar ulang',
                    'pembayaran'=> $pembayaran
                );
                $this->load->view('layout',$data);
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function simpan_pembayaran(){
            if($this->session->userdata('akses') == 'admin'){
                $id = $this->input->post('no_regist', TRUE);
                $j = $this->input->post('jenjang',true);
                $noinduk = $this->input->post('no_induk');
                $this->load->model('M_pembayaran_daftar_ulang');
                $this->load->model('M_kelas');
                $kls = $this->M_kelas->getKelass($j)->result();
                $data_pembayaran = $this->M_pembayaran_daftar_ulang->cekPembayaran($id)->result();
                $data2  = array('STATUS' => '1');
                $data = array(
                    'ID_PEMBAYARAN_DAFTAR_ULANG'      => '',
                    'ID_DAFTAR_ULANG'                 => $id,
                    'ID_PEGAWAI'                      => $this->session->userdata('ses_id'),
                    'TGL_PEMBAYARAN_DAFTAR_ULANG'     => date("Y-m-d"),
                    'TOTAL_PEMBAYARAN_DAFTAR_ULANG'   => $this->input->post('total',TRUE)
                );
                
                $this->load->model('M_siswa');
                $murid = $this->M_siswa->getByNoinduk($noinduk)->result();
                $datasiswa = array(
                    'title'         => 'Data Siswa',
                    'judul'         => 'Form Update Data Siswa',
                    'content'       => 'form/f_update_siswa',
                    'siswa'         => $murid,
                    'kelas'         => $kls
                );

                if (count($data_pembayaran) > 0) {
                    $this->load->view('layout',$datasiswa);
                }else{
                    $this->load->model('M_pembayaran_daftar_ulang');
                    $this->load->model('M_daftar_ulang');
                    $this->M_pembayaran_daftar_ulang->simpan($data);
                    $this->M_daftar_ulang->update_status($data2,$id);
                    $this->load->view('layout',$datasiswa);
                }
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function cetak_bukti_pembayaran($id){
            $this->load->model('M_pembayaran');
            $pembayaran_baru = $this->M_pembayaran->cek_pembayaran_daftar_siswa_baru($id);
            //jika data pembayaran siswa baru
            if($pembayaran_baru->num_rows() > 0){ 
                $data=$pembayaran_baru->row_array();
                $this->load->library('dompdf_gen');
                $row['id']                = $data['ID_PEMBAYARAN'];
                $row['pegawai']           = $data['NAMA_PEGAWAI'];
                $row['tanggal']           = date("d-m-Y",strtotime($data['TANGGAL_PEMBAYARAN']));
                $row['total']             = number_format($data['TOTAL_PEMBAYARAN'],2,',','.');
                $row['no_pendaftaran']    = $data['NO_PENDAFTARAN'];
                $html = $this->output->get_output($this->load->view('bukti_pembayaran', $row));
                
                $this->dompdf->load_html($html);
                $this->dompdf->set_paper('A4','landscape');
                $this->dompdf->render();
                $this->dompdf->stream('Bukti_pembayaran.pdf',array("Attachment" => 0));
            }else { 
                $cek_siswa=$this->M_login->auth_siswa($username,$password);
                if ($cek_siswa->num_rows() > 0) {
                    $data=$cek_siswa->row_array();
                    $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('akses','siswa');
                    $this->session->set_userdata('ses_id',$data['NOINDUK']);
                    $this->session->set_userdata('ses_nama',$data['NAMA_SISWA']);
                    $this->session->set_userdata('ses_kelas',$data['ID_KELAS']);
                    redirect(site_url('Home'));
                }else {
                    $error = 'Username atau Password salah';
                $this->index($error);
                }

            }
        }
    }
?>