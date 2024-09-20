<?php
session_start();
require_once '../config.php';
include '../crud.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['kategori_user_id'] != 1) {
    header("Location: ../../login.php");
    exit();
}

$crud = new Crud();
$kategori_id = $_GET['kategori_id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $no_urut = $_POST['no_urut'];
    $soal_nama = $_POST['soal_nama'];
    $crud->createSurveySoal($kategori_id, $no_urut, $soal_nama);
    header("Location: kategori-add.php?kategori_id=$kategori_id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <title>Tambah Soal</title>
</head>
<body>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Tambah Soal</h1>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body table-responsive">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="no_urut">No Urut:</label>
                                <input type="number" id="no_urut" name="no_urut" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="soal_nama">Nama Soal:</label>
                                <textarea id="soal_nama" name="soal_nama" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
