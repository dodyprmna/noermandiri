<?php

class M_jadwal_les extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jadwal_les';
    private $pk = 'ID_JADWAL';

	//tampilkan semua data les untuk admin

    public function getByBulan() {
        $query=$this->db->query("SELECT j.TANGGAL, k.NAMA_KELAS, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_TENTOR, s.JAM_MULAI, s.JAM_SELESAI
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON k.ID_KELAS = j.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN tentor t ON t.ID_TENTOR = j.ID_TENTOR
                                LEFT JOIN sesi s on s.ID_SESI = j.ID_SESI
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function getByFilter($periode,$kelas) {
        $query=$this->db->query("SELECT date_format(j.TANGGAL,'%d-%m-%Y') as tanggal, k.NAMA_KELAS, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_TENTOR, CONCAT_WS(' - ',date_format(s.JAM_MULAI,'%H:%i'), date_format(s.JAM_SELESAI,'%H:%i'))as jam
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON k.ID_KELAS = j.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN tentor t ON t.ID_TENTOR = j.ID_TENTOR
                                LEFT JOIN sesi s on s.ID_SESI = j.ID_SESI
                                WHERE  date_format(j.TANGGAL, '%m-%Y')= '$periode' and j.ID_KELAS = '$kelas'
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function JadwalSiswa($kelas) {
        $query=$this->db->query("SELECT *
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN tentor t ON j.ID_TENTOR = t.ID_TENTOR
                                LEFT JOIN waktu w on j.ID_WAKTU = w.ID_WAKTU
                                WHERE k.ID_KELAS='$kelas'");
        return $query;

    }    
    public function getJadwalSiswaByBulan($kelas) {
        $periode = date('m-Y');
        $query=$this->db->query("SELECT j.TANGGAL, s.JAM_MULAI,s.JAM_SELESAI, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_TENTOR
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN tentor t ON j.ID_TENTOR = t.ID_TENTOR
                                LEFT JOIN sesi s on j.ID_SESI = s.ID_SESI
                                WHERE k.ID_KELAS='$kelas'");
        return $query;

    }

    public function getJadwalTentorByFilter($periode,$id) {
        $query=$this->db->query("SELECT date_format(j.TANGGAL,'%d-%m-%Y') as tanggal, CONCAT_WS(' - ',date_format(s.JAM_MULAI,'%H:%i'), date_format(s.JAM_SELESAI,'%H:%i'))as jam, mp.NAMA_MAPEL, r.NAMA_RUANGAN
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN sesi s on j.ID_SESI = s.ID_SESI
                                WHERE j.ID_TENTOR ='$id' AND date_format(j.TANGGAL, '%m-%Y')= '$periode'
                                ORDER BY j.TANGGAL ASC");
        return $query;

    }

    public function getJadwalSiswaByFilter($periode,$kelas) {
        $query=$this->db->query("SELECT date_format(j.TANGGAL,'%d-%m-%Y') as tanggal, mp.NAMA_MAPEL, r.NAMA_RUANGAN, t.NAMA_TENTOR, CONCAT_WS(' - ',date_format(s.JAM_MULAI,'%H:%i'), date_format(s.JAM_SELESAI,'%H:%i'))as jam
                                FROM jadwal_les j
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN tentor t ON t.ID_TENTOR = j.ID_TENTOR
                                LEFT JOIN sesi s on s.ID_SESI = j.ID_SESI
                                WHERE  date_format(j.TANGGAL, '%m-%Y')= '$periode' and j.ID_KELAS = '$kelas'
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function tambah($data){
        $this->db->insert($this->table, $data);
    }
}