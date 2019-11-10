<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('Auth/login'),
            'error' => $error,
            'judul' => 'Login'
        );
        $this->load->view('login', $data);
    }

    public function login(){
    //     $login = $this->auth_model->login($this->input->post(''))
    //    redirect(site_url('Home'));

        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
        $cek_pegawai=$this->M_login->auth_pegawai($username,$password);
        if($cek_pegawai->num_rows() > 0){ //jika login sebagai pegawai
            $data=$cek_pegawai->row_array();
            $this->session->set_userdata('masuk',TRUE);
            if($data['LEVEL']=='admin'){ //akses untuk admin
                $this->session->set_userdata('akses','1');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                redirect(site_url('Home'));
            }elseif($data['LEVEL']=='tentor'){ //akses tentor
                $this->session->set_userdata('akses','2');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                redirect(site_url('Home'));
            }elseif($data['LEVEL']=='pemilik'){ //akses pemilik
                $this->session->set_userdata('akses','3');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                redirect(site_url('Home'));
            }else{
                $error = 'username / password salah';
                $this->index($error);
            }
        }else { //jika login sebagai siswa
            $cek_siswa=$this->M_login->auth_siswa($username,$password);
            if ($cek_siswa->num_rows() > 0) {
                $data=$cek_siswa->row_array();

                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('akses','4');
                $this->session->set_userdata('ses_id',$data['NOINDUK']);
                $this->session->set_userdata('ses_nama',$data['NAMA_SISWA']);
            }else {
                $error = 'username / password salah';
            $this->index($error);
            }

        }
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(site_url('Home'));
    }
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */