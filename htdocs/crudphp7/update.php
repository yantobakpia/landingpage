<?php

    include_once('connection.php');

    $kodeprd = $_POST['kodeprd'];
    $namaprd = $_POST['namaprd'];
    $hargaprd = $_POST['hargaprd'];
    $keterangan = $_POST['keterangan'];

    $statement = $conn->prepare('UPDATE t_prod SET kodeprd=:kodeprd, 
	                                            namaprd=:namaprd,
                                                hargaprd=:hargaprd,
                                                keterangan=:keterangan
                                                WHERE kodeprd=:kodeprd');                            
    $statement->execute([
        'kodeprd' => $kodeprd,
		'namaprd' => $namaprd,
        'hargaprd' => $hargaprd,
        'keterangan' => $keterangan,
        'kodeprd' => $kodeprd
    ]);

    header('location: landing.php');