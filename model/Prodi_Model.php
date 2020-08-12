<?php

class Prodi_Model extends Config{
    public function __construct(){
        $this->db = $this->database();
        $this->tabel = "tb_prodi";
    }

    public function get() {
        $query = "SELECT * FROM $this->tabel ORDER BY kode_prodi ASC";

        $req = pg_query($this->db, $query);
        if($query){
            $response = pg_fetch_all($req);
        } 
        else {
            $response = false;
        }   
        return $response ;
    }

    function count($where=""){
        $query ="SELECT FROM $this->tabel $where";
        $result = pg_query($this->db, $query); 
        $rows = pg_num_rows($result);
        return $rows;
    }

    public function get_by($select="*", $where="") {
        $query = "SELECT $select FROM $this->tabel $where";
        $req = pg_query($this->db, $query);
        
        if($req){
            $response = pg_fetch_array($req);
        } 
        else {
            $response = "error";
        }   
        return $response ;
    }
}