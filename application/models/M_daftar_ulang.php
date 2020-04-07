<?php

class M_daftar_ulang extends CI_Model {
	

	//tampilkan semua data pendaftaran untuk admin
    public function getDataDaftarUlangSiswa($limit, $start,$keyword = null)
    {
        if ($keyword) {
            $this->db->like('ID_DAFTAR_ULANG',$keyword);
        }
        $this->db->SELECT('*');
        $this->db->FROM('daftar_ulang');
        $this->db->order_by('TGL_DAFTAR_ULANG','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query;
    }

    public function getDaftarUlangSiswa()
    {
        $this->db->select('*');
        $this->db->from('daftar_ulang');
        $this->db->where('NO_INDUK',$this->session->userdata('ses_id'));
        $query = $this->db->get();
        return $query;
    }

    function update_status($data, $id){
        $this->db->where('ID_DAFTAR_ULANG', $id);
        $this->db->update('daftar_ulang', $data);
    }
    
}