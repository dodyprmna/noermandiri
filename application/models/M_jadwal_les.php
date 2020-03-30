<?php

class M_jadwal_les extends CI_Model {
	//nama tabel dan primary key
    private $table = 'jadwal_les';
    private $pk = 'ID_JADWAL';

	//tampilkan semua data les untuk admin

    public function getByBulan($periode) {
        $query=$this->db->query("SELECT *
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON k.ID_KELAS = j.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN pegawai p ON p.ID_PEGAWAI = j.ID_PEGAWAI
                                LEFT JOIN waktu w on w.ID_WAKTU = j.ID_WAKTU
                                WHERE  date_format(j.TANGGAL, '%m-%Y')= '$periode'
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function getByKelas($bulan,$kelas) {
        $query=$this->db->query("SELECT *
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON k.ID_KELAS = j.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON mp.ID_MAPEL = j.ID_MAPEL
                                LEFT JOIN ruangan r ON r.ID_RUANGAN = j.ID_RUANGAN
                                LEFT JOIN pegawai p ON p.ID_PEGAWAI = j.ID_PEGAWAI
                                LEFT JOIN waktu w on w.ID_WAKTU = j.ID_WAKTU
                                WHERE  date_format(j.TANGGAL, '%m')= '$bulan' and j.ID_KELAS = '$kelas'
                                ORDER BY j.TANGGAL ASC");
        return $query;
    }

    public function JadwalSiswa($kelas) {
        $query=$this->db->query("SELECT *
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN pegawai p ON j.ID_PEGAWAI = p.ID_PEGAWAI
                                LEFT JOIN waktu w on j.ID_WAKTU = w.ID_WAKTU
                                WHERE k.ID_KELAS='$kelas'");
        return $query;

    }    
    public function getJadwalSiswaByBulan($kelas) {
        $periode = date('m-Y');
        $query=$this->db->query("SELECT j.TANGGAL, w.WAKTU, mp.NAMA_MAPEL, r.NAMA_RUANGAN, p.NAMA_PEGAWAI
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN pegawai p ON j.ID_PEGAWAI = p.ID_PEGAWAI
                                LEFT JOIN waktu w on j.ID_WAKTU = w.ID_WAKTU
                                WHERE k.ID_KELAS='$kelas' AND date_format(j.TANGGAL, '%m-%Y')= '$periode'");
        return $query;

    }

    public function getJadwalTentorByBulan($id) {
        $periode = date('m-Y');
        $query=$this->db->query("SELECT j.TANGGAL, w.WAKTU, mp.NAMA_MAPEL, r.NAMA_RUANGAN, p.NAMA_PEGAWAI
                                FROM jadwal_les j
                                LEFT JOIN kelas k ON j.ID_KELAS = k.ID_KELAS
                                LEFT JOIN mata_pelajaran mp ON j.ID_MAPEL = mp.ID_MAPEL
                                LEFT JOIN ruangan r ON j.ID_RUANGAN = r.ID_RUANGAN
                                LEFT JOIN pegawai p ON j.ID_PEGAWAI = p.ID_PEGAWAI
                                LEFT JOIN waktu w on j.ID_WAKTU = w.ID_WAKTU
                                WHERE p.ID_PEGAWAI ='$id' AND date_format(j.TANGGAL, '%m-%Y')= '$periode'");
        return $query;

    }


    public function tambah($data){
        $this->db->insert($this->table, $data);
    }
}