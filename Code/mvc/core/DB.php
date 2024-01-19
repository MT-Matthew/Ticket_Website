<?php

class Database
{
    private $host = "localhost";
    private $dbname = "ticketweb";
    private $user = "root";
    private $pass = "";
    private $conn;

    public function connect()
    {
        $dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $conn = new PDO($dns, $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn; // Trả về kết nối PDO
    }
}
