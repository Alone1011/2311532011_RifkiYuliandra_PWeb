<?php
class Database {
    private $host = "localhost";
    private $db_name = "u666867719_2011"; // Sesuaikan dengan nama database Anda
    private $username = "u666867719_Rifki";
    private $password = "#Hosting785#";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli(
                $this->host, 
                $this->username, 
                $this->password, 
                $this->db_name
            );

            if($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
            
            // Set charset ke UTF-8
            $this->conn->set_charset("utf8");

        } catch(Exception $e) {
            error_log($e->getMessage()); // Log error ke file
            die("Database connection error. Please try again later.");
        }

        return $this->conn;
    }
}
?>