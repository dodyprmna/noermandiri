<?php
    class M_login extends CI_Model{
        //cek id pegawai dan password pegawai
        public function auth_pegawai($username,$password){
            $query=$this->db->query("SELECT*FROM pegawai WHERE ID_PEGAWAI='$username' AND PASSWORD_PEGAWAI=MD5('$password') LIMIT 1");
            return $query;
        }

        //cek no_induk dan password siswa
        public function auth_siswa($username,$password){
            $query=$this->db->query("SELECT * FROM siswa s join kelas k on s.ID_KELAS = k.ID_KELAS WHERE s.NO_INDUK='$username' AND s.PASSWORD_SISWA=MD5('$password') LIMIT 1");
            return $query;
        }

        //cek no_induk dan password tentor
        public function auth_tentor($username,$password){
            $query=$this->db->query("SELECT * FROM tentor WHERE ID_TENTOR='$username' AND PASSWORD_TENTOR=MD5('$password') LIMIT 1");
            return $query;
        }

        public function auth_pendaftar($username,$password)
        {
            $query=$this->db->query("SELECT * FROM pendaftaran_siswa_baru WHERE EMAIL_PENDAFTAR = '$username' AND PASSWORD_PENDAFTAR = MD5('$password') LIMIT 1");
            return $query;
        }

    }
?>