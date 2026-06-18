<?php
include '../config/koneksi.php';

$data = mysqli_query($conn,"
SELECT
    p.*,
    r.nama_ruangan
FROM peminjaman p
JOIN ruangan r ON p.id_ruangan = r.id_ruangan
ORDER BY p.id_peminjaman DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pengajuan</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="container">
    <h2>📄 Status Pengajuan Peminjaman</h2>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Organisasi</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($data)) { ?>
                <tr>
                    <td><?= $row['nama_peminjam']; ?></td>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['organisasi']; ?></td>
                    <td><?= $row['nama_ruangan']; ?></td>
                    <td><?= $row['tanggal_pinjam']; ?></td>
                    <td><?= $row['jam_mulai']; ?> - <?= $row['jam_selesai']; ?></td>
                    <td>
                        <?php
                        if($row['status'] == 'Disetujui') {
                            echo '<span class="badge badge-success">✅ Disetujui</span>';
                        } elseif($row['status'] == 'Ditolak') {
                            echo '<span class="badge badge-danger">❌ Ditolak</span>';
                        } else {
                            echo '<span class="badge badge-warning">⏳ Menunggu</span>';
                        }
                        ?>
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