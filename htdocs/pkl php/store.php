<?php

    include_once('koneksi.php');
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal = $_POST['asal'];
    $ikut_seminar = $_POST['ikut_seminar'];

    $statement = $conn->prepare('INSERT INTO peserta (nama, nomor_hp, jenis_kelamin, asal, ikut_seminar )
                                            VALUES (:nama, :nomor_hp, :jenis_kelamin, :asal, :ikut_seminar)');
                                
    $statement->execute([
        'nama' => $nama,
		'nomor_hp' => $nomor_hp,
        'jenis_kelamin' => $jenis_kelamin,
        'asal' => $asal,
        'ikut_seminar' => $ikut_seminar,

    ]);

    header('location: landing.php');