<?php

class M_tentor extends CI_Model {
	//nama tabel dan primary key
    private $table  = 'tentor';
    private $pk     = 'ID_TENTOR';

    public function tampilkanSemua($limit,$start,$keyword){
        if ($keyword) {
            $this->db->like('NAMA_TENTOR',$keyword);
        }
        $this->db->SELECT('ID_TENTOR,NAMA_TENTOR,ALAMAT_TENTOR,TGL_LAHIR_TENTOR,NOTELP_TENTOR,EMAIL_TENTOR,STATUS_TENTOR, mp.NAMA_MAPEL');
        $this->db->FROM('tentor');
        $this->db->join('mata_pelajaran mp','mp.ID_MAPEL=tentor.ID_MAPEL');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query;
    }

    public function getTentor(){
        $this->db->SELECT('ID_TENTOR,NAMA_TENTOR,ALAMAT_TENTOR,TGL_LAHIR_TENTOR,NOTELP_TENTOR,EMAIL_TENTOR,STATUS_TENTOR, mp.NAMA_MAPEL');
        $this->db->FROM('tentor');
        $this->db->join('mata_pelajaran mp','mp.ID_MAPEL=tentor.ID_MAPEL');
        $query = $this->db->get();
        return $query;
    }

    public function hitungSemuaTentor()
    {
        $this->db->select('*');
        $this->db->from('tentor');
        return $this->db->get();
    }

    public function getTentorTersedia($waktu,$tanggal){
        $query=$this->db->query("SELECT t.ID_TENTOR, t.NAMA_TENTOR, mp.NAMA_MAPEL
                                FROM tentor t
                                JOIN mata_pelajaran mp ON t.ID_MAPEL = mp.ID_MAPEL
                                WHERE t.STATUS_TENTOR = 1 AND t.ID_TENTOR not in (SELECT j.ID_TENTOR FROM jadwal_les j
                                WHERE j.ID_SESI = '$waktu' and j.TANGGAL = '$tanggal')");
        return $query;
    }

    function update($data , $id){
        $this->db->where('ID_TENTOR', $id);
        $this->db->update($this->table, $data);
    }

}