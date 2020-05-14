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
                $this->load->model('M_jenjang_kelas');
                $this->load->model('M_pendaftaran');
                $kls = $this->M_kelas->tampilkanSemua()->result();
                $data_pembayaran = $this->M_pembayaran_daftar_ulang->cekPembayaran($id)->result();
                $jenjang =  $this->M_jenjang_kelas->getById($j)->row();
                
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
                    'nama_jenjang'  => $jenjang->NAMA_JENJANG,
                    'kelas'         => $kls
                );

                if (count($data_pembayaran) > 0) {
                    $this->load->view('layout',$datasiswa);
                }else{
                    $this->load->model('M_pembayaran_daftar_ulang');
                    $this->load->model('M_daftar_ulang');
                    $this->M_pembayaran_daftar_ulang->simpan($data);

                    $pembayaran = $this->M_pembayaran_daftar_ulang->get_by_id_daftar_ulang($id)->num_rows();
                    $data2  = array('STATUS_DAFTAR_ULANG' => '1');
                    if ($pembayaran > 0) {
                        $this->M_daftar_ulang->update_status($data2,$id);
                    }
                    $this->load->view('layout',$datasiswa);
                }
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function upload_bukti_pembayaran($id)
        {
            if($this->session->userdata('akses') == 'siswa'){
                $this->load->model('M_bukti_pembayaran_daftar_ulang');
                $cek_bukti = $this->M_bukti_pembayaran_daftar_ulang->getByIdDaftarUlang($id)->num_rows();

                if ($cek_bukti > 0) {
                    $bukti = $this->M_bukti_pembayaran_daftar_ulang->getByIdDaftarUlang($id)->result();
                    $data = array(
                        'bukti'     => $bukti,
                        'judul'     => 'Bukti Pembayaran',
                        'title'     => 'Bukti Pembayaran',
                        'content'   => 'tabel/t_bukti_pembayaran_daftar_ulang',
                    );
                    $this->load->view('layout', $data);
                }else{
                    $data = array(
                        'id'        => $id,
                        'judul'     => 'Form Upload Bukti Pembayaran',
                        'title'     => 'Daftar Ulang',
                        'content'   => 'form/f_upload_bukti_pembayaran',
                    );
                    $this->load->view('layout', $data);
                }
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function cetak_bukti_pembayaran($id){
            if($this->session->userdata('akses') == 'admin' || $this->session->userdata('akses') == 'siswa'){
                $this->load->model('M_pembayaran_daftar_ulang');
                $pembayaran_baru = $this->M_pembayaran_daftar_ulang->getDataById($id)->row_array();
                $this->load->library('dompdf_gen');
                $row['id']                = $pembayaran_baru['ID_PEMBAYARAN_DAFTAR_ULANG'];
                $row['pegawai']           = $pembayaran_baru['NAMA_PEGAWAI'];
                $row['tanggal']           = date("d-m-Y",strtotime($pembayaran_baru['TGL_PEMBAYARAN_DAFTAR_ULANG']));
                $row['total']             = number_format($pembayaran_baru['TOTAL_PEMBAYARAN_DAFTAR_ULANG'],2,',','.');
                $row['no_pendaftaran']    = $pembayaran_baru['ID_DAFTAR_ULANG'];
                $row['username']          = $pembayaran_baru['NO_INDUK'];
                $row['password']          = $pembayaran_baru['NOTELP_SISWA'];
                $html = $this->output->get_output($this->load->view('bukti_pembayaran', $row));
                
                $this->dompdf->load_html($html);
                $this->dompdf->set_paper('A4','landscape');
                $this->dompdf->render();
                $this->dompdf->stream('Bukti_pembayaran.pdf',array("Attachment" => 0));
            // }elseif($this->session->userdata('akses') == 'siswa') { 
            //     $this->load->model('M_pembayaran_daftar_ulang');
            //     $pembayaran_baru = $this->M_pembayaran_daftar_ulang->getDataBayarSiswa($id)->row_array();
            //     $this->load->library('dompdf_gen');
            //     $row['id']                = $data['ID_PEMBAYARAN_DAFTAR_ULANG'];
            //     $row['pegawai']           = $data['NAMA_PEGAWAI'];
            //     $row['tanggal']           = date("d-m-Y",strtotime($data['TGL_PEMBAYARAN_DAFTAR_ULANG']));
            //     $row['total']             = number_format($data['TOTAL_PEMBAYARAN_DAFTAR_ULANG'],2,',','.');
            //     $row['no_pendaftaran']    = $data['ID_DAFTAR_ULANG'];
            //     $row['username']          = $siswa['NO_INDUK'];
            //     $row['password']          = $siswa['NOTELP_SISWA'];
            //     $html = $this->output->get_output($this->load->view('bukti_pembayaran', $row));
                
            //     $this->dompdf->load_html($html);
            //     $this->dompdf->set_paper('A4','landscape');
            //     $this->dompdf->render();
            //     $this->dompdf->stream('Bukti_pembayaran.pdf',array("Attachment" => 0));
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function konfirmasi_pembayaran($id){
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_pembayaran_daftar_ulang');
                $this->load->model('M_kelas');
                $this->load->model('M_daftar_ulang');
                $this->load->model('M_jenjang_kelas');
                $this->load->model('M_bukti_pembayaran_daftar_ulang');
                $data_update = array('STATUS' => '1');
                $this->M_bukti_pembayaran_daftar_ulang->update($id,$data_update);

                $pendaftaran = $this->M_daftar_ulang->getById($id)->row();

                $jenjang = $this->M_jenjang_kelas->getById($pendaftaran->ID_JENJANG)->row();

                $data_pembayaran = $this->M_pembayaran_daftar_ulang->get_by_id_daftar_ulang($id)->num_rows();
                $kls = $this->M_kelas->tampilkanSemua()->result();
                $data2 = array('STATUS_DAFTAR_ULANG' => '1' );
                $data = array(
                    'ID_PEMBAYARAN_DAFTAR_ULANG'      => '',
                    'ID_DAFTAR_ULANG'                 => $id,
                    'ID_PEGAWAI'                      => $this->session->userdata('ses_id'),
                    'TGL_PEMBAYARAN_DAFTAR_ULANG'     => date("Y-m-d"),
                    'TOTAL_PEMBAYARAN_DAFTAR_ULANG'   => $pendaftaran->TOTAL_BIAYA_DAFTAR_ULANG
                );
                
                $this->load->model('M_siswa');
                $murid = $this->M_siswa->getByNoinduk($pendaftaran->NO_INDUK)->result();
                $datasiswa = array(
                    'title'         => 'Data Siswa',
                    'judul'         => 'Form Update Data Siswa',
                    'content'       => 'form/f_update_siswa',
                    'nama_jenjang'  => $jenjang->NAMA_JENJANG,
                    'siswa'         => $murid,
                    'kelas'         => $kls
                );

                if ($data_pembayaran > 0) {
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

        public function tolak($id)
        {
            $this->load->model('M_bukti_pembayaran_daftar_ulang');
            $data_update = array('STATUS' => '2');
            $this->M_bukti_pembayaran_daftar_ulang->update($id,$data_update);
            $this->session->set_flashdata('flash','Disimpan');
            redirect(site_url('Bukti_Pembayaran/daftar_ulang'));
        }

        public function riwayat_pembayaran()
        {
            if($this->session->userdata('akses') == 'siswa'){        
            $this->load->model('M_pembayaran_daftar_ulang');
            $riwayat = $this->M_pembayaran_daftar_ulang->getPembayaranSiswa()->result();
            $data = array(
                'judul'     => 'Riwayat Pembayaran',
                'title'     => 'Riwayat Pembayaran',
                'content'   => 'tabel/t_riwayat_pembayaran',
                'riwayat'   => $riwayat
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }
?>