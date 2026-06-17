<?php

include '../config/koneksi.php';

$id = $_GET['id'];

mysqli_query($conn,"
UPDATE peminjaman
SET status='Ditolak'
WHERE id_peminjaman='$id'
");

header("Location: ../admin/daftar_peminjaman.php");