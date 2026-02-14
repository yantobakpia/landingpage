<?php

    include_once('connection_trn.php');
    $kodetrn = $_POST['kodetrn'];
    $kodeprd = $_POST['kodeprd'];
    $tgltrn = $_POST['tgltrn'];
    $oprcuci = $_POST['oprcuci'];
    $mulaicuci = $_POST['mulai_cuci'];
    $akhircuci = $_POST['akhir_cuci'];
    $numberjob = $_POST['numberjob'];

    $statement = $conn->prepare('INSERT INTO t_trans (kodetrn, kodeprd, tgltrn, oprcuci, mulai_cuci, akhir_cuci, numberjob)
                                            VALUES (:kodetrn, :kodeprd, :tgltrn, :oprcuci, :mulai_cuci, :akhir_cuci, :numberjob)');
                                
    $statement->execute([
        'kodetrn' => $kodetrn,
		'kodeprd' => $kodeprd,
        'tgltrn' => $tgltrn,
        'oprcuci' => $oprcuci,
        'mulai_cuci' => $mulaicuci,
        'akhir_cuci' => $akhircuci,
        'numberjob' => $numberjob,
    ]);

    header('location: transaksi.php');