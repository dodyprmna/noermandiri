<?php
class M_login extends CI_Model{
    //cek id pegawai dan password pegawai
    public function auth_pegawai($username,$password){
        $query=$this->db->query("SELECT*FROM pegawai WHERE ID_PEGAWAI='$username' AND PASSWORD_PEGAWAI=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek no_induk dan password siswa
    public function auth_siswa($username,$password){
        $query=$this->db->query("SELECT*FROM siswa WHERE NOINDUK='$username' AND PASSWORD_SISWA=MD5('$password') LIMIT 1");
        return $query;
    }
}
?>