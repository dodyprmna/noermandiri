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

    public function getById($id)
    {
       $this->db->where('NO_INDUK',$id);
        return $this->db->get('siswa')->row();
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

    public function getSiswaByKelas($id)
    {
        $this->db->SELECT('*');
        $this->db->FROM('siswa s'); 
        $this->db->join('kelas k','s.ID_KELAS = k.ID_KELAS');
        $this->db->where('s.ID_KELAS',$id);
        $this->db->where('s.STATUS_SISWA','1');
        $query = $this->db->get();
        return $query;
    }

    public function siswa_aktif()
    {
        $this->db->SELECT('*');
        $this->db->FROM('siswa');
        $this->db->where('STATUS_SISWA','1');
        $query = $this->db->get();
        return $query;
    }
}