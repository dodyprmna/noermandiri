<?php

class M_waktu extends CI_Model {
	//nama tabel dan primary key
    private $table = 'waktu';
    private $pk = 'ID_WAKTU';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }
}