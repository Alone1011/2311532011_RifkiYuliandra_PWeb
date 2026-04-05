<?php
    class Database {
        private $host = "localhost";
        private $db_name = "u666867719_2011";
        private $username = "u666867719_Rifki";
        private $password = "#Hosting785#";
        private $conn;

        public function getConnection(){
            $this->conn = null;
            try {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            } catch (Exception $e) {
                echo "Connection error: " . $e->getMessage();
            }
            return $this->conn;
        }
    }
?>