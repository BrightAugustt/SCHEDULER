<?php
require_once("db_conn.php");
class Database{
    public $db = null;
    public $results = null;

    public function db_connect(){
        $this->db = mysqli_connect(SNAME, UNAME, PASSWORD, DATABASE);

        if(!$this->db){
            return false;
        }else if($this->db == null){
            return false;
        }else{
            return true;
        }
    }

    public function db_query($sql){
        if($this->db == null){
            return false;
        }
        if(!$this->db){
            return false;
        }

        $this->results = mysqli_query($this->db, $sql);

        if($this->results == false){
            return false;
        }
        return true;

    }

    public function db_fetch(){
        if($this->results == null){
            return false;
        }
        elseif ($this->results == false){
            return false;
        }
        return mysqli_fetch_all($this->results, MYSQLI_ASSOC);
    }
}

?>