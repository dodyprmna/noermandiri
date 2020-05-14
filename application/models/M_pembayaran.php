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

    public function getAll()
    {
        $this->db->SELECT('*');
        $this->db->FROM('pembayaran p'); 
        $this->db->join('pegawai pg','p.ID_PEGAWAI = pg.ID_PEGAWAI');
        $this->db->order_by('p.ID_PEMBAYARAN','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getByPeriode($awal,$akhir) {
        $this->db->SELECT('*');
        $this->db->FROM('pembayaran p'); 
        $this->db->join('pegawai pg','p.ID_PEGAWAI = pg.ID_PEGAWAI');
        $this->db->where('p.TANGGAL_PEMBAYARAN >=',$awal);
        $this->db->where('p.TANGGAL_PEMBAYARAN <=',$akhir);
        $this->db->order_by('p.ID_PEMBAYARAN','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function total($awal,$akhir) {
        $this->db->SELECT('SUM(TOTAL_PEMBAYARAN) as total');
        $this->db->FROM('pembayaran'); 
        $this->db->where('TANGGAL_PEMBAYARAN >=',$awal);
        $this->db->where('TANGGAL_PEMBAYARAN <=',$akhir);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getTotalPembayaran()
    {
        $this->db->SELECT('SUM(TOTAL_PEMBAYARAN) as total');
        $this->db->FROM('pembayaran'); 
        $query = $this->db->get()->row();
        return $query;
    }

    public function get_by_no_pendaftaran($id) {
        $query=$this->db->query("SELECT p.NO_PENDAFTARAN, p.ID_PEMBAYARAN, p.NO_PENDAFTARAN ,p.TANGGAL_PEMBAYARAN, p.TOTAL_PEMBAYARAN ,peg.NAMA_PEGAWAI FROM pembayaran p 
                                LEFT JOIN pegawai peg on p.ID_PEGAWAI = peg.ID_PEGAWAI
                                WHERE NO_PENDAFTARAN = '$id' LIMIT 1");
        return $query;
    }
}