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

    public function get_pembayaran_daftar_siswa_baru()
    {
    	$query=$this->db->query("SELECT *FROM pembayaran ORDER BY ID_PEMBAYARAN DESC");
		return $query;
    }

    public function get_pembayaran_daftar_ulang()
    {
    	$query=$this->db->query("SELECT *FROM pembayaran_daful ORDER BY ID_PEMBAYARAN_DAFUL DESC");
		return $query;
    }

    public function cek_pembayaran_daftar_siswa_baru($id){
        $query=$this->db->query("SELECT p.ID_PEMBAYARAN, p.NO_PENDAFTARAN ,p.TANGGAL_PEMBAYARAN, p.TOTAL_PEMBAYARAN ,peg.NAMA_PEGAWAI FROM pembayaran p 
        						LEFT JOIN pegawai peg on p.ID_PEGAWAI = peg.ID_PEGAWAI
        						WHERE ID_PEMBAYARAN='$id' LIMIT 1");
        return $query;
    }

    public function cek_pembayaran_daftar_ulang($id){
        $query=$this->db->query("SELECT*FROM pembayaran WHERE ID_PEMBAYARAN='$id' LIMIT 1");
        return $query;
    }
    
}