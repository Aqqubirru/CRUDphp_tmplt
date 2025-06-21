<?php
class Mahasiswa {
    private $conn;
    private $table_name = "mahasiswa";

    public $id;
    public $nama;
    public $nisn;
    public $jurusan;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT id, nama, nisn, jurusan FROM " . $this->table_name;
        return $this->conn->query($query);
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama=:nama, nisn=:nisn, jurusan=:jurusan";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":nisn", $this->nisn);
        $stmt->bindParam(":jurusan", $this->jurusan);

        return $stmt->execute();
    }

    public function readOne() {
        $query = "SELECT id, nama, nisn, jurusan FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nama=:nama, nisn=:nisn, jurusan=:jurusan WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nama', $this->nama);
        $stmt->bindParam(':nisn', $this->nisn);
        $stmt->bindParam(':jurusan', $this->jurusan);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        return $stmt->execute();
    }
}
?>
