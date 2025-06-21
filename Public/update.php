<?php
require_once '../config/Database.php';
require_once '../classes/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();

$mahasiswa = new Mahasiswa($db);
$mahasiswa->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID tidak ditemukan.');
$data = $mahasiswa->readOne();

if (!$data) {
    die('ERROR: Data tidak ditemukan.');
}

if ($_POST) {
    $mahasiswa->nama = $_POST['nama'];
    $mahasiswa->nisn = $_POST['nisn'];
    $mahasiswa->jurusan = $_POST['jurusan'];

    if ($mahasiswa->update()) {
        echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Mahasiswa</h1>
        <form method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
                <div class="invalid-feedback">
                    Mohon isi nama.
                </div>
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN:</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= isset($data['nisn']) ? htmlspecialchars($data['nisn']) : '' ?>" required>
                <div class="invalid-feedback">
                    Mohon isi NISN.
                </div>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= htmlspecialchars($data['jurusan']) ?>" required>
                <div class="invalid-feedback">
                    Mohon isi jurusan.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary ms-2">Kembali ke Data</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
</body>
</html>
