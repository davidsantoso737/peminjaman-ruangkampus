<?php
include 'config/koneksi.php';

$ruangan = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM ruangan")
);

$peminjaman = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM peminjaman")
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h1>Sistem Peminjaman Ruangan Kampus</h1>

<p>Total Ruangan : <?= $ruangan; ?></p>
<p>Total Peminjaman : <?= $peminjaman; ?></p>
<hr>

<a href="pages/ruangan.php">
Daftar Ruangan
</a>

<br><br>

<a href="pages/tambah_peminjaman.php">
Ajukan Peminjaman
</a>

<br><br>

<a href="pages/daftar_peminjaman.php">
Daftar Peminjaman
</a>
</body>
</html>