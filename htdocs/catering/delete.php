<?php

    include_once('connection.php');

    $Tanggal = $_GET['Tanggal'];

    $statement = $conn->prepare('DELETE FROM users WHERE Tanggal=:Tanggal');                             
    $statement->execute([
        'Tanggal' => $Tanggal
    ]);

    header('location: db.php');