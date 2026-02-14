<?php
$db = new mysqli('localhost', 'root', '', 'seminar_workshop');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$result = array();
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM peserta WHERE id = $id";
    $query = $db->query($sql);
    $result = $query->fetch_assoc();
} else {
    $sql = "SELECT * FROM peserta";
    $query = $db->query($sql);
    while($row = $query->fetch_assoc()) {
        $result[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($result);
?>
