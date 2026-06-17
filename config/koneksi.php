<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "ruangkampus"
);

if(!$conn){
    die("Koneksi gagal : ".mysqli_connect_error());
}
?>