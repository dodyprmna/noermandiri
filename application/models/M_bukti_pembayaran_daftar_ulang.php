<?php

class M_bukti_pembayaran_daftar_ulang extends CI_Model {

	//tampilkan semua data
    public function getAll (){
        $this->db->select('*');
        $this->db->from('bukti_pembayaran_daftar_ulang');
        $this->db->order_by('ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG','DESC');
        return $this->db->get();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('bukti_pembayaran_daftar_ulang');
        $this->db->where('ID_BUKTI_PEMBAYARAN_DAFTAR_ULANG',$id);
        return $this->db->get();
    }

    public function getByIdDaftarUlang($id)
    {
        $this->db->select('*');
        $this->db->from('bukti_pembayaran_daftar_ulang');
        $this->db->where('ID_DAFTAR_ULANG',$id);
        return $this->db->get();
    }

     public function getByStatus($id)
    {
        if($id) {
            $this->db->like('ID_DAFTAR_ULANG',$id);
        }
        $this->db->select('*');
        $this->db->from('bukti_pembayaran_daftar_ulang');
        $this->db->where('STATUS','0');
        return $this->db->get();
    }

    public function update($id,$data)
    {
        $this->db->where('ID_DAFTAR_ULANG', $id);
        $this->db->update('bukti_pembayaran_daftar_ulang',$data);
    }

    public function hapus($id)
    {
        $this->db->where('ID_DAFTAR_ULANG', $id);
        $this->db->delete('bukti_pembayaran_daftar_ulang');
    }
}