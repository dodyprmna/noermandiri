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
}