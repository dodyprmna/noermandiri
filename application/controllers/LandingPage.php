<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LandingPage extends CI_Controller {

        function __construct(){
        parent::__construct();
        //     if($this->session->userdata('logged') <> 1){
        //         redirect(site_url('auth'));
        //     }
        // $this->load->library('form_validation');
        }

    public function index(){
       $data = array(
	            'title' => 'LBB Noermandiri',
	            'content' => 'home',
	            'judul' => 'LBB Noermandiri',
	        );
	        $this->load->view('landingpage', $data);
    }

	 


}
?>