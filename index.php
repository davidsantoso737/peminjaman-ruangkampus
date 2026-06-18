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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Peminjaman Ruangan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h1>🏛️ Sistem Peminjaman Ruangan</h1>
    <p class="subtitle">Kelola peminjaman ruangan kampus dengan mudah</p>

    <hr>

    <h3>📊 Informasi Ruangan Hari Ini</h3>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number"><?= $ruangan; ?></div>
            <div class="stat-label"><span class="dot dot-purple"></span> Total Ruangan</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?= $dipinjam; ?></div>
            <div class="stat-label"><span class="dot dot-red"></span> Dipinjam</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?= $kosong; ?></div>
            <div class="stat-label"><span class="dot dot-green"></span> Kosong</div>
        </div>
    </div>

    <hr>

    <h3>📌 Menu Pengguna</h3>
    <div class="menu-grid">
        <a href="pages/ruangan.php" class="btn">📋 Lihat Daftar Ruangan</a>
        <a href="pages/tambah_peminjaman.php" class="btn">📝 Ajukan Peminjaman</a>
        <a href="pages/status_peminjaman.php" class="btn">📄 Status Pengajuan</a>
    </div>

    <hr>

    <a href="admin/login.php" class="btn btn-outline btn-sm">🔐 Login Admin</a>
</div>

<script src="assets/script.js"></script>
</body>
</html>