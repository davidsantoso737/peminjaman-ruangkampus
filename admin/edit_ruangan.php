<?php

include '../config/cek_login.php';
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
$conn,
"SELECT * FROM ruangan
WHERE id_ruangan='$id'"
);

$row = mysqli_fetch_assoc($data);
?>

<form action="../process/update_ruangan.php" method="POST">

<input
type="hidden"
name="id"
value="<?= $row['id_ruangan']; ?>"
>

Nama Ruangan
<br>
<input
type="text"
name="nama_ruangan"
value="<?= $row['nama_ruangan']; ?>"
>

<br><br>

Kapasitas
<br>
<input
type="number"
name="kapasitas"
value="<?= $row['kapasitas']; ?>"
>

<br><br>

Lokasi
<br>
<input
type="text"
name="lokasi"
value="<?= $row['lokasi']; ?>"
>

<br><br>

Keterangan
<br>

<textarea name="keterangan"><?= $row['keterangan']; ?></textarea>

<br><br>

<button type="submit">
Update
</button>

<a href="ruangan.php">
Batal
</a>

</form>