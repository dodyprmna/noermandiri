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
            $data = array(
    	            'title'      => 'Profil',
    	            'content'    => 'profil',
    	            'judul'      => 'Profil',
    	        );
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
                $this->ubah_password();;
                } else {
                        if ($this->session->userdata('akses')=='tentor') {
                            $data = array(
                                'judul'     => 'Ubah Password',
                                'title'     => 'Ubah Password',
                                'content'   => 'form/f_ubah_password',
                                'action'    => "<?php echo base_url('Tentor/ubah_password')?>"
                            );
                            $this->load->view('layout',$data);
                        }elseif ($this->session->userdata('akses')=='siswa') {
                            $data = array(
                                'judul'     => 'Ubah Password',
                                'title'     => 'Ubah Password',
                                'content'   => 'form/f_ubah_password',
                                'action'    => "<?php echo base_url('Siswa/ubahpassword')?>"
                            );
                            $this->load->view('layout',$data);
                        }else{
                            $id = $this->session->userdata('ses_id');
                            $data = array(
                                'PASSWORD_PEGAWAI' => MD5($this->input->post('password'))
                            );
                            $this->load->model('M_pegawai');
                            $this->M_pegawai->update_password($data,$id);
                            $this->session->set_flashdata('flash','pass');
                            redirect(site_url('Profil'));
                        }
                }
        }
    }