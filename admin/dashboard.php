<?php

include '../config/cek_login.php';
include '../config/koneksi.php';

$ruangan = mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM ruangan")
);

$peminjaman = mysqli_num_rows(
mysqli_query($conn,"
SELECT *
FROM peminjaman
WHERE status='Menunggu'
")
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard Admin</title>
</head>
<body>

<h1>Dashboard Admin</h1>

<p>Total Ruangan : <?= $ruangan ?></p>

<p>Pengajuan Menunggu : <?= $peminjaman ?></p>

<hr>

<a href="ruangan.php">
Kelola Ruangan
</a>

<br><br>

<a href="daftar_peminjaman.php">
Kelola Peminjaman
</a>

<br><br>

<a href="logout.php">
Logout
</a>

</body>
</html>