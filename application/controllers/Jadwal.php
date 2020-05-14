<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Jadwal extends CI_Controller {

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
                $this->load->model('M_kelas');
                $this->load->model('M_jadwal_les');
                $this->load->model('M_sesi');
                $this->load->model('M_API');

                if ($this->input->post('submit')) {
                    if ($this->input->post('periode') == "") {
                        $d['periode'] = null;
                        $d['kelas'] = $this->input->post('kelas');
                    }elseif($this->input->post('kelas') == ""){
                        $d['periode'] = $this->input->post('periode');
                        $d['kelas'] = null;
                    }else{
                        $d['periode'] = $this->input->post('periode');
                        $d['kelas'] = $this->input->post('kelas');
                    }
                }else{
                    $d['periode'] = null;
                    $d['kelas'] = null;
                }


                $kelombel   = $this->M_kelas->TampilkanSemua()->result();
                $jadwal = $this->M_jadwal_les->getAll($d['kelas'],$d['periode'])->result();
                $jumlah = $this->M_jadwal_les->getAll($d['kelas'],$d['periode'])->num_rows();
                $mapel = $this->M_API->getAll('mata_pelajaran')->result();
                $sesi = $this->M_sesi->tampilkanSemua()->result();
                $data = array(
                        'title'     => 'Jadwal Les',
                        'content'   => 'tabel/t_jadwal',
                        'judul'     => 'Jadwal Les',
                        'kelombel'  => $kelombel,
                        'jadwal'    => $jadwal,
                        'jumlah'    => $jumlah,
                        'mapel'     => $mapel,
                        'sesi'      => $sesi
                    );
                    $this->load->view('layout', $data);
            //jika sebagai tentor
            }elseif ($this->session->userdata('akses') == 'tentor') {
                $data = array(
                        'title' => 'Jadwal Mengajar',
                        'content' => 'tabel/t_jadwal_tentor',
                        'judul' => 'Jadwal Mengajar',
                    );
                    $this->load->view('layout', $data);
            //jika sebagai siswa
            }elseif ($this->session->userdata('akses') == 'siswa'){
                $this->load->model('M_jadwal_les');
                $kelas = $this->session->userdata('ses_kelas');
                $rows = $this->M_jadwal_les->getJadwalSiswaByBulan($kelas)->result();
                $data = array(
                        'jdwl'    => $rows,
                        'title'   => 'Jadwal Les',
                        'content' => 'tabel/t_jadwal_siswa',
                        'judul'   => 'Jadwal Les',
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
            $this->load->model('M_jadwal_les');
            $this->load->model('M_API');
            $mata_ajar  = $this->M_API->getAll('mata_pelajaran')->result();
            $sesi       = $this->M_API->getAll('sesi')->result();
            $data = array(
                'sesi'     => $sesi,
                'mata_ajar' => $mata_ajar,
                'judul'     => 'Form Tambah Jadwal Les',
                'title'     => 'Input Jadwal Les',
                'content'   => 'form/f_jadwal',
            );
            $this->load->view('layout', $data);
            }else{//jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function aksiTambah(){
            if($this->session->userdata('akses') == 'admin'){
            //load library form validation
             $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            //rules validasi
            $this->form_validation->set_rules('kelas', 'ID_KELAS', 'required',['required' => 'Kelas tidak boleh kosong']);
            $this->form_validation->set_rules('mapel', 'ID_MAPEL', 'required',['required' => 'Mapel tidak boleh kosong']);
            $this->form_validation->set_rules('tentor','ID_TENTOR', 'required',['required' => 'Tentor tidak boleh kosong']);
            $this->form_validation->set_rules('ruangan', 'ID_RUANGAN', 'required',['required' => 'Ruangan tidak boleh kosong']);
            $this->form_validation->set_rules('sesi', 'ID_WAKTU', 'required',['required' => 'Jam tidak boleh kosong']);
            $this->form_validation->set_rules('tanggal', 'TANGGAL', 'required',['required' => 'Tanggal tidak boleh kosong']);

                if ($this->form_validation->run() == FALSE) {
                    //jika validasi gagal maka akan kembali ke form tambah jadwal
                    $this->tambah();
                    } else {    
                    //jika validasi berhasil
                        $tanggal = $this->input->post('tanggal');
                        $tahun = date("y",strtotime($tanggal));
                        $bulan = date("m",strtotime($tanggal));
                        $tgl = date("d",strtotime($tanggal));
                        $id = $tgl.$bulan.$tahun;
                        $data = array(
                            'ID_JADWAL'   => 'J'.$this->input->post('kelas').$id,
                            'ID_TENTOR'   => $this->input->post('tentor', TRUE),
                            'ID_MAPEL'    => $this->input->post('mapel', TRUE),
                            'ID_KELAS'    => $this->input->post('kelas', TRUE),
                            'ID_RUANGAN'  => $this->input->post('ruangan', TRUE),
                            'ID_SESI'     => $this->input->post('sesi', TRUE),
                            'TANGGAL'     => $this->input->post('tanggal', TRUE),
                        );

                        $this->load->model('M_jadwal_les');
                        $this->M_jadwal_les->tambah($data);
                        $this->session->set_flashdata('flash','Disimpan');
                        redirect(site_url('Jadwal'));
                    }

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function hapus($id)
        {
            $this->load->model('M_jadwal_les');
            $this->M_jadwal_les->hapus($id);
        }


        public function cekTentor(){
            $waktu = $this->input->post('time',TRUE);
            $tanggal = $this->input->post('tgl',TRUE);
            $this->load->model('M_tentor');
            $data=$this->M_tentor->getTentorTersedia($waktu,$tanggal)->result();
            echo json_encode($data);
        }

        public function cekRuangan(){
            $waktu = $this->input->post('time',TRUE);
            $tanggal = $this->input->post('tgl',TRUE);
            $this->load->model('M_ruangan');
            $data=$this->M_ruangan->getRuanganTersedia($waktu,$tanggal)->result();
            echo json_encode($data);
        }

        public function cekKelombel(){
            $tanggal = $this->input->post('tgl',TRUE);
            $this->load->model('M_kelas');
            $data = $this->M_kelas->getKelas($tanggal)->result();
            echo json_encode($data);
        }

        public function getJadwalByFilter(){
            $periode     = $this->input->post('periode',TRUE);
            $kelas       = $this->input->post('kls',TRUE);
            $this->load->model('M_jadwal_les');
            $data = $this->M_jadwal_les->getByFilter($periode,$kelas)->result();
            echo json_encode($data);
        }

        public function getJadwalSiswaByFilter(){
            $periode     = $this->input->post('periode',TRUE);
            $kelas       = $this->session->userdata('ses_kelas');
            $this->load->model('M_jadwal_les');
            $data = $this->M_jadwal_les->getJadwalSiswaByFilter($periode,$kelas)->result();
            echo json_encode($data);
        }

        public function getJadwalTentorByFilter(){
            $periode     = $this->input->post('periode',TRUE);
            $id          = $this->session->userdata('ses_id');
            $this->load->model('M_jadwal_les');
            $data = $this->M_jadwal_les->getJadwalTentorByFilter($periode,$id)->result();
            echo json_encode($data);
        }

    }
?>