<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pendaftaran extends CI_Controller {
        
        function __construct(){
            parent::__construct();

            
        }

        public function siswa_baru(){
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
            if($this->session->userdata('akses') == 'admin'){
                
                $this->load->model('M_pendaftaran');
                //config
                $this->load->library('pagination');
                //ambil data search
                if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('keyword');
                }else{
                    $d['keyword'] = null;
                }

                
                $config['base_url'] = 'http://localhost/LBBNoermandiri/Pendaftaran/siswa_baru';
                $this->db->like('NO_PENDAFTARAN',$d['keyword']);
                $this->db->from('pendaftaran_siswa_baru');
                $config['total_rows'] = $this->db->count_all_results();
                $config['per_page'] = 5;

                //initialize
                $this->pagination->initialize($config);

                $d['start'] = $this->uri->segment(3);
                $rows = $this->M_pendaftaran->getDataPendaftaran_SiswaBaru($config['per_page'],$d['start'],$d['keyword'])->result();
                $data = array(
                        'pendaftaran'       => $rows,
                        'title'             => 'Data Pendaftaran Siswa Baru',
                        'content'           => 'tabel/t_pendaftaran_siswa_baru',
                        'judul'             => 'Data Pendaftaran Siswa Baru',
                        'start'             =>  $this->uri->segment(3)
                    );
                    $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah_pendaftaran_siswa_baru(){
            //load library form validation
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');

            $this->form_validation->set_rules('nama', 'Nama Pendaftar', 'required|max_length[30]',['required' => '*nama tidak boleh kosong',
                'max_length'=>'*nama maksimal 30 karakter']);
            $this->form_validation->set_rules('alamat', 'Alamat Pendaftar', 'required|max_length[50]',['required' => '*alamat tidak boleh kosong',
                'max_length'=>'*alamat maksimal 30 karakter']);
            $this->form_validation->set_rules('telepon','No Telepon', 'required|numeric|max_length[13]',['required' => '*nomor Telepon tidak boleh kosong',
                'numeric'=>'*nomor telepon harus angka',
                'max_length'=>'*nomor telepon maksimal 13 angka']);
            $this->form_validation->set_rules('telepon_ortu', 'No Telepon Ortu', 'required|numeric|max_length[13]',['required' => '*nomor Telepon tidak boleh kosong',
                'numeric'=>'*nomor telepon harus angka',
                'max_length'=>'*nomor telepon maksimal 13 angka']);
            $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
            $this->form_validation->set_rules('jenjang', 'Jenjang', 'required|trim');

        if( $this->form_validation->run() == false) {
            $this->load->model('M_jenjang_kelas');
            $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
            $data = array(
                'jkelas' => $row, 
            );
            $this->load->view('landingpage', $data);
        }else{
            $id = $this->input->post('jenjang', true);
            $this->load->model('M_jenjang_kelas');
            $row = $this->M_jenjang_kelas->getBiaya($id)->result();
            $telp = $this->input->post('telepon', true);
            $data = [
                'NO_PENDAFTARAN'        => '',
                'ID_JENJANG'            => $this->input->post('jenjang', true),
                'TANGGAL_PENDAFTARAN'   => date("Y-m-d"),
                'NAMA_PENDAFTAR'        => $this->input->post('nama', true),    
                'ALAMAT_PENDAFTAR'      => $this->input->post('alamat', true),
                'TGL_LAHIR_PENDAFTAR'   => $this->input->post('tgl_lahir', true),
                'JENIS_KELAMIN'         => $this->input->post('jk',true),
                'NOTELP_PENDAFTAR'      => $this->input->post('telepon', true),
                'NOTELP_ORTU'           => $this->input->post('telepon_ortu', true),
                'EMAIL_PENDAFTAR'       => $this->input->post('email_pendaftaran', true),
                'ASAL_SEKOLAH'          => $this->input->post('asal_sekolah', true),
                'BIAYA_REGISTRASI'      => '50000',
                'BIAYA_LES'             => $row[0]->BIAYA,
                'TOTAL_TAGIHAN'         => $row[0]->BIAYA+50000,
                'STATUS'                => '0'
            ];
            $this->db->insert('pendaftaran_siswa_baru', $data);
            $this->session->set_flashdata('flash','Disimpan1');
            redirect(site_url('Beranda'));
            // return $this->output->set_content_type("application/json")->set_status_header(200)->set_output(json_encode(["error" => false, "message" => "Pendaftaran Berhasil", "last_id" => $this->db->insert_id()]));

            // redirect('utama');
            }
        }

        public function daftar_ulang($value='')
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

                
                $config['base_url'] = 'http://localhost/LBBNoermandiri/Pendaftaran/daftar_ulang';
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

        function cek_pendaftaran(){
            $email = $this->input->post('email',TRUE);
            $this->load->model('M_pendaftaran');
            $data = $this->M_pendaftaran->getDataRegistrasi($email)->result();
            echo json_encode($data);
        }

        function cek_email(){
            $email = $this->input->post('email',TRUE);
            $this->load->model('M_siswa');
            $data = $this->M_siswa->getEmail($email)->result();
            echo json_encode($data);
        }

        public function cetak_bukti_pendaftaran_siswa_baru(){
            $this->load->model('M_pendaftaran');
            $this->load->library('dompdf_gen');
            $email              = $this->input->post('email', TRUE);
            $dataa              = $this->M_pendaftaran->getDataRegistrasi($email)->result();
            $row['id']          = $dataa[0]->NO_PENDAFTARAN;
            $row['nama']        = $dataa[0]->NAMA_PENDAFTAR;
            $row['alamat']      = $dataa[0]->ALAMAT_PENDAFTAR;
            $row['telepon']     = $dataa[0]->NOTELP_PENDAFTAR;
            $row['tanggal']     = $dataa[0]->TANGGAL_PENDAFTARAN;
            $row['jenjang']     = $dataa[0]->ID_JENJANG;
            $row['biaya_regis'] = number_format($dataa[0]->BIAYA_REGISTRASI,2,',','.');
            $row['biaya_les']   = number_format($dataa[0]->BIAYA_LES,2,',','.');
            $row['total']       = number_format($dataa[0]->TOTAL_TAGIHAN,2,',','.');
            
            
            $html = $this->output->get_output($this->load->view('bukti_pendaftaran', $row));
            
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('A4','potrait');
            $this->dompdf->render();
            $this->dompdf->stream('Invoice.pdf',array("Attachment" => 0));
        }
    }
?>