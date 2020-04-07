<?php

class M_pegawai extends CI_Model {
	//nama tabel dan primary key
    private $tabel          = 'pegawai';
    private $pkPegawai      = 'ID_PEGAWAI';

    public function tambah($data){
        $this->db->insert($this->tabel, $data);
    }

	//tampilkan semua data
    public function tampilkanSemua($limit,$start,$keyword) {
        if ($keyword) {
            $this->db->like('NAMA_PEGAWAI',$keyword);
        }
        $this->db->SELECT('*');
        $this->db->FROM('pegawai');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query;
    }

    function update($data , $id){
        $this->db->where('ID_PEGAWAI', $id);
        $this->db->update($this->tabel, $data);
    }

    public function hitung_data_pegawai(){
        $this->db->select('*');
        $this->db->from('pegawai');
        return $this->db->get()->num_rows();
    }

    // public function getPegawaiByIdMapel($kode){
    //     $mapel = $this->db->query("SELECT * FROM pegawai WHERE ID_MAPEL='$kode'");
    //     if($mapel->num_rows()>0){
    //         foreach ($mapel->result() as $data){
    //             $hasil=array(
    //             'id_mapel'      => $data->ID_MAPEL,
    //             'nama_mapel'    => $data->NAMA_MAPEL,
    //             );
    //         }
    //     }
    //     return $hasil;
    // }

    public function getTentorTersedia($waktu,$tanggal){
        $query=$this->db->query("SELECT *
                                FROM tentor t
                                JOIN mata_pelajaran mp ON t.ID_MAPEL = mp.ID_MAPEL
                                WHERE t.ID_TENTOR not in (SELECT j.ID_TENTOR FROM jadwal_les j
                                WHERE j.ID_WAKTU = '$waktu' and j.TANGGAL = '$tanggal')");
        return $query;
    }
}