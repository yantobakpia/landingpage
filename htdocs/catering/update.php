<?php

    include_once('connection.php');

    $Tanggal = $_POST['Tanggal'];
    $Nama = $_POST['Nama'];
    $Alamat = $_POST['Alamat'];
    $Menu = $_POST['Menu'];
    $Jumlah = $_POST['Jumlah'];
    $Phone = $_POST['Phone'];
    $Status = $_POST['Status'];

    $statement = $conn->prepare('UPDATE users SET Tanggal=:Tanggal, 
	                                            Nama=:Nama,
                                                Alamat=:Alamat,
                                                Menu=:Menu,
                                                Jumlah=:Jumlah,
                                                Phone=:Phone,
                                                Status=:Status
                                                WHERE Tanggal=:Tanggal');                            
    $statement->execute([
        'Tanggal' => $Tanggal,
		'Nama' => $Nama,
        'Alamat' => $Alamat,
        'Menu' => $Menu,
        'Jumlah' => $Jumlah,
        'Phone' => $Phone,
        'Status'=> $Status,
        'Tanggal' => $Tanggal
    ]);

    header('location: db.php');