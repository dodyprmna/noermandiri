<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Daftar_Ulang extends CI_Controller {

        function __construct(){
        parent::__construct();
            if($this->session->userdata('masuk') != TRUE){
                redirect(site_url('Auth'));
            }
        $this->load->library('form_validation');
        }

        function tambah(){
            //jika sebagai siswa
            if($this->session->userdata('akses') == 'siswa'){
            $this->load->library('form_validation');          
            $this->load->model('M_jenjang_kelas');
            $jenjang = $this->M_jenjang_kelas->tampilkanSemua()->result();
            $data = array(
                'jenjang' => $jenjang,
                'judul'     => 'Form Daftar Ulang',
                'title'     => 'Daftar Ulang',
                'content'   => 'form/f_daftar_ulang',
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }

        public function simpan()
        {
            if($this->session->userdata('akses') == 'siswa'){
                $id = $this->input->post('jenjang', true);
                $this->load->model('M_jenjang_kelas');
                $biaya = $this->M_jenjang_kelas->getBiaya($id)->result();
                $data = array(
                    'ID_DAFTAR_ULANG'           => '',
                    'ID_JENJANG'                => $this->input->post('jenjang', TRUE),
                    'NO_INDUK'                  => $this->session->userdata('ses_id'),
                    'TGL_DAFTAR_ULANG'          => date("Y-m-d"),
                    'TOTAL_BIAYA_DAFTAR_ULANG'  => $biaya[0]->BIAYA,
                    'STATUS'                    => '0'
                );

                $this->load->model('M_API');
                $this->M_API->saveData('daftar_ulang',$data);
                $this->session->set_flashdata('flash','Disimpan');
                redirect(site_url('Daftar_Ulang/riwayat_pembayaran'));

            }else{
                echo "<script>history.go(-1);</script>";
            }
        }

        public function riwayat_pembayaran()
        {
            if($this->session->userdata('akses') == 'siswa'){        
            $this->load->model('M_daftar_ulang');
            $tagihan = $this->M_daftar_ulang->getDaftarUlangSiswa()->result();
            $data = array(
                'judul'     => 'Riwayat Pembayaran',
                'title'     => 'Riwayat Pembayaran',
                'content'   => 'tabel/t_riwayat_pembayaran',
                'tagihan'   => $tagihan
            );
            $this->load->view('layout', $data);
            }else{ //jika selain admin dan jika mengakses langsung ke controller ini maka akan diarahkan ke halaman sekarang
                echo "<script>history.go(-1);</script>";
            }
        }
    }