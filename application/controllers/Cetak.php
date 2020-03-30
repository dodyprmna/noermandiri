<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
    }

    public function bukti_pendaftaran_siswa_baru()
    {
        $this->load->model('M_pendaftaran');
    	$this->load->library('dompdf_gen');
    	$email 				= $this->input->post('email', TRUE);
        $dataa 				= $this->M_pendaftaran->getDataRegistrasi($email)->result();
        $row['id'] 			= $dataa[0]->NO_PENDAFTARAN;
		$row['nama'] 		= $dataa[0]->NAMA_PENDAFTAR;
		$row['alamat'] 		= $dataa[0]->ALAMAT_PENDAFTAR;
		$row['telepon'] 	= $dataa[0]->NOTELP_PENDAFTAR;
		$row['tanggal'] 	= $dataa[0]->TANGGAL_PENDAFTARAN;
		$row['jenjang'] 	= $dataa[0]->ID_JENJANG;
		$row['biaya_regis'] = number_format($dataa[0]->BIAYA_REGISTRASI,2,',','.');
		$row['biaya_les'] 	= number_format($dataa[0]->BIAYA_LES,2,',','.');
		$row['total'] 		= number_format($dataa[0]->TOTAL_TAGIHAN,2,',','.');
		
        
        $html = $this->output->get_output($this->load->view('bukti_pendaftaran', $row));
        
        $this->dompdf->load_html($html);
        $this->dompdf->set_paper('A4','potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Invoice.pdf',array("Attachment" => 0));
        // $this->session->set_flashdata('flash','Disimpan1');
    }

    public function bukti_daftar_ulang()
     {
         
     } 

    public function bukti_pembayaran($id)
    {
        $this->load->model('M_pembayaran');
        $pembayaran_baru = $this->M_pembayaran->cek_pembayaran_daftar_siswa_baru($id);
        //jika data pembayaran siswa baru
        if($pembayaran_baru->num_rows() > 0){ 
            $data=$pembayaran_baru->row_array();
            $this->load->library('dompdf_gen');
            $row['id']                = $data['ID_PEMBAYARAN'];
            $row['pegawai']           = $data['NAMA_PEGAWAI'];
            $row['tanggal']           = date("d-m-Y",strtotime($data['TANGGAL_PEMBAYARAN']));
            $row['total']             = number_format($data['TOTAL_PEMBAYARAN'],2,',','.');
            $row['no_pendaftaran']    = $data['NO_PENDAFTARAN'];
            $html = $this->output->get_output($this->load->view('bukti_pembayaran', $row));
            
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper('A4','landscape');
            $this->dompdf->render();
            $this->dompdf->stream('Bukti_pembayaran.pdf',array("Attachment" => 0));
        }else { 
            $cek_siswa=$this->M_login->auth_siswa($username,$password);
            if ($cek_siswa->num_rows() > 0) {
                $data=$cek_siswa->row_array();
                $this->session->set_userdata('masuk',TRUE);
                $this->session->set_userdata('akses','siswa');
                $this->session->set_userdata('ses_id',$data['NOINDUK']);
                $this->session->set_userdata('ses_nama',$data['NAMA_SISWA']);
                $this->session->set_userdata('ses_kelas',$data['ID_KELAS']);
                redirect(site_url('Home'));
            }else {
                $error = 'Username atau Password salah';
            $this->index($error);
            }

        }
    }
}
