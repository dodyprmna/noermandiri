<?php

class M_siswa extends CI_Model {
	//nama tabel dan primary key
    private $table = 'siswa';
    private $pk = 'NO_INDUK';

	//tampilkan semua data
    public function tampilkanSemua($limit,$start,$keyword) {
        if ($keyword) {
            $this->db->like('NAMA_SISWA',$keyword);
        }
        $this->db->SELECT('*');
        $this->db->FROM('siswa');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query;
    }

    public function getByNoinduk($noinduk) {
        $query=$this->db->query("SELECT *
                                 FROM siswa
                                 WHERE NO_INDUK = '$noinduk'");
        return $query;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }

    function update($data , $id){
        $this->db->where('NO_INDUK', $id);
        $this->db->update($this->table, $data);
    }

    public function getEmail($email) {
        $query=$this->db->query("SELECT *
                                 FROM siswa
                                 WHERE EMAIL_SISWA = '$email'");
        return $query;
    }
}