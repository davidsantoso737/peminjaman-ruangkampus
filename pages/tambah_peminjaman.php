<?php
include '../config/koneksi.php';

$ruangan = mysqli_query(
    $conn,
    "SELECT * FROM ruangan"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Form Peminjaman</title>
</head>
<body>

<h2>Form Peminjaman Ruangan</h2>

<form action="../process/simpan_peminjaman.php" method="POST">

Nama :
<br>
<input type="text" name="nama" required>

<br><br>

NIM :
<br>
<input type="text" name="nim" required>

<br><br>

Organisasi :
<br>
<input type="text" name="organisasi" required>

<br><br>

Ruangan :
<br>

<select name="ruangan">

<?php
while($r=mysqli_fetch_assoc($ruangan)){
?>

<option value="<?= $r['id_ruangan']; ?>">
<?= $r['nama_ruangan']; ?>
</option>

<?php } ?>

</select>

<br><br>

Tanggal :
<br>

<input type="date" name="tanggal" required min="<?= date('Y-m-d'); ?>">
<br><br>

Jam Mulai :
<br>
<input type="time" name="mulai" required>

<br><br>

Jam Selesai :
<br>
<input type="time" name="selesai" required>

<br><br>

Keperluan :
<br>

<textarea name="keperluan" required></textarea>

<br><br>

<button type="submit">
Ajukan Peminjaman
</button>

</form>

<a href="../index.php">
Batal
</a>

</body>
</html>