<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Upload_file extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        $this->load->library('form_validation');
        }

        public function bukti_pembayaran_daftar_ulang(){
            if($this->session->userdata('akses') == 'siswa'){

                $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');
                //rules validasi
                $this->form_validation->set_rules('pemilik_rekening', 'pemilik rekening', 'required|max_length[50]',[
                    'required' =>'*pemilik rekening tidak boleh kosong',
                    'max_length'=> '*pemilik rekening maksimal 50 karakter']);
                $this->form_validation->set_rules('nama_bank', 'nama bank', 'required|max_length[50]',[
                    'required' =>'*nama bank tidak boleh kosong',
                    'max_length'=> '*nama bank maksimal 50 karakter']);
                
                if ($this->form_validation->run() == FALSE) {
                    $id = $this->input->post('id_pendaftaran');
                    redirect(site_url('Pembayaran_daftar_ulang/upload_bukti_pembayaran/'.$id));
                }else{
                    $config['upload_path']      = 'upload/bukti_pembayaran_daftar_ulang/';
                    $config['allowed_types']    = 'jpg|png|jpeg';
                    $config['max_size']         = '5120';
                    $config['file_name']        = 'BDU-'.$this->input->post('id_pendaftaran');
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $nama = $this->upload->data("file_name");
                        $data = array(
                        'ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG'              => 'BDU'.$this->input->post('id_pendaftaran'),
                        'ID_DAFTAR_ULANG'                               => $this->input->post('id_pendaftaran', TRUE),
                        'NAMA_PEMILIK_REKENING'                         => $this->input->post('pemilik_rekening', TRUE),
                        'NAMA_BANK'                                     => $this->input->post('nama_bank', TRUE),
                        'TANGGAL_UPLOAD_BUKTI_PEMBAYARAN_DAFTAR_ULANG'  => $this->input->post('tanggal', TRUE),
                        'FOTO_BUKTI_PEMBAYARAN_DAFTAR_ULANG'            => $nama,
                        'STATUS'                                        => '0'

                        );
                        $this->load->model('M_API');
                        $this->M_API->saveData('bukti_pembayaran_daftar_ulang',$data);
                        $this->session->set_flashdata('flash','Disimpan');
                        redirect(site_url('Daftar_Ulang/tagihan_pembayaran'));
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error',$error);
                        echo "<script>history.go(-1);</script>";
                    }
                }
                
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function bukti_pembayaran(){
            if($this->session->userdata('akses') == 'pendaftar'){
                $this->form_validation->set_error_delimiters('<div style="margin-bottom:-10px"><span style="color:red;font-size:12px">', '</span></div>');
                //rules validasi
                $this->form_validation->set_rules('pemilik_rekening', 'pemilik rekening', 'required|max_length[50]',[
                    'required' =>'*pemilik rekening tidak boleh kosong',
                    'max_length'=> '*pemilik rekening maksimal 50 karakter']);
                $this->form_validation->set_rules('nama_bank', 'nama bank', 'required|max_length[50]',[
                    'required' =>'*nama bank tidak boleh kosong',
                    'max_length'=> '*nama bank maksimal 50 karakter']);
                
                if ($this->form_validation->run() == FALSE) {
                    redirect(site_url('Pembayaran/upload_bukti_pembayaran'));
                }else{
                    $config['upload_path']      = 'upload/bukti_pembayaran/';
                    $config['allowed_types']    = 'jpg|png|jpeg';
                    $config['max_size']         = '5120';
                    $config['file_name']        = 'BUKTI-'.$this->input->post('id_pendaftaran');
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $nama = $this->upload->data("file_name");
                        $data = array(
                        'ID_BUKTI_PEMBAYARAN'   => 'BUKTI'.$this->input->post('id_pendaftaran'),
                        'NO_PENDAFTARAN'        => $this->input->post('id_pendaftaran', TRUE),
                        'NAMA_PEMILIK_REKENING' => $this->input->post('pemilik_rekening', TRUE),
                        'NAMA_BANK'             => $this->input->post('nama_bank', TRUE),
                        'TANGGAL_UPLOAD_BUKTI'  => $this->input->post('tanggal', TRUE),
                        'FOTO_BUKTI'            => $nama,
                        'STATUS'                => '0'
                        );
                        $this->load->model('M_API');
                        $this->M_API->saveData('bukti_pembayaran',$data);
                        $this->session->set_flashdata('flash','Disimpan');
                        redirect(site_url('Pembayaran/upload_bukti_pembayaran'));
                    }else{
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error',$error);
                        echo "<script>history.go(-1);</script>";
                    }
                }
                
            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

    }
?>