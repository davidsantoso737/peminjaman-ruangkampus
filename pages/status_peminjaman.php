<?php

include '../config/koneksi.php';

$data = mysqli_query($conn,"
SELECT
p.*,
r.nama_ruangan

FROM peminjaman p

JOIN ruangan r
ON p.id_ruangan = r.id_ruangan

ORDER BY p.id_peminjaman DESC
");

?>

<!DOCTYPE html>
<html>
<head>
<title>Status Pengajuan Peminjaman</title>
</head>
<body>

<h2>Status Pengajuan Peminjaman</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Nama</th>
    <th>NIM</th>
    <th>Organisasi</th>
    <th>Ruangan</th>
    <th>Tanggal</th>
    <th>Jam</th>
    <th>Status</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)){ ?>

<tr>

    <td><?= $row['nama_peminjam']; ?></td>

    <td><?= $row['nim']; ?></td>

    <td><?= $row['organisasi']; ?></td>

    <td><?= $row['nama_ruangan']; ?></td>

    <td><?= $row['tanggal_pinjam']; ?></td>

    <td>
        <?= $row['jam_mulai']; ?>
        -
        <?= $row['jam_selesai']; ?>
    </td>

    <td>

    <?php

    if($row['status'] == 'Disetujui'){

        echo "<span style='color:green;font-weight:bold;'>
        ✅ Disetujui
        </span>";

    }
    elseif($row['status'] == 'Ditolak'){

        echo "<span style='color:red;font-weight:bold;'>
        ❌ Ditolak
        </span>";

    }
    else{

        echo "<span style='color:orange;font-weight:bold;'>
        ⏳ Menunggu
        </span>";

    }

    ?>

    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="../index.php">
Kembali ke Dashboard
</a>

</body>
</html>