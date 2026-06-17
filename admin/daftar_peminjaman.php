<?php

include '../config/cek_login.php';
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
    <th>Mulai</th>
    <th>Selesai</th>
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
    <td><?= $row['jam_mulai']; ?></td>
    <td><?= $row['jam_selesai']; ?></td>

    <td>

    <?php

    if($row['status'] == 'Disetujui'){
        echo "<span style='color:green;font-weight:bold;'>✅ Disetujui</span>";
    }
    elseif($row['status'] == 'Ditolak'){
        echo "<span style='color:red;font-weight:bold;'>❌ Ditolak</span>";
    }
    else{
        echo "<span style='color:orange;font-weight:bold;'>⏳ Menunggu</span>";
    }

    ?>

    </td>

    <td>

    <?php if($row['status'] == 'Menunggu'){ ?>

    <a href="../process/setujui.php?id=<?= $row['id_peminjaman']; ?>">
        Setujui
    </a>

    |

    <a href="../process/tolak.php?id=<?= $row['id_peminjaman']; ?>">
        Tolak
    </a>

    |

    <?php } ?>

    <a href="../process/hapus_peminjaman.php?id=<?= $row['id_peminjaman']; ?>">
        Hapus
    </a>

    </td>
</tr>

<?php } ?>

</table>

<a href="dashboard.php">
Kembali Dashboard
</a>

</body>
</html>