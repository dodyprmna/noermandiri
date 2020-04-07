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

    public function getDataRegistrasi($email) {
        $query=$this->db->query("SELECT *
                                 FROM pendaftaran_siswa_baru
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
    
}