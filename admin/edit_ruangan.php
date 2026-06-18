<?php
include '../config/cek_login.php';
include '../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM ruangan WHERE id_ruangan='$id'"
);

$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruangan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>✏️ Edit Ruangan</h2>
    <p class="subtitle">Update data ruangan</p>

    <form action="../process/update_ruangan.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id_ruangan']; ?>">

        <div class="form-group">
            <label>Nama Ruangan <span class="required">*</span></label>
            <input type="text" name="nama_ruangan" class="form-control" value="<?= $row['nama_ruangan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Kapasitas <span class="required">*</span></label>
            <input type="number" name="kapasitas" class="form-control" value="<?= $row['kapasitas']; ?>" required min="1">
        </div>

        <div class="form-group">
            <label>Lokasi <span class="required">*</span></label>
            <input type="text" name="lokasi" class="form-control" value="<?= $row['lokasi']; ?>" required>
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"><?= $row['keterangan']; ?></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn">💾 Update</button>
            <a href="ruangan.php" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script src="../assets/script.js"></script>
</body>
</html>