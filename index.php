<?php
include 'config/koneksi.php';

$ruangan = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM ruangan")
);

$dipinjam = mysqli_num_rows(
    mysqli_query($conn,"
    SELECT DISTINCT id_ruangan
    FROM peminjaman
    WHERE status = 'Disetujui'
    AND tanggal_pinjam = CURDATE()
")
);

$kosong = $ruangan - $dipinjam;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard User</title>
</head>
<body>

<h1>Sistem Peminjaman Ruangan Kampus</h1>

<hr>

<h3>Informasi Ruangan Hari Ini</h3>

<p>Total Ruangan : <?= $ruangan; ?></p>

<p>
🔴 Ruangan Dipinjam :
<?= $dipinjam; ?>
</p>

<p>
🟢 Ruangan Kosong :
<?= $kosong; ?>
</p>

<hr>

<h3>Menu Pengguna</h3>

<a href="pages/ruangan.php">
Lihat Daftar Ruangan
</a>

<br><br>

<a href="pages/tambah_peminjaman.php">
Ajukan Peminjaman
</a>

<br><br>

<a href="pages/status_peminjaman.php">
Lihat Status Pengajuan
</a>
<hr>

<a href="admin/login.php">
🔐 Login Admin
</a>

</body>
</html>