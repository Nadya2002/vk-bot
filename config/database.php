<?php
class Database {
    private $host = "127.0.0.1";
    private $database_name = "mydb";
    private $username = "php_user";
    private $password = "admin";
    public $conn;
    public function getConnection(){
        log_msg("in get conn");
        $this->conn = null;
        try{
            log_msg("in try");
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            log_msg("Database could not be connected: " . $exception->getMessage());
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
