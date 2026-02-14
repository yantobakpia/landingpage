<?php
$db = new mysqli('localhost', 'root', '', 'seminar_workshop');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nomor_hp = $_POST['nomor_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $asal = $_POST['asal'];
    $ikut_seminar = isset($_POST['ikut_seminar']) ? 1 : 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE peserta SET nama = '$nama', nomor_hp = '$nomor_hp', jenis_kelamin = '$jenis_kelamin', asal = '$asal', ikut_seminar = $ikut_seminar WHERE id = $id";
    } else {
        $sql = "INSERT INTO peserta (nama, nomor_hp, jenis_kelamin, asal, ikut_seminar) VALUES ('$nama', '$nomor_hp', '$jenis_kelamin', '$asal', $ikut_seminar)";
    }

    if ($db->query($sql) === TRUE) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
    $id = $_GET['id'];
    $sql = "DELETE FROM peserta WHERE id = $id";

    if ($db->query($sql) === TRUE) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false);
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
