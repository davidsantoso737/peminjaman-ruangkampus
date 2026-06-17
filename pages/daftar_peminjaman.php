<?php

include '../config/koneksi.php';

$data = mysqli_query($conn,"
SELECT
p.*,
r.nama_ruangan

FROM peminjaman p

JOIN ruangan r
ON p.id_ruangan = r.id_ruangan
");

?>

<!DOCTYPE html>
<html>
<head>
<title>Daftar Peminjaman</title>
</head>
<body>

<h2>Daftar Peminjaman</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Nama</th>
    <th>NIM</th>
    <th>Organisasi</th>
    <th>Ruangan</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>
    <td><?= $row['nama_peminjam']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['organisasi']; ?></td>
    <td><?= $row['nama_ruangan']; ?></td>
    <td><?= $row['tanggal_pinjam']; ?></td>
    <td><?= $row['status']; ?></td>

    <td>

        <a href="../process/setujui.php?id=<?= $row['id_peminjaman']; ?>">
            Setujui
        </a>

        |

        <a href="../process/tolak.php?id=<?= $row['id_peminjaman']; ?>">
            Tolak
        </a>

        |

        <a href="../process/hapus_peminjaman.php?id=<?= $row['id_peminjaman']; ?>">
            Hapus
        </a>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>