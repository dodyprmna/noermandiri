<?php

class M_mata_pelajaran extends CI_Model {
	//nama tabel dan primary key
    private $table = 'mata_pelajaran';
    private $pk = 'ID_MAPEL';

	//tampilkan semua data
    public function tampilkanSemua() {
        $query=$this->db->query("SELECT *FROM mata_pelajaran WHERE ID_MAPEL!='none'");
        return $query;
    }

    public function tampilMapel() {
        $query=$this->db->query("SELECT *FROM mata_pelajaran WHERE ID_MAPEL!='EMP'");
    	return $query;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }
}