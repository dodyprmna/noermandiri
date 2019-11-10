<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){
    parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(site_url('Auth'));
        }
    $this->load->library('form_validation');
    }

    function index(){
       $data = array(
	            'title' => 'Home',
	            'content' => 'home',
	            'judul' => 'Home',
	        );
	        $this->load->view('layout', $data);
    }

}
?>