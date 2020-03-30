<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pembayaran extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }

            $this->load->library('form_validation');
        }

        public function index(){
            if($this->session->userdata('akses') == 'admin'){
                $data = array(
                    'content' => 'tabel/t_pembayaran1',
                    'judul'   => 'Data Pembayaran',
                    'title'   => 'Data pembayaran'
                );
                $this->load->view('layout',$data);
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function aksiPilihJenisPembayaran()
        {
            $jenis = $this->input->post('jenis',TRUE);

            if($jenis == '1'){
                redirect('Pembayaran/pembayaran_daftar_siswa_baru');
            }elseif ($jenis == '2') {
                redirect('Pembayaran/pembayaran_daftar_ulang');
            }else{
               redirect('Pembayaran');
            }
        }

        public function pembayaran_daftar_siswa_baru(){
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_pembayaran');
                $pembayaran = $this->M_pembayaran->get_pembayaran_daftar_siswa_baru()->result();
                $data = array(
                    'pembayaran'=> $pembayaran,
                    'content'   => 'tabel/t_pembayaran',
                    'judul'     => 'Data Pembayaran Daftar Siswa Baru',
                    'title'     => 'Data Pembayaran Daftar Siswa Baru'
                );
                $this->load->view('layout',$data);
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function pembayaran_daftar_ulang(){
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_pembayaran');
                $pembayaran = $this->M_pembayaran->get_pembayaran_daftar_ulang()->result();
                $data = array(
                    'pembayaran'=> $pembayaran,
                    'content'   => 'tabel/t_pembayaran',
                    'judul'     => 'Data Pembayaran Daftar Ulang',
                    'title'     => 'Data Pembayaran Daftar Ulang'
                );
                $this->load->view('layout',$data);
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function simpan_pembayaran_siswa_baru(){
            if($this->session->userdata('akses') == 'admin'){
                $id = $this->input->post('no_regist', TRUE);
                $j = $this->input->post('jenjang',true);
                $this->load->model('M_pembayaran');
                $this->load->model('M_kelas');
                $kls = $this->M_kelas->getKelass($j)->result();
                $data_pembayaran = $this->M_pembayaran->cekPembayaran($id)->result();
                $data2  = array('STATUS' => '1');
                $data = array(
                    'ID_PEMBAYARAN'      => '',
                    'ID_PEGAWAI'         => $this->session->userdata('ses_id'),
                    'NO_PENDAFTARAN'     => $this->input->post('no_regist', TRUE),
                    'TANGGAL_PEMBAYARAN' => date("Y-m-d"),
                    'TOTAL_PEMBAYARAN'   => $this->input->post('total',TRUE)
                );
                
                $datasiswa = array(
                    'title'         => 'Data Siswa',
                    'judul'         => 'Form Data Siswa',
                    'nama'          => $this->input->post('nama_siswa',true),
                    'alamat'        => $this->input->post('alamat_siswa',true),
                    'jenjang'       => $this->input->post('jenjang',true),
                    'tgl_lahir'     => $this->input->post('tgl_lahir',true),
                    'jk'            => $this->input->post('jk',true),
                    'email'         => $this->input->post('email',true),
                    'telp_siswa'    => $this->input->post('telp_siswa',true),
                    'telp_ortu'     => $this->input->post('telp_ortu',true),
                    'sekolah'       => $this->input->post('sekolah',true),
                    'content'       => 'form/f_siswa',
                    'kelas'         => $kls
                );

                if (count($data_pembayaran) > 0) {
                    $this->load->view('layout',$datasiswa);
                }else{
                    $this->load->model('M_pembayaran');
                    $this->load->model('M_pendaftaran');
                    $this->M_pembayaran->simpan_pembayaran_siswa_baru($data);
                    $this->M_pendaftaran->update_status_pendaftaran_siswa_baru($data2,$id);
                    $this->load->view('layout',$datasiswa);
                }
            }else{
                echo "<script>history.go(-1);</script>";
            }
            
        }
    }
?>