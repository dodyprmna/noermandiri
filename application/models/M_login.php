<?php
class M_login extends CI_Model{
    //cek id pegawai dan password pegawai
    public function auth_pegawai($username,$password){
        $query=$this->db->query("SELECT*FROM pegawai WHERE ID_PEGAWAI='$username' AND PASSWORD_PEGAWAI=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek no_induk dan password siswa
    public function auth_siswa($username,$password){
        $query=$this->db->query("SELECT*FROM siswa WHERE NO_INDUK='$username' AND PASSWORD_SISWA=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek no_induk dan password tentor
    public function auth_tentor($username,$password){
        $query=$this->db->query("SELECT*FROM tentor WHERE ID_TENTOR='$username' AND PASSWORD_TENTOR=MD5('$password') LIMIT 1");
        return $query;
    }

}
?>