<?php

include '../config/koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$organisasi = $_POST['organisasi'];
$ruangan = $_POST['ruangan'];
$tanggal = $_POST['tanggal'];
$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];
$keperluan = $_POST['keperluan'];

mysqli_query($conn,"
INSERT INTO peminjaman
(
nama_peminjam,
nim,
organisasi,
id_ruangan,
tanggal_pinjam,
jam_mulai,
jam_selesai,
keperluan
)

VALUES
(
'$nama',
'$nim',
'$organisasi',
'$ruangan',
'$tanggal',
'$mulai',
'$selesai',
'$keperluan'
)
");

header("Location: ../pages/daftar_peminjaman.php");
exit;
?>