<?php
require_once '../config/Database.php';
require_once '../classes/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();

$mahasiswa = new Mahasiswa($db);
$mahasiswa->id = $_GET['id'];

if ($mahasiswa->delete()) {
    echo "<script>alert('Data berhasil dihapus');window.location='index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data');window.location='index.php';</script>";
}
