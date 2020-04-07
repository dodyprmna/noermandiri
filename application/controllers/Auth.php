 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action'=> site_url('Auth/login'),
            'error' => $error,
            'judul' => 'Login'
        );
        $this->load->view('login', $data);
    }

    public function login(){

        $username=$this->input->post('username');
        $password=$this->input->post('password');
        
        $cek_pegawai=$this->M_login->auth_pegawai($username,$password);
        $cek_tentor=$this->M_login->auth_tentor($username,$password);
        //jika login sebagai pegawai
        if($cek_pegawai->num_rows() > 0){ 
            $data=$cek_pegawai->row_array();
            $this->session->set_userdata('masuk',TRUE);
            if($data['LEVEL']=='1'){ //akses untuk admin
                $this->session->set_userdata('akses','admin');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                $this->session->set_userdata('ses_email',$data['EMAIL']);
                redirect(site_url('Home'));
            }elseif($data['LEVEL']=='2'){ //akses pemilik
                $this->session->set_userdata('akses','pemilik');
                $this->session->set_userdata('ses_id',$data['ID_PEGAWAI']);
                $this->session->set_userdata('ses_nama',$data['NAMA_PEGAWAI']);
                $this->session->set_userdata('ses_email',$data['EMAIL']);
                redirect(site_url('Home'));
            }else{
                $error = 'Username atau Password salah';
                $this->index($error);
            }
        }elseif ($cek_tentor->num_rows()>0) {
            if ($cek_tentor->num_rows() > 0) {
                $data=$cek_tentor->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('akses','tentor');
                $this->session->set_userdata('ses_id',$data['ID_TENTOR']);
                $this->session->set_userdata('ses_nama',$data['NAMA_TENTOR']);
                $this->session->set_userdata('ses_email',$data['EMAIL_TENTOR']);
                redirect(site_url('Home'));
            }else{
                $error = 'Username atau Password salah';
            $this->index($error);
            }
        //jika login sebagai siswa
        }else{ 
            $cek_siswa=$this->M_login->auth_siswa($username,$password);
            if ($cek_siswa->num_rows() > 0) {
                $data=$cek_siswa->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('akses','siswa');
                $this->session->set_userdata('ses_id',$data['NO_INDUK']);
                $this->session->set_userdata('ses_nama',$data['NAMA_SISWA']);
                $this->session->set_userdata('ses_kelas',$data['ID_KELAS']);
                $this->session->set_userdata('ses_email',$data['EMAIL_SISWA']);
                redirect(site_url('Home'));
            }else {
                $error = 'Username atau Password salah';
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