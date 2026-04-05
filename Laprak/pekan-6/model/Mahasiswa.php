<?php
class Mahasiswa {
    private $conn;
    private $table_name = "mahasiswa";

    // Object properties
    public $id;
    public $nim;
    public $nama;
    public $jurusan;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create() {
        $query = "INSERT INTO " . $this->table_name . 
                " SET nim=?, nama=?, jurusan=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $this->nim, $this->nama, $this->jurusan);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // READ
    public function read($id = null) {
        if($id) {
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);
        } else {
            $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
            $stmt = $this->conn->prepare($query);
        }
        
        $stmt->execute();
        return $stmt->get_result();
    }

    // UPDATE
    public function update() {
        $query = "UPDATE " . $this->table_name . 
                " SET nim=?, nama=?, jurusan=? WHERE id=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssi", 
            $this->nim, 
            $this->nama, 
            $this->jurusan, 
            $this->id
        );
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // DELETE
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>