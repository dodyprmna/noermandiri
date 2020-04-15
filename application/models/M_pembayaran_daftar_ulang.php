<?php

class M_pembayaran_daftar_ulang extends CI_Model {

	public function simpan($data)
    {
        $this->db->insert('pembayaran_daftar_ulang', $data);
    }

    public function cekPembayaran($id)
    {
	    $query=$this->db->query("SELECT *FROM pembayaran_daftar_ulang WHERE ID_DAFTAR_ULANG = '$id'");
        return $query;
    }

    public function get_pembayaran_daftar_ulang($limit,$start,$keyword)
    {
        if ($keyword) {
            $this->db->like('ID_PEMBAYARAN_DAFTAR_ULANG',$keyword);
        }
    	$this->db->SELECT('*');
        $this->db->FROM('pembayaran_daftar_ulang');
        $this->db->ORDER_BY('ID_PEMBAYARAN_DAFTAR_ULANG', 'DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
		return $query;
    }

    public function getDataById($id){
        $query=$this->db->query("SELECT p.ID_PEMBAYARAN_DAFTAR_ULANG, p.ID_DAFTAR_ULANG ,p.TGL_PEMBAYARAN_DAFTAR_ULANG, p.TOTAL_PEMBAYARAN_DAFTAR_ULANG ,peg.NAMA_PEGAWAI FROM pembayaran_daftar_ulang p 
                                LEFT JOIN pegawai peg on p.ID_PEGAWAI = peg.ID_PEGAWAI
                                WHERE ID_PEMBAYARAN_DAFTAR_ULANG='$id' LIMIT 1");
        return $query;
    }
}