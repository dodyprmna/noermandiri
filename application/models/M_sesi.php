<?php

class M_sesi extends CI_Model {
	//nama tabel dan primary key
    private $table = 'sesi';
    private $pk = 'ID_SESI';

	//tampilkan semua data
    public function tampilkanSemua() {
        $q = $this->db->order_by($this->pk);
        $q = $this->db->get($this->table);
        return $q;
    }

    public function hapus($id)
    {
    	$this->db->where('ID_SESI', $id);
		$this->db->delete('sesi');
    }

    function update($data , $id){
        $this->db->where('ID_SESI', $id);
        $this->db->update($this->table, $data);
    }
}