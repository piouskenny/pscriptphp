<?php

namespace Database;
require_once  __DIR__ . "/../config.php";
class connection 
{
    private $conn;
    private $host;
    private $dbname;

    private $username;

    private $password;
    
    public function __construct() {
        $this->host = HOST_NAME;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->dbname   = DB_NAME;

        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }



    public function query ($sql) {
        $result = $this->conn->query($sql);
        if(!$result) {
            die("Query failed: " . $this->conn->error);
        } else {
            return $result;
        }
    }


}