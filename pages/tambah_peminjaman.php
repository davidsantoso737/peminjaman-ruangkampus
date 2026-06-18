<?php
include '../config/koneksi.php';

$ruangan = mysqli_query($conn, "SELECT * FROM ruangan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>📝 Form Peminjaman Ruangan</h2>

    <form action="../process/simpan_peminjaman.php" method="POST">

        <div class="form-group">
            <label>Nama <span class="required">*</span></label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
            <label>NIM <span class="required">*</span></label>
            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM (minimal 8 digit)" required>
        </div>

        <div class="form-group">
            <label>Organisasi <span class="required">*</span></label>
            <input type="text" name="organisasi" class="form-control" placeholder="Nama organisasi/kegiatan" required>
        </div>

        <div class="form-group">
            <label>Ruangan <span class="required">*</span></label>
            <select name="ruangan" class="form-control" required>
                <?php while($r = mysqli_fetch_assoc($ruangan)) { ?>
                    <option value="<?= $r['id_ruangan']; ?>"><?= $r['nama_ruangan']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Tanggal <span class="required">*</span></label>
                <input type="date" name="tanggal" class="form-control" required min="<?= date('Y-m-d'); ?>">
            </div>

            <div class="form-group">
                <label>Jam Mulai <span class="required">*</span></label>
                <input type="time" name="mulai" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Jam Selesai <span class="required">*</span></label>
                <input type="time" name="selesai" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label>Keperluan <span class="required">*</span></label>
            <textarea name="keperluan" class="form-control" placeholder="Jelaskan keperluan peminjaman" required></textarea>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn">Ajukan Peminjaman</button>
            <a href="../index.php" class="btn">Batal</a>
        </div>

    </form>
</div>

<script src="../assets/script.js"></script>
</body>
</html>