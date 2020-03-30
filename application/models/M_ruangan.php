<?php

class M_ruangan extends CI_Model {
	//nama tabel dan primary key
    private $table = 'ruangan';
    private $pk = 'ID_RUANGAN';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    public function getRuanganTersedia($waktu,$tanggal){
        $query=$this->db->query("SELECT r.ID_RUANGAN, r.NAMA_RUANGAN
                                FROM ruangan r
                                WHERE r.ID_RUANGAN not in (SELECT j.ID_RUANGAN FROM jadwal_les j
                                WHERE j.ID_WAKTU = '$waktu' and j.TANGGAL = '$tanggal')");
        return $query;
    }
}