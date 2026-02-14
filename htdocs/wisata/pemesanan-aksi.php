<?php
include 'koneksi.php';

$nama_pemesan       = $_POST['nama_pemesan'];
$nik                = $_POST['nik'];
$telepon            = $_POST['telepon'];
$lokasi             = $_POST['lokasi'];
$tanggal            = $_POST['tanggal_kunjung'];
$dewasa             = $_POST['dewasa'];
$anak               = $_POST['anak'];
$hargatiket         = $_POST['hargatiket'];
$totalharga         = $_POST['totalharga'];


if (isset($_POST['submit'])) {
    $query = "insert into pemesanan (nama_pemesan, nik, telepon, lokasi, tanggal_kunjung, dewasa, anak, hargatiket, totalharga)
    values ('$nama_pemesan', '$nik', '$telepon', '$lokasi', '$tanggal', '$dewasa', '$anak', '$hargatiket', '$totalharga')";
    mysqli_query($koneksi, $query);
} else if (isset($_POST['update'])) {
    echo "Data telah disimpan";
}

header("location:list.php");
