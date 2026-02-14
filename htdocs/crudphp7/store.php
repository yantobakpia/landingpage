<?php

    include_once('connection.php');
    $kodeprd = $_POST['kodeprd'];
    $namaprd = $_POST['namaprd'];
    $hargaprd = $_POST['hargaprd'];
    $keterangan = $_POST['keterangan'];

    $statement = $conn->prepare('INSERT INTO t_prod (kodeprd, namaprd, hargaprd, keterangan)
                                            VALUES (:kodeprd, :namaprd, :hargaprd, :keterangan)');
                                
    $statement->execute([
        'kodeprd' => $kodeprd,
		'namaprd' => $namaprd,
        'hargaprd' => $hargaprd,
        'keterangan' => $keterangan,
    ]);

    header('location: landing.php');