<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bukti_Pembayaran extends CI_Controller {

    function __construct(){
    parent::__construct();
        if($this->session->userdata('masuk') != TRUE){
            redirect(site_url('Auth'));
        }
    }

    public function siswa_baru(){
        $this->load->model('M_bukti_pembayaran');
        if($this->session->userdata('akses')=='admin'){
            if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('no_pendaftaran');
                }else{
                    $d['keyword'] = null;
                }

            $bukti = $this->M_bukti_pembayaran->getByStatus($d['keyword'])->result();
        }else{
            $bukti = $this->M_bukti_pembayaran->getAll()->result();
        }
         
        $data = array(
	            'title'            => 'Bukti Pembayaran',
	            'content'          => 'Bukti Pembayaran',
	            'judul'            => 'Bukti Pembayaran',
                'content'          => 'tabel/t_bukti_pembayaran',
                'bukti'            => $bukti
        );
        $this->load->view('layout', $data);
    }

    public function daftar_ulang(){
        if ($this->input->post('submit')) {
                    $d['keyword'] = $this->input->post('id_daftar_ulang');
                }else{
                    $d['keyword'] = null;
                }
        $this->load->model('M_bukti_pembayaran_daftar_ulang');
        $bukti = $this->M_bukti_pembayaran_daftar_ulang->getByStatus($d['keyword'])->result(); 
        $data = array(
                'title'            => 'Bukti Pembayaran Daftar Ulang',
                'content'          => 'Bukti Pembayaran Daftar Ulang',
                'judul'            => 'Bukti Pembayaran Daftar Ulang',
                'content'          => 'tabel/t_bukti_pembayaran_daftar_ulang',
                'bukti'            => $bukti
        );
        $this->load->view('layout', $data);
    }

    public function download($id)
    {
        $this->load->helper('download');
        $this->load->model('M_bukti_pembayaran');
        $bukti = $this->M_bukti_pembayaran->getById($id)->row();
        force_download('upload/bukti_pembayaran/'.$bukti->FOTO_BUKTI,NULL);
    }

    public function download_($id)
    {
        $this->load->helper('download');
        $this->load->model('M_bukti_pembayaran_daftar_ulang');
        $bukti = $this->M_bukti_pembayaran_daftar_ulang->getById($id)->row();
        force_download('upload/bukti_pembayaran_daftar_ulang/'.$bukti->FOTO_BUKTI_PEMBAYARAN_DAFTAR_ULANG,NULL);
    }

    public function hapus($id)
    {
        $this->load->model('M_bukti_pembayaran');
        if ($this->session->userdata('akses') == 'pendaftar') {

            $bukti = $this->M_bukti_pembayaran->getByiD($id)->row();

            unlink('bukti_pembayaran/'.$bukti->FOTO_BUKTI);

            $this->M_bukti_pembayaran->hapus($id);

            redirect(site_url('Pembayaran/upload_bukti_pembayaran'));
        }else{
            echo"<script>history.go(-1);</script>";
        }
    }

    public function hapus_($id)
    {
        $this->load->model('M_bukti_pembayaran_daftar_ulang');
        if ($this->session->userdata('akses') == 'siswa') {

            $bukti = $this->M_bukti_pembayaran_daftar_ulang->getByiD($id)->row();

            unlink('bukti_pembayaran_daftar_ulang/'.$bukti->FOTO_BUKTI);

            $this->M_bukti_pembayaran_daftar_ulang->hapus($id);

            redirect(site_url('Pembayaran_daftar_ulang/upload_bukti_pembayaran/'.$bukti->ID_DAFTAR_ULANG));
        }else{
            echo"<script>history.go(-1);</script>";
        }
    }
}
?>