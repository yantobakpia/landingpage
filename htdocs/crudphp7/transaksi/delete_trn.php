<?php

    include_once('connection_trn.php');

    $kodetrn = $_GET['kodetrn'];

    $statement = $conn->prepare('DELETE FROM t_trans WHERE kodetrn=:kodetrn');                             
    $statement->execute([
        'kodetrn' => $kodetrn
    ]);

    header('location: transaksi.php');