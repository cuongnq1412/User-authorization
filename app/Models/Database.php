<?php

namespace App\Models;

use mysqli;

class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    public $conn;

    public function __construct($host = 'localhost', $username = 'root', $password = '', $dbname = '600k-u')
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }







    // public function query($sql) {
    //     $this->stmt = $this->dbh->prepare($sql);
    // }
    // public function bind($param, $value, $type = null) {
    //     if (is_null($type)) {
    //         switch (true) {
    //             case is_int($value):
    //                 $type = PDO::PARAM_INT;
    //                 break;
    //             case is_bool($value):
    //                 $type = PDO::PARAM_BOOL;
    //                 break;
    //             case is_null($value):
    //                 $type = PDO::PARAM_NULL;
    //                 break;
    //             default:
    //                 $type = PDO::PARAM_STR;
    //         }
    //     }
    //     $this->stmt->bindValue($param, $value, $type);
    // }
    // public function execute() {
    //     return $this->stmt->execute();
    // }
    // public function resultSet() {
    //     $this->execute();
    //     return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    // public function single() {
    //     $this->execute();
    //     return $this->stmt->fetch(PDO::FETCH_ASSOC);
    // }
    // public function rowCount() {
    //     return $this->stmt->rowCount();
    // }
    // public function checkConnection() {
    //     try {
    //         $sql = 'SELECT 1';
    //         return true; // Kết nối thành công
    //     } catch (PDOException $e) {
    //         return false; // Kết nối thất bại
    //     }
    // }

}