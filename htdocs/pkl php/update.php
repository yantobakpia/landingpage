<?php
include_once('koneksi.php');

$nama = $_POST['nama'];
$nomor_hp = $_POST['nomor_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$asal = $_POST['asal'];
$ikut_seminar = $_POST['ikut_seminar'];

// Corrected UPDATE query syntax
$statement = $conn->prepare('UPDATE peserta SET 
                                nama=:nama,
                                nomor_hp=:nomor_hp,
                                jenis_kelamin=:jenis_kelamin,
                                asal=:asal,
                                ikut_seminar=:ikut_seminar
                                WHERE nama=:nama');                            
$statement->execute([
    'nama'          => $nama,
    'nomor_hp'      => $nomor_hp,
    'jenis_kelamin' => $jenis_kelamin,
    'asal'          => $asal,
    'ikut_seminar'  => $ikut_seminar,
    'nama'          => $nama
]);

header('location: landing.php');
?>
