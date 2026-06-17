<?php
include '../config/cek_login.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Ruangan</title>
</head>
<body>

<h2>Tambah Ruangan</h2>

<form action="../process/simpan_ruangan.php" method="POST">

Nama Ruangan
<br>
<input type="text" name="nama_ruangan" required>

<br><br>

Kapasitas
<br>
<input type="number" name="kapasitas" required>

<br><br>

Lokasi
<br>
<input type="text" name="lokasi" required>

<br><br>

Keterangan
<br>
<textarea name="keterangan"></textarea>

<br><br>

<button type="submit">
Simpan
</button>

</form>

<a href="ruangan.php">
Batal
</a>

</body>
</html>