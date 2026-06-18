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

$total_peminjaman = mysqli_num_rows(
    mysqli_query($conn,"SELECT * FROM peminjaman")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h1>👋 Dashboard Admin</h1>
    <p class="subtitle">Kelola peminjaman ruangan kampus</p>

    <div class="admin-stats">
        <div class="admin-stat-card">
            <div class="admin-stat-icon">🏛️</div>
            <div class="admin-stat-number"><?= $ruangan ?></div>
            <div class="admin-stat-label">Total Ruangan</div>
        </div>
        <div class="admin-stat-card" style="border-color: rgba(239, 68, 68, 0.15);">
            <div class="admin-stat-icon">⏳</div>
            <div class="admin-stat-number" style="color: #d97706;"><?= $peminjaman ?></div>
            <div class="admin-stat-label">Pengajuan Menunggu</div>
        </div>
        <div class="admin-stat-card" style="border-color: rgba(34, 197, 94, 0.15);">
            <div class="admin-stat-icon">📋</div>
            <div class="admin-stat-number" style="color: #16a34a;"><?= $total_peminjaman ?></div>
            <div class="admin-stat-label">Total Peminjaman</div>
        </div>
    </div>

    <hr>

    <div class="admin-nav">
        <a href="ruangan.php" class="btn">🏛️ Kelola Ruangan</a>
        <a href="daftar_peminjaman.php" class="btn">📋 Kelola Peminjaman</a>
        <a href="logout.php" class="btn btn-logout btn-sm">🚪 Logout</a>
    </div>
</div>

<script src="../assets/script.js"></script>
</body>
</html>