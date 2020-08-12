<?php
class Mahasiswa_Model extends Config{
    public function __construct(){
        $this->db = $this->database();
        $this->tabel = "tb_mahasiswa";
    }

    public function get() {
        $query = "SELECT * FROM $this->tabel ORDER BY tahun_masuk DESC";

        $req = pg_query($this->db, $query);
        if($req){
            $response = pg_fetch_all($req);
        } 
        else {
            $response = null;
        }   
        return $response ;
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

    public function create($data){
        $query = pg_insert($this->db, $this->tabel , $data);
        $response = false;
	    if ($query) {
	      $response = true;
        } 
        else {
	      echo pg_last_error($this->db) . " <br />";
	      $response = false;	
        }

        return $response;
    }

    public function update($data, $where){
        $res = pg_update($this->db, $this->tabel, $data, $where);
        if ($res) {
            $status = true;
        } 
        else {
            $status = false;
        }
        return $status;
    }

    function count($where=""){
        $query ="SELECT FROM $this->tabel $where";
        $result = pg_query($this->db, $query); 
        $rows = pg_num_rows($result);
        return $rows;
    }
    
    public function print($select="*", $where="") {
        $query = "SELECT $select FROM $this->tabel $where";
        $req = pg_query($this->db, $query);
        
        if($req){
            $response = pg_fetch_all($req);
        } 
        else {
            $response = null;
        }   
        return $response ;
    }

    public function delete($query){
        $query = pg_delete($this->db, $this->tabel, $query);    
        if($query){
          $response = true;
        } 
        else {
          $response = false;
        }   
        return $response ;
    }
}