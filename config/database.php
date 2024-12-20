<?php
class Database{
    private $DB_HOST;
    private $DB_NAME;
    private $DB_USER;
    private $DB_PASSWORD;
    public $conn;

    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=$this->DB_HOST; dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            error_log("Connection error: " . $e->getMessage());
            die("Database connection failed.");
        }
        return $this->conn;
    }
}

?>