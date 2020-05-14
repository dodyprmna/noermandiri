<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Profil extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        $this->load->library('form_validation');
        }
        function index(){
            $id = $this->session->userdata('ses_id');
            if ($this->session->userdata('akses')=='tentor') {
                $this->load->model('M_tentor');
                $profil = $this->M_tentor->getById($id);
                $data = array(
                    'title'      => 'Profil',
                    'content'    => 'profil',
                    'judul'      => 'Profil',
                    'nama'       => $profil->NAMA_TENTOR,
                    'alamat'     => $profil->ALAMAT_TENTOR,
                    'telp'       => $profil->NOTELP_TENTOR,
                    'email'      => $profil->EMAIL_TENTOR,
                    'tgl_lahir'  => $profil->TGL_LAHIR_TENTOR,
                );
            }elseif ($this->session->userdata('akses')=='siswa'){
                $this->load->model('M_siswa');
                $profil = $this->M_siswa->getById($id);
                $data = array(
                    'title'      => 'Profil',
                    'content'    => 'profil',
                    'judul'      => 'Profil',
                    'nama'       => $profil->NAMA_SISWA,
                    'alamat'     => $profil->ALAMAT_SISWA,
                    'telp'       => $profil->NOTELP_SISWA,
                    'email'      => $profil->EMAIL_SISWA,
                    'tgl_lahir'  => $profil->TGL_LAHIR_SISWA,
                );
            }else{
                $this->load->model('M_pegawai');
                $profil = $this->M_pegawai->getById($id);
                $data = array(
                    'title'      => 'Profil',
                    'content'    => 'profil',
                    'judul'      => 'Profil',
                    'nama'       => $profil->NAMA_PEGAWAI,
                    'alamat'     => $profil->ALAMAT_PEGAWAI,
                    'telp'       => $profil->NOTELP_PEGAWAI,
                    'email'      => $profil->EMAIL,
                    'tgl_lahir'  => $profil->TGL_LAHIR_PEG,
                );
            }
    	    $this->load->view('layout', $data);
        }
            

        public function ubah_password()
        {
                $data = array(
                    'judul'     => 'Ubah Password',
                    'title'     => 'Ubah Password',
                    'content'   => 'form/f_ubah_password'
                );
                $this->load->view('layout',$data);
        }

        public function aksi_ubah_password()
        {
            $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');
            //rules validasi
            $this->form_validation->set_rules('password', 'password', 'max_length[30]|min_length[8]',[
                'min_length' =>'*password minimal 8 karakter',
                'max_length'=> '*password maksimal 30 karakter']);
            if ($this->form_validation->run() == FALSE) {
                $this->ubah_password();
                } else {
                        $id = $this->session->userdata('ses_id');
                        if ($this->session->userdata('akses')=='admin' || $this->session->userdata('akses')=='pemilik') {
                           $data = array(
                                'PASSWORD_PEGAWAI' => MD5($this->input->post('password'))
                            );
                            $this->load->model('M_pegawai');
                            $this->M_pegawai->update_password($data,$id);
                        }elseif ($this->session->userdata('akses')=='siswa') {
                            $data = array(
                                'PASSWORD_SISWA' => MD5($this->input->post('password'))
                            );
                            $this->load->model('M_siswa');
                            $this->M_siswa->update($data,$id);
                        }else{
                            $data = array(
                                'PASSWORD_TENTOR' => MD5($this->input->post('password'))
                            );
                            $this->load->model('M_tentor');
                            $this->M_tentor->update($data,$id);
                        }
                        $this->session->set_flashdata('flash','pass');
                        redirect(site_url('Profil'));
                }
        }

        public function update_profil()
        {
            $id = $this->session->userdata('ses_id');
            if ($this->session->userdata('akses')=='admin' || $this->session->userdata('akses')=='pemilik') {
                $data = array(
                    'ALAMAT_PEGAWAI'    => $this->input->post('alamat_edit'),
                    'TGL_LAHIR_PEG'     => $this->input->post('tgl_lahir_edit'),
                    'NOTELP_PEGAWAI'    => $this->input->post('telp_edit'),
                    'EMAIL'             => $this->input->post('email_edit'),
                );
                $this->load->model('M_pegawai');
                $this->M_pegawai->update($data,$id);
            }elseif ($this->session->userdata('akses')=='siswa') {
                $data = array(
                    'ALAMAT_SISWA'    => $this->input->post('alamat_edit'),
                    'TGL_LAHIR_SISWA'     => $this->input->post('tgl_lahir_edit'),
                    'NOTELP_SISWA'    => $this->input->post('telp_edit'),
                    'EMAIL_SISWA'             => $this->input->post('email_edit'),
                );
                $this->load->model('M_siswa');
                $this->M_siswa->update($data,$id);
            }else{
                $data = array(
                    'ALAMAT_TENTOR'     => $this->input->post('alamat_edit'),
                    'TGL_LAHIR_TENTOR'  => $this->input->post('tgl_lahir_edit'),
                    'NOTELP_TENTOR'     => $this->input->post('telp_edit'),
                    'EMAIL_TENTOR'      => $this->input->post('email_edit'),
                );
                $this->load->model('M_tentor');
                $this->M_tentor->update($data,$id);
            }
            $this->session->set_flashdata('flash','ubah');
            redirect(site_url('Profil'));
        }
    }