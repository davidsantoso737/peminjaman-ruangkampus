<?php

include '../config/koneksi.php';

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$organisasi = $_POST['organisasi'];
$ruangan = $_POST['ruangan'];
$tanggal = $_POST['tanggal'];
$mulai = $_POST['mulai'];
$selesai = $_POST['selesai'];
$keperluan = $_POST['keperluan'];


// Validasi jam selesai harus lebih besar
if($mulai >= $selesai){
    echo "
    <script>
        alert('Ruangan sudah terpakai di jam tersebut!');
        window.history.back();
    </script>
    ";
    exit;
}


// Cek bentrok jadwal
$cek = mysqli_query($conn,"
SELECT *
FROM peminjaman
WHERE id_ruangan = '$ruangan'
AND tanggal_pinjam = '$tanggal'
AND status = 'Disetujui'
AND (
        '$mulai' < jam_selesai
    AND '$selesai' > jam_mulai
)
");


// Jika ditemukan jadwal bentrok
if(mysqli_num_rows($cek) > 0){

    echo "
    <script>
        alert('Ruangan sudah dipinjam pada jadwal tersebut!');
        window.history.back();
    </script>
    ";

    exit;
}


// Simpan data jika tidak bentrok
mysqli_query($conn,"
INSERT INTO peminjaman
(
    nama_peminjam,
    nim,
    organisasi,
    id_ruangan,
    tanggal_pinjam,
    jam_mulai,
    jam_selesai,
    keperluan
)

VALUES
(
    '$nama',
    '$nim',
    '$organisasi',
    '$ruangan',
    '$tanggal',
    '$mulai',
    '$selesai',
    '$keperluan'
)
");


echo "
<script>
    alert('Peminjaman berhasil diajukan!');
    window.location='../pages/status_peminjaman.php';
</script>
";

exit;
?>