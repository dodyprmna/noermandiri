<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pendaftaran extends CI_Controller {
        
        function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
        }

        public function siswa_baru(){
            if($this->session->userdata('akses') == 'admin'){
                $this->load->model('M_pendaftaran');
                $rows = $this->M_pendaftaran->getDataPendaftaran_SiswaBaru()->result();
                $data = array(
                        'pendaftaran'       => $rows,
                        'title'             => 'Data Pendaftaran Siswa Baru',
                        'content'           => 'tabel/t_pendaftaran_siswa_baru',
                        'judul'             => 'Data Pendaftaran Siswa Baru',
                    );
                    $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo"<script>history.go(-1);</script>";
            }
        }

        public function tambah_pendaftaran_siswa_baru(){
            //load library form validation
            $this->form_validation->set_rules('nama', 'Nama Pendaftar', 'required|max_length[30]',['required' => '*Nama tidak boleh kosong',
                'max_length'=>'Nama maksimal 30 karakter']);
            $this->form_validation->set_rules('alamat', 'Alamat Pendaftar', 'required|max_length[50]',['required' => '*Alamat tidak boleh kosong',
                'max_length'=>'Alamat maksimal 30 karakter']);
            $this->form_validation->set_rules('telepon','No Telepon', 'required|numeric|max_length[13]',['required' => '*Nomor Telepon tidak boleh kosong',
                'numeric'=>'Nomor telepon harus angka',
                'max_length'=>'Nomor telepon maksimal 13 angka']);
            $this->form_validation->set_rules('telepon_ortu', 'No Telepon Ortu', 'required|numeric|max_length[13]',['required' => '*Nomor Telepon tidak boleh kosong',
                'numeric'=>'Nomor telepon harus angka',
                'max_length'=>'Nomor telepon maksimal 13 angka']);
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
                'EMAIL_PENDAFTAR'       => $this->input->post('email', true),
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

        function cek_pendaftaran(){
            $email = $this->input->post('email',TRUE);
            $this->load->model('M_pendaftaran');
            $data = $this->M_pendaftaran->getDataRegistrasi($email)->result();
            echo json_encode($data);
        }
    }
?>