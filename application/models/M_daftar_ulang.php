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
        $this->db->where('STATUS_DAFTAR_ULANG',0);
        $query = $this->db->get();
        return $query;
    }

    function update_status($data, $id){
        $this->db->where('ID_DAFTAR_ULANG', $id);
        $this->db->update('daftar_ulang', $data);
    }

    public function getAll()
    {
        $this->db->SELECT('*');
        $this->db->FROM('daftar_ulang p'); 
        $this->db->join('jenjang_kelas jk','p.ID_JENJANG = jk.ID_JENJANG');
        $this->db->order_by('p.ID_DAFTAR_ULANG','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getByPeriode($awal,$akhir) {
        $this->db->SELECT('*');
        $this->db->FROM('daftar_ulang p'); 
        $this->db->join('jenjang_kelas jk','p.ID_JENJANG = jk.ID_JENJANG');
        $this->db->where('p.TGL_DAFTAR_ULANG >=',$awal);
        $this->db->where('p.TGL_DAFTAR_ULANG <=',$akhir);
        $this->db->order_by('p.ID_DAFTAR_ULANG','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getById($id) {
        $this->db->SELECT('*');
        $this->db->FROM('daftar_ulang');
        $this->db->where('ID_DAFTAR_ULANG',$id);
        $query = $this->db->get();
        return $query;
    }

    public function get_belum_bayar()
    {
        $this->db->SELECT('*');
        $this->db->FROM('daftar_ulang');
        $this->db->where('STATUS_DAFTAR_ULANG','0');
        $query = $this->db->get();
        return $query;    }
    
}