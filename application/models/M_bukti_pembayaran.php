<?php

class M_bukti_pembayaran extends CI_Model {

	//tampilkan semua data
    public function getAll(){
        $this->db->select('*');
        $this->db->from('bukti_pembayaran');
        $this->db->order_by('ID_BUKTI_PEMBAYARAN','DESC');
        return $this->db->get();
    }

    public function getByPendaftar($id)
    {
        $this->db->select('*');
        $this->db->from('bukti_pembayaran');
        $this->db->where('NO_PENDAFTARAN',$id);
        return $this->db->get();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('bukti_pembayaran');
        $this->db->where('ID_BUKTI_PEMBAYARAN',$id);
        return $this->db->get();
    }

    public function getByStatus($id)
    {
        if ($id) {
            $this->db->like('NO_PENDAFTARAN',$id);
        }
        $this->db->select('*');
        $this->db->from('bukti_pembayaran');
        $this->db->where('STATUS','0');
        return $this->db->get();
    }

    public function hapus($id)
    {
        $this->db->where('ID_BUKTI_PEMBAYARAN', $id);
        $this->db->delete('bukti_pembayaran');
    }

    public function update($id,$data)
    {
        $this->db->where('NO_PENDAFTARAN', $id);
        $this->db->update('bukti_pembayaran',$data);
    }
}