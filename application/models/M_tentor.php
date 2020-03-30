<?php

class M_tentor extends CI_Model {
	//nama tabel dan primary key
    private $table_pegawai  = 'pegawai';
    private $pkPegawai      = 'ID_PEGAWAI';

    public function tampilkanSemua(){

        $this->db->SELECT('ID_PEGAWAI,NAMA_PEGAWAI,ALAMAT_PEGAWAI,TGL_LAHIR_PEG,NOTELP_PEGAWAI,EMAIL,STATUS, mp.NAMA_MAPEL');
        $this->db->FROM('pegawai');
        $this->db->join('mata_pelajaran mp','mp.ID_MAPEL=pegawai.ID_MAPEL');
        $this->db->WHERE("pegawai.ID_JABATAN='TNTR'");
        $query = $this->db->get();
        return $query;
    }

}