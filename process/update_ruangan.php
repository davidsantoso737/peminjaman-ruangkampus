<?php

include '../config/koneksi.php';

$id = $_POST['id'];

$nama = $_POST['nama_ruangan'];
$kapasitas = $_POST['kapasitas'];
$lokasi = $_POST['lokasi'];
$keterangan = $_POST['keterangan'];

mysqli_query($conn,"
UPDATE ruangan
SET

nama_ruangan='$nama',
kapasitas='$kapasitas',
lokasi='$lokasi',
keterangan='$keterangan'

WHERE id_ruangan='$id'
");

header("Location: ../admin/ruangan.php");