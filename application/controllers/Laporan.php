<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Laporan extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        }

        public function cetak()
        {   
            $this->load->library('dompdf_gen');            
            $mulai      = $this->input->post('periode_mulai', TRUE);
            $akhir      = $this->input->post('periode_akhir', TRUE);

            $data['periode1']       = date("d-m-Y",strtotime($mulai));
            $data['periode2']       = date("d-m-Y",strtotime($akhir));

            
            if ($this->input->post('tabel') == 'siswa baru') {
                $this->load->model('M_pendaftaran');
                $data['tabel']          = $this->input->post('tabel',TRUE);
                $data['pendaftaran']    = $this->M_pendaftaran->getByPeriode($mulai,$akhir)->result();
                $data['total']          = $this->M_pendaftaran->getByPeriode($mulai,$akhir)->num_rows();
                $data['title']          = "Pendaftaran Siswa Baru";
                $nama_file              = "Laporan pendaftaran siswa baru.pdf";
                $laporan                = 'laporan_pendaftaran';
            }elseif($this->input->post('tabel') == 'daftar ulang'){
                $this->load->model('M_daftar_ulang');
                $data['tabel']          = $this->input->post('tabel',TRUE);
                $data['pendaftaran']    = $this->M_daftar_ulang->getByPeriode($mulai,$akhir)->result();
                $data['total']          = $this->M_daftar_ulang->getByPeriode($mulai,$akhir)->num_rows();
                $data['title']          = "Daftar Ulang";
                $nama_file              = "Laporan daftar ulang .pdf";
                $laporan                = 'laporan_pendaftaran';
            }elseif($this->input->post('tabel') == 'pembayaran'){
                $this->load->model('M_pembayaran');
                $data['tabel']          = $this->input->post('tabel',TRUE);
                $data['pendaftaran']    = $this->M_pembayaran->getByPeriode($mulai,$akhir)->result();
                $data['total']          = $this->M_pembayaran->total($mulai,$akhir);
                $data['title']          = "Laporan Pembayaran Daftar Siswa Baru";
                $nama_file              = "Laporan pembayaran daftar siswa baru .pdf";
                $laporan                = 'laporan_pembayaran';
            }elseif($this->input->post('tabel') == 'pembayaran daftar ulang'){
                $this->load->model('M_pembayaran_daftar_ulang');
                $data['tabel']          = $this->input->post('tabel',TRUE);
                $data['pendaftaran']    = $this->M_pembayaran_daftar_ulang->getByPeriode($mulai,$akhir)->result();
                $data['total']          = $this->M_pembayaran_daftar_ulang->total($mulai,$akhir);
                $data['title']          = "Laporan Pembayaran Daftar Ulang";
                $nama_file              = "Laporan pembayaran daftar ulang .pdf";
                $laporan                = 'laporan_pembayaran';
            }elseif($this->input->post('tabel') == 'jadwal'){
                $this->load->model('M_jadwal_les');
                $data['periode']      = $this->input->post('periode1', TRUE);
                $data['kelas']        = $this->input->post('kelas1', TRUE);
                $data['tabel']          = $this->input->post('tabel',TRUE);
                $data['jadwal']         = $this->M_jadwal_les->getByFilter($data['periode'],$data['kelas'])->result();
                $data['title']          = "Laporan Penjadwalan";
                $nama_file              = "Laporan penjadwalan.pdf";
                $laporan                = 'laporan_penjadwalan';
            }else{
                $this->load->model('M_siswa');
                $this->load->model('M_kelas');
                $data['kelas']          = $this->input->post('kelas1', TRUE);
                $data['tabel']          = $this->input->post('tabel',TRUE);
                $kls                    = $this->M_kelas->getById($data['kelas'])->row_array();
                $data['siswa']          = $this->M_siswa->getSiswaByKelas($data['kelas'])->result();
                $data['title']          = "Laporan Data Siswa";
                $data['judul']          = "Data Siswa Kelas ".$kls['NAMA_KELAS'];
                $nama_file              = "Laporan Data Siswa Kelas ".$kls['NAMA_KELAS'].".pdf";
                $laporan                = 'laporan_data_siswa';
            }
            $html = $this->output->get_output($this->load->view($laporan, $data));
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('A4','potrait');
            $this->dompdf->render();
            $this->dompdf->stream($nama_file,array("Attachment" => 0));
        }

        public function Pendaftaran_siswa_baru(){
            if($this->session->userdata('akses') == 'pemilik'){
                $this->load->model('M_pendaftaran');
                $pendaftaran = $this->M_pendaftaran->getAll()->result();
                $total       = $this->M_pendaftaran->getAll()->num_rows();
                $data = array(
                    'judul'         => 'Laporan Pendaftaran Siswa Baru',
                    'title'         => 'Laporan Pendaftaran Siswa Baru',
                    'content'       => 'tabel/t_laporan_pendaftaran',
                    'pendaftaran'   => $pendaftaran,
                    'tabel'         => 'siswa baru',
                    'total'         => $total,
                    'klik'          => 'getLaporanByPeriode()'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function Daftar_ulang(){
            if($this->session->userdata('akses') == 'pemilik'){
                $this->load->model('M_daftar_ulang');
                $pendaftaran = $this->M_daftar_ulang->getAll()->result();
                $total       = $this->M_daftar_ulang->getAll()->num_rows();
                $data = array(
                    'judul'         => 'Laporan Daftar ulang',
                    'title'         => 'Laporan Daftar Ulang',
                    'content'       => 'tabel/t_laporan_pendaftaran',
                    'pendaftaran'   => $pendaftaran,
                    'tabel'         => 'daftar ulang',
                    'total'         => $total,
                    'klik'          => 'getLaporanDaftarUlangByPeriode()'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function Pembayaran_daftar_siswa_baru(){
            if($this->session->userdata('akses') == 'pemilik'){
                $this->load->model('M_pembayaran');
                $pembayaran = $this->M_pembayaran->getAll()->result();
                $total      = $this->M_pembayaran->getAll()->num_rows();
                $data = array(
                    'judul'         => 'Laporan Pembayaran',
                    'title'         => 'Pembayaran Daftar Siswa Baru',
                    'content'       => 'tabel/t_laporan_pembayaran',
                    'pembayaran'    => $pembayaran,
                    'tabel'         => 'pembayaran',
                    'total'         => $total,
                    'klik'          => 'getLaporanPembayaranByPeriode()'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function Pembayaran_daftar_ulang(){
            if($this->session->userdata('akses') == 'pemilik'){
                $this->load->model('M_pembayaran_daftar_ulang');
                $pembayaran = $this->M_pembayaran_daftar_ulang->getAll()->result();
                $total      = $this->M_pembayaran_daftar_ulang->getAll()->num_rows();
                $data = array(
                    'judul'         => 'Laporan Pembayaran',
                    'title'         => 'Pembayaran Daftar Ulang',
                    'content'       => 'tabel/t_laporan_pembayaran',
                    'pembayaran'    => $pembayaran,
                    'tabel'         => 'pembayaran daftar ulang',
                    'total'         => $total,
                    'klik'          => 'getLaporanPembayaranByPeriode()'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function Penjadwalan(){
            if($this->session->userdata('akses') == 'pemilik'){
                $this->load->model('M_jadwal_les');
                $this->load->model('M_kelas');
                $jadwal = $this->M_jadwal_les->tampilkanSemua()->result();
                    $data = array(
                    'judul'         => 'Laporan Penjadwalan',
                    'title'         => 'Laporan Penjadwalan',
                    'content'       => 'tabel/t_laporan_penjadwalan',
                    'jadwal'        => $jadwal,
                    'tabel'         => 'jadwal',
                    'kelas'         => $this->M_kelas->tampilkanSemua()->result(),
                    'klik'          => 'getLaporanPenjadwalan()'
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function siswa(){
            if($this->session->userdata('akses') == 'pemilik'){
                $this->load->model('M_kelas');
                $kelas = $this->M_kelas->tampilkanSemua()->result();
                    $data = array(
                    'judul'         => 'Laporan Siswa',
                    'title'         => 'Laporan Siswa',
                    'content'       => 'tabel/t_laporan_siswa',
                    'kelas'         => $kelas
                );
                $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function siswa_perkelas()
        {
            $kelas       = $this->input->post('kelas',TRUE);
            $this->load->model('M_siswa');
            $data = $this->M_siswa->getSiswaByKelas($kelas)->result();
            echo json_encode($data);
        }

        public function pendaftaran_siswa_baru_by_periode()
        {
            $mulai       = $this->input->post('mulai',TRUE);
            $akhir       = $this->input->post('akhir',TRUE);
            $this->load->model('M_pendaftaran');
            $data = $this->M_pendaftaran->getByPeriode($mulai,$akhir)->result();
            echo json_encode($data);
        }

        public function daftar_ulang_by_periode()
        {
            $mulai       = $this->input->post('mulai',TRUE);
            $akhir       = $this->input->post('akhir',TRUE);
            $this->load->model('M_daftar_ulang');
            $data = $this->M_daftar_ulang->getByPeriode($mulai,$akhir)->result();
            echo json_encode($data);
        }

        public function pembayaran_siswa_baru_by_periode()
        {
            $mulai       = $this->input->post('mulai',TRUE);
            $akhir       = $this->input->post('akhir',TRUE);
            $this->load->model('M_pembayaran');
            $data = $this->M_pembayaran->getByPeriode($mulai,$akhir)->result();
            echo json_encode($data);
        }

        public function pembayaran_daftar_ulang_by_periode()
        {
            $mulai       = $this->input->post('mulai',TRUE);
            $akhir       = $this->input->post('akhir',TRUE);
            $this->load->model('M_pembayaran_daftar_ulang');
            $data = $this->M_pembayaran_daftar_ulang->getByPeriode($mulai,$akhir)->result();
            echo json_encode($data);
        }

         public function penjadwalan_perbulan()
        {
            $periode       = $this->input->post('periode',TRUE);
            $kelas         = $this->input->post('kelas',TRUE);
            $this->load->model('M_jadwal_les');
            $data = $this->M_jadwal_les->getByFilter($periode,$kelas)->result();
            echo json_encode($data);
        }
    }
?>