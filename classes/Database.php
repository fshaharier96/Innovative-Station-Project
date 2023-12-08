<?php
$dir=dirname(dirname(__FILE__));

include_once  $dir."/config.php";

/**
 * Database create connection with  database
 *
 *@class Database
 */


class Database{
    private $server=SERVER;
    private $user=USER;
    private $password=PASSWORD;
    private $database=DATABASE;
    public $conn;
    public function __construct(){

        $this->conn=mysqli_connect($this->server,$this->user,$this->password,$this->database) or die("connection failed");
    }


}