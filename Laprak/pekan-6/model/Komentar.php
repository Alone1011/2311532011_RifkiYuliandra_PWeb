<?php
class Komentar {
    private $conn;
    private $table_name = "komentar";

    public $id;
    public $id_artikel;
    public $nama;
    public $isi_komentar;
    public $tanggal;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Membuat komentar baru
    public function create() {
        $query = "INSERT INTO " . $this->table_name . 
                " SET id_artikel=?, nama=?, isi_komentar=?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iss", $this->id_artikel, $this->nama, $this->isi_komentar);
        
        return $stmt->execute();
    }

    // Membaca komentar berdasarkan artikel
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . 
                " WHERE id_artikel = ? ORDER BY tanggal DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id_artikel);
        $stmt->execute();
        
        return $stmt->get_result();
    }
}