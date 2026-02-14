<?php
$db = new mysqli('localhost', 'root', '', 'seminar_workshop');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

if (isset($_GET['id'])) {
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
