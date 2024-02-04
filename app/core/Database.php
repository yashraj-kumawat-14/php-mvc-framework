<?php
trait Database{
    private $servername = DBHOST;
    private $username = DBUSER;
    private $password = DBPASS;
    private $dbname = DBNAME;
    
    private function connect(){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        
        if(mysqli_connect_error()){
            return false;
        }
        else{
            return $conn;
        }
    }

    public function query_execute($query, $data = null){
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);
        if(!$result){
            $error = mysqli_error($conn);
            return $error;
        }
        else{
            return $result;
        }
    }
}