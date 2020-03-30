<?php

class M_pendaftaran extends CI_Model {
	

	//tampilkan semua data pendaftaran untuk admin
    public function getDataPendaftaran_SiswaBaru()
    {
        $query=$this->db->query("SELECT *
                                FROM pendaftaran_siswa_baru p
                                LEFT JOIN jenjang_kelas jk ON p.ID_JENJANG = jk.ID_JENJANG
                                ORDER BY p.TANGGAL_PENDAFTARAN DESC");
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
    
}