<?php
    include_once('connection_trn.php');
    $kodetrn    = $_POST['kodetrn'];
    $kodeprd    = $_POST['kodeprd'];
    $tgltrn     = $_POST['tgltrn'];
    $oprcuci    = $_POST['oprcuci'];
	$mulai_cuci = $_POST['mulai_cuci'];
    $akhir_cuci = $_POST['akhir_cuci'];
    $numberjob  = $_POST['numberjob'];
    $statement = $conn->prepare('UPDATE t_trans SET kodetrn=:kodetrn, 
	                                            kodeprd=:kodeprd,
                                                tgltrn=:tgltrn,
                                                oprcuci=:oprcuci,
												mulai_cuci=:mulai_cuci,
												akhir_cuci=:akhir_cuci,
												numberjob=:numberjob
                                                WHERE kodetrn=:kodetrn');                            
    $statement->execute([
        'kodetrn'    => $kodetrn,
		'kodeprd'    => $kodeprd,
        'tgltrn'     => $tgltrn,
        'oprcuci'    => $oprcuci,
        'mulai_cuci' => $mulai_cuci,
		'akhir_cuci' => $akhir_cuci,
        'numberjob'  => $numberjob
    ]);
    header('location: transaksi.php');