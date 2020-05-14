<?php

class M_modul extends CI_Model {
	//nama tabel dan primary key
    private $table = 'modul';
    private $pk = 'ID_MODUL';

	//tampilkan semua data
    public function tampilkanSemua(){
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getByMapel($id){
        $this->db->select('*');
        $this->db->FROM('materi_pembelajaran');
        $this->db->where('ID_MAPEL',$id);
        $this->db->order_by('ID_MODUL','DESC');
        return $this->db->get();
    }

    public function get_modul_siswa($id){
        $this->db->select('*');
        $this->db->FROM('materi_pembelajaran');
        $this->db->where('ID_MAPEL',$id);
        $this->db->where('ID_JENJANG',$this->session->userdata('ses_jenjang'));
        $this->db->order_by('ID_MODUL','DESC');
        return $this->db->get();
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    public function getByJudul($judul){
        $this->db->select('*');
        $this->db->FROM('materi_pembelajaran');
        $this->db->where('JUDUL',$judul);
        return $this->db->get();
    }

    public function hapus($id)
    {
        $this->db->where('ID_MODUL', $id);
        $this->db->delete('materi_pembelajaran');
    }
}