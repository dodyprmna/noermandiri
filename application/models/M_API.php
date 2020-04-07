<?php

class M_API extends CI_Model {

    public function getAll($tabel){
        return $this->db->get($tabel);
    }

    public function saveData($tabel,$data)
    {
        return $this->db->insert($tabel,$data);
    }

}