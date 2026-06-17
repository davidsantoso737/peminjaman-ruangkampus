<?php
include '../config/koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT * FROM ruangan"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Ruangan</title>
</head>
<body>

<h2>Daftar Ruangan</h2>

<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Nama Ruangan</th>
    <th>Kapasitas</th>
    <th>Lokasi</th>
</tr>

<?php
$no=1;

while($row=mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama_ruangan']; ?></td>
    <td><?= $row['kapasitas']; ?></td>
    <td><?= $row['lokasi']; ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>