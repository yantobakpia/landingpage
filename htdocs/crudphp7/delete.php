<?php
    include_once('connection.php');

    $kodeprd = $_GET['kodeprd'];

    $statement = $conn->prepare('DELETE FROM t_prod WHERE kodeprd=:kodeprd');                             
    $statement->execute([
        'kodeprd' => $kodeprd
    ]);
    header('Location: landing.php');
    exit();
?>
