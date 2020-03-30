<?php

class M_pegawai extends CI_Model {
	//nama tabel dan primary key
    private $tabel          = 'pegawai';
    private $pkPegawai      = 'ID_PEGAWAI';

    public function tambah($data){
        $this->db->insert($this->tabel, $data);
    }

	//tampilkan semua data
    public function tampilkanSemua() {
        $this->db->SELECT('*');
        $this->db->FROM('pegawai');
        $this->db->WHERE("ID_JABATAN!='TNTR'");
        $query = $this->db->get();
        return $query;
    }

    public function tampilTentor(){
        $this->db->SELECT('*');
        $this->db->FROM('pegawai');
        $this->db->join('mata_pelajaran','mata_pelajaran.ID_MAPEL=pegawai.ID_MAPEL');
        $this->db->WHERE("pegawai.ID_JABATAN='TNTR'");
        $query = $this->db->get();
        return $query;
    }

    function update($data , $id){
        $this->db->where('ID_PEGAWAI', $id);
        $this->db->update($this->tabel, $data);
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
        $query=$this->db->query("SELECT p.ID_PEGAWAI, p.NAMA_PEGAWAI, mp.NAMA_MAPEL
                                FROM pegawai p
                                JOIN mata_pelajaran mp ON p.ID_MAPEL = mp.ID_MAPEL
                                WHERE p.ID_JABATAN = 'TNTR' and p.ID_PEGAWAI not in (SELECT j.ID_PEGAWAI FROM jadwal_les j
                                WHERE j.ID_WAKTU = '$waktu' and j.TANGGAL = '$tanggal')");
        return $query;
    }
}