<?php

class M_mata_pelajaran extends CI_Model {
	//nama tabel dan primary key
    private $table = 'mata_pelajaran';
    private $pk = 'ID_MAPEL';

	//tampilkan semua data
    public function tampilkanSemua($limit,$start) {
        $this->db->SELECT('*');
        $this->db->FROM ('mata_pelajaran');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query;
    }

    public function tampilMapel() {
        $query=$this->db->query("SELECT *FROM mata_pelajaran");
    	return $query;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    public function hitung_mapel(){
        $this->db->select('*');
        $this->db->from('mata_pelajaran');
        return $this->db->get()->num_rows();
    }
}