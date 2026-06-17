<?php

include '../config/cek_login.php';
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
<html>
<head>
<title>Kelola Ruangan</title>
</head>
<body>

<h2>Kelola Ruangan</h2>

<a href="tambah_ruangan.php">
➕ Tambah Ruangan
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Nama Ruangan</th>
    <th>Kapasitas</th>
    <th>Lokasi</th>
    <th>Status</th>
    <th>Aksi</th>
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

    <td>

        <?php

        if($row['status_ruangan']=='Dipinjam'){
            echo "🔴 Dipinjam";
        }else{
            echo "🟢 Kosong";
        }

        ?>

    </td>

    <td>

        <a href="edit_ruangan.php?id=<?= $row['id_ruangan']; ?>">
            Edit
        </a>

        |

        <a href="../process/hapus_ruangan.php?id=<?= $row['id_ruangan']; ?>"
        onclick="return confirm('Yakin hapus?')">
            Hapus
        </a>

    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">
Kembali Dashboard
</a>

</body>
</html>