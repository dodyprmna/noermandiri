<?php

class M_sesi extends CI_Model {
	//nama tabel dan primary key
    private $table = 'waktu';
    private $pk = 'ID_WAKTU';

	//tampilkan semua data
    public function getAll() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function getSelainTentor() {
        $query=$this->db->query("SELECT *
                                FROM jabatan
                                WHERE ID_JABATAN != 'TNTR'");
        return $query;
    }
}