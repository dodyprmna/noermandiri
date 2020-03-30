<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
        }

    public function index(){

        $this->form_validation->set_rules('nama', 'Nama Pendaftar', 'required|max_length[30]',['required' => 'Nama tidak boleh kosong',
            'max_length'=>'Nama maksimal 30 karakter']);
        $this->form_validation->set_rules('alamat', 'Alamat Pendaftar', 'required|max_length[50]',['required' => 'Alamat tidak boleh kosong',
            'max_length'=>'Alamat maksimal 30 karakter']);
        $this->form_validation->set_rules('notelp','No Telepon', 'required|numeric|max_length[13]',['required' => 'Nomor Telepon tidak boleh kosong',
            'numeric'=>'Nomor telepon harus angka',
            'max_length'=>'Nomor telepon maksimal 13 angka']);
        $this->form_validation->set_rules('notelp_ortu', 'No Telepon Ortu', 'required',['required' => 'Nomor telepon orang tua tidak boleh kosong']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenjang', 'Jenjang', 'required|trim');

        if( $this->form_validation->run() == false) {
            $this->load->model('M_jenjang_kelas');
            $row = $this->M_jenjang_kelas->tampilkanSemua()->result();
            $data = array(
                'jkelas' => $row, 
            );
            $this->load->view('landingpage', $data);
        }else{
            $id = $this->input->post('jenjang', true);
            $this->load->model('M_jenjang_kelas');
            $row = $this->M_jenjang_kelas->getBiaya($id)->result();
            $data = [
                'NO_PENDAFTARAN'        => '',
                'ID_JENJANG'            => ($this->input->post('jenjang', true)),
                'TANGGAL_PENDAFTARAN'   => date("Y-m-d"),
                'NAMA_PENDAFTAR'        => ($this->input->post('nama', true)),
                'ALAMAT_PENDAFTAR'      => ($this->input->post('alamat', true)),
                'TGL_LAHIR_PENDAFTAR'   => ($this->input->post('tgl_lahir', true)),
                'NOTELP_PENDAFTAR'      => ($this->input->post('notelp', true)),
                'NOTELP_ORTU'           => ($this->input->post('notelp_ortu', true)),
                'BIAYA_REGISTRASI'      => '50000',
                'BIAYA_LES'             => $row[0]->BIAYA,
                'TOTAL_TAGIHAN'         => $row[0]->BIAYA+50000,
                'STATUS'                => '0' 
            ];

            $this->db->insert('pendaftaran_siswa_baru', $data);
            redirect('Bukti',$data);
            // return $this->output->set_content_type("application/json")->set_status_header(200)->set_output(json_encode(["error" => false, "message" => "Pendaftaran Berhasil", "last_id" => $this->db->insert_id()]));

            // redirect('utama');
        }
    }

	 


}