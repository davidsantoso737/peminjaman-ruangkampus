<?php
include '../config/cek_login.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruangan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>➕ Tambah Ruangan</h2>
    <p class="subtitle">Tambahkan ruangan baru ke sistem</p>

    <form action="../process/simpan_ruangan.php" method="POST">
        <div class="form-group">
            <label>Nama Ruangan <span class="required">*</span></label>
            <input type="text" name="nama_ruangan" class="form-control" placeholder="Contoh: Ruang A-101" required>
        </div>

        <div class="form-group">
            <label>Kapasitas <span class="required">*</span></label>
            <input type="number" name="kapasitas" class="form-control" placeholder="Jumlah kapasitas" required min="1">
        </div>

        <div class="form-group">
            <label>Lokasi <span class="required">*</span></label>
            <input type="text" name="lokasi" class="form-control" placeholder="Contoh: Gedung A Lantai 1" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" placeholder="Informasi tambahan tentang ruangan" rows="3"></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn">💾 Simpan</button>
            <a href="ruangan.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="../assets/script.js"></script>
</body>
</html>