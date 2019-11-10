<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth extends CI_Controller {

function __construct(){
        parent::__construct();
        // $this->load->model('auth_model');
        }

    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('auth/login'),
            'error' => $error,
            'judul' => 'Login Siswa'
        );
        $this->load->view('siswa/login', $data);
    }

//     public function login() {
//         $login = $this->auth_model->login($this->input->post('username'), md5($this->input->post('password')));

//         if ($login == 1) {
// //          ambil detail data
//             $row = $this->auth_model->data_login($this->input->post('username'), md5($this->input->post('password')));
//                 if($row->status==0){
// //            redirect ke halaman sukses
//                     //          daftarkan session
//                     $data = array(
//                         'logged' => TRUE,
//                         'username' => $row->username,
//                         'level' => 'admin'
//                     );
//                     $this->session->set_userdata($data);
//                     redirect(site_url('Home'));
//                 } else {
//                     $data = array(
//                         'logged' => TRUE,
//                         'username' => $row->username,
//                         'level' => 'supplier',
//                         'id'=> $row->id_user
//                     );
//                     $this->session->set_userdata($data);
//                     redirect(site_url('Home'));
//                 }
//         } else {
// //            tampilkan pesan error
//             $error = 'username / password salah';
//             $this->index($error);
//         }
//     }

//     function logout() {
// //        destroy session
//         $this->session->sess_destroy();
        
// //        redirect ke halaman login
//         redirect(site_url('auth'));
//     }
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */