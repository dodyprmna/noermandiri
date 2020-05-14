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
        $query=$this->db->query("SELECT * FROM pembayaran_daftar_ulang P
                                JOIN pegawai PG on P.ID_PEGAWAI = PG.ID_PEGAWAI
                                JOIN daftar_ulang D on P.ID_DAFTAR_ULANG = D.ID_DAFTAR_ULANG
                                JOIN siswa S on D.NO_INDUK = S.NO_INDUK
                                WHERE ID_PEMBAYARAN_DAFTAR_ULANG='$id' LIMIT 1");
        return $query;
    }

     public function getDataBayarSiswa($id){
        $query=$this->db->query("SELECT * FROM pembayaran_daftar_ulang P
                                JOIN pegawai PG on P.ID_PEGAWAI = PG.ID_PEGAWAI
                                JOIN daftar_ulang D on P.ID_DAFTAR_ULANG = D.ID_DAFTAR_ULANG
                                JOIN siswa S on D.NO_INDUK = S.NO_INDUK
                                WHERE D.ID_DAFTAR_ULANG='$id' LIMIT 1");
        return $query;
    }

    public function getAll()
    {
        $this->db->SELECT('*');
        $this->db->FROM('pembayaran_daftar_ulang p'); 
        $this->db->join('pegawai pg','p.ID_PEGAWAI = pg.ID_PEGAWAI');
        $this->db->order_by('p.ID_PEMBAYARAN_DAFTAR_ULANG','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function getByPeriode($awal,$akhir) {
        $this->db->SELECT('*');
        $this->db->FROM('pembayaran_daftar_ulang p'); 
        $this->db->join('pegawai pg','p.ID_PEGAWAI = pg.ID_PEGAWAI');
        $this->db->where('p.TGL_PEMBAYARAN_DAFTAR_ULANG >=',$awal);
        $this->db->where('p.TGL_PEMBAYARAN_DAFTAR_ULANG <=',$akhir);
        $this->db->order_by('p.ID_PEMBAYARAN_DAFTAR_ULANG','ASC');
        $query = $this->db->get();
        return $query;
    }

    public function total($awal,$akhir) {
        $this->db->SELECT('SUM(TOTAL_PEMBAYARAN_DAFTAR_ULANG) as total');
        $this->db->FROM('pembayaran_daftar_ulang'); 
        $this->db->where('TGL_PEMBAYARAN_DAFTAR_ULANG >=',$awal);
        $this->db->where('TGL_PEMBAYARAN_DAFTAR_ULANG <=',$akhir);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getTotalPembayaran()
    {
        $this->db->SELECT('SUM(TOTAL_PEMBAYARAN_DAFTAR_ULANG) as total');
        $this->db->FROM('pembayaran_daftar_ulang'); 
        $query = $this->db->get()->row();
        return $query;
    }

    public function getPembayaranSiswa()
    {
        $this->db->SELECT('*');
        $this->db->FROM('pembayaran_daftar_ulang p');
        $this->db->join('daftar_ulang d','p.ID_DAFTAR_ULANG = d.ID_DAFTAR_ULANG');
        $this->db->WHERE('d.NO_INDUK',$this->session->userdata('ses_id')); 
        $query = $this->db->get();
        return $query;
    }

    public function get_by_id_daftar_ulang($id)
    {
        $this->db->SELECT('*');
        $this->db->FROM('pembayaran_daftar_ulang');
        $this->db->WHERE('ID_DAFTAR_ULANG',$id); 
        $query = $this->db->get();
        return $query;
    }

}