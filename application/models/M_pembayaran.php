<?php

class M_pembayaran extends CI_Model {

	public function simpan_pembayaran_siswa_baru($data)
    {
        $this->db->insert('pembayaran', $data);
    }

    public function cekPembayaran($id)
    {
	    $query=$this->db->query("SELECT *FROM pembayaran WHERE NO_PENDAFTARAN = '$id'");
		return $query;
    }

    public function cekPembayaranDaftarUlang($id_daftar_ulang)
    {
        $query=$this->db->query("SELECT *FROM pembayaran_daftar_ulang WHERE ID_DAFTAR_ULANG = '$id'");
        return $query;
    }

    public function get_pembayaran_daftar_siswa_baru($limit,$start,$keyword)
    {
        if ($keyword) {
            $this->db->like('NO_PENDAFTARAN',$keyword);
        }
    	$this->db->SELECT('*');
        $this->db->FROM('pembayaran');
        $this->db->ORDER_BY('ID_PEMBAYARAN', 'DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
		return $query;
    }

    public function getDataById($id){
        $query=$this->db->query("SELECT p.NO_PENDAFTARAN, p.ID_PEMBAYARAN, p.NO_PENDAFTARAN ,p.TANGGAL_PEMBAYARAN, p.TOTAL_PEMBAYARAN ,peg.NAMA_PEGAWAI FROM pembayaran p 
        						LEFT JOIN pegawai peg on p.ID_PEGAWAI = peg.ID_PEGAWAI
        						WHERE ID_PEMBAYARAN='$id' LIMIT 1");
        return $query;
    }

    public function cek_pembayaran_daftar_ulang($id){
        $query=$this->db->query("SELECT*FROM pembayaran WHERE ID_PEMBAYARAN='$id' LIMIT 1");
        return $query;
    }
    
}