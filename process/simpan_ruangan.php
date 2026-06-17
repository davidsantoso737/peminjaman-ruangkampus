<?php

include '../config/koneksi.php';

$nama = $_POST['nama_ruangan'];
$kapasitas = $_POST['kapasitas'];
$lokasi = $_POST['lokasi'];
$keterangan = $_POST['keterangan'];

mysqli_query($conn,"
INSERT INTO ruangan
(
nama_ruangan,
kapasitas,
lokasi,
keterangan
)
VALUES
(
'$nama',
'$kapasitas',
'$lokasi',
'$keterangan'
)
");

header("Location: ../admin/ruangan.php");