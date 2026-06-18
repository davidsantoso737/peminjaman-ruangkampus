<?php
include '../config/koneksi.php';

$data = mysqli_query(
    $conn,
    "SELECT
        r.*,
        CASE
            WHEN EXISTS (
                SELECT 1
                FROM peminjaman p
                WHERE p.id_ruangan = r.id_ruangan
                AND p.status = 'Disetujui'
                AND p.tanggal_pinjam = CURDATE()
            )
            THEN 'Dipinjam'
            ELSE 'Kosong'
        END AS status_ruangan
    FROM ruangan r"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruangan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>📋 Daftar Ruangan</h2>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while($row = mysqli_fetch_assoc($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_ruangan']; ?></td>
                    <td><?= $row['kapasitas']; ?></td>
                    <td><?= $row['lokasi']; ?></td>
                    <td>
                        <?php if($row['status_ruangan'] == 'Dipinjam') { ?>
                            <span class="badge badge-danger">🔴 Dipinjam</span>
                        <?php } else { ?>
                            <span class="badge badge-success">🟢 Kosong</span>
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="../index.php" class="back-link">← Kembali ke Dashboard</a>
</div>

<script src="../assets/script.js"></script>
</body>
</html>