<?php

class M_Jenjang_Kelas extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jenjang_kelas';
    private $pk = 'ID_JENJANG';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    public function getBiaya($id){
        $query=$this->db->query("SELECT BIAYA
                                FROM jenjang_kelas
                                WHERE ID_JENJANG= '$id'");
        return $query;
    }
}