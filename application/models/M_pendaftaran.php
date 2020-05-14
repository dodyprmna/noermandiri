<?php

class M_pendaftaran extends CI_Model {
	

	//tampilkan semua data pendaftaran untuk admin
    public function getDataPendaftaran_SiswaBaru($limit, $start,$keyword = null)
    {
        if ($keyword) {
            $this->db->like('NO_PENDAFTARAN',$keyword);
        }
        $this->db->SELECT('*');
        $this->db->FROM('pendaftaran_siswa_baru p'); 
        $this->db->join('jenjang_kelas jk','p.ID_JENJANG = jk.ID_JENJANG');
        $this->db->order_by('p.TANGGAL_PENDAFTARAN','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query;
    }

    public function getAll()
    {
        $this->db->SELECT('*');
        $this->db->FROM('pendaftaran_siswa_baru p'); 
        $this->db->join('jenjang_kelas jk','p.ID_JENJANG = jk.ID_JENJANG');
        $this->db->order_by('p.NO_PENDAFTARAN','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getDataRegistrasi($email) {
        $query=$this->db->query("SELECT p.NO_PENDAFTARAN, p.NAMA_PENDAFTAR, p.ALAMAT_PENDAFTAR, p.NOTELP_PENDAFTAR, p.TGL_LAHIR_PENDAFTAR, p.EMAIL_PENDAFTAR, p.BIAYA_REGISTRASI, p.BIAYA_LES ,p.TOTAL_TAGIHAN,p.ASAL_SEKOLAH, jk.NAMA_JENJANG
                                 FROM pendaftaran_siswa_baru p
                                 JOIN jenjang_kelas jk ON p.ID_JENJANG = jk.ID_JENJANG
                                 WHERE EMAIL_PENDAFTAR = '$email'
                                 ORDER BY NO_PENDAFTARAN DESC limit 1");
        return $query;
    }

    function update_status_pendaftaran_siswa_baru($data, $id){
        $this->db->where('NO_PENDAFTARAN', $id);
        $this->db->update('pendaftaran_siswa_baru', $data);
    }

    public function hitung_data_pendaftaran_siswa_baru(){
        $this->db->select('*');
        $this->db->from('pendaftaran_siswa_baru');
        return $this->db->get()->num_rows();
    }

    public function getByPeriode($awal,$akhir) {
        $this->db->SELECT('*');
        $this->db->FROM('pendaftaran_siswa_baru p'); 
        $this->db->join('jenjang_kelas jk','p.ID_JENJANG = jk.ID_JENJANG');
        $this->db->where('p.TANGGAL_PENDAFTARAN >=',$awal);
        $this->db->where('p.TANGGAL_PENDAFTARAN <=',$akhir);
        $this->db->order_by('p.NO_PENDAFTARAN','ASC');
        $query = $this->db->get();
        return $query;
    }
    
    public function getPendaftaranById($id){
        $query=$this->db->query("SELECT *
                                 FROM pendaftaran_siswa_baru p
                                 JOIN jenjang_kelas jk ON p.ID_JENJANG = jk.ID_JENJANG
                                 WHERE p.NO_PENDAFTARAN = '$id' AND p.STATUS = 1");
        return $query;
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('pendaftaran_siswa_baru');
        $this->db->where('NO_PENDAFTARAN',$id);
        return$this->db->get();
    }

    public function get_belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('pendaftaran_siswa_baru');
        $this->db->where('STATUS','0');
        return$this->db->get();
    }
}