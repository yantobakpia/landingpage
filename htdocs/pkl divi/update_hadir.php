<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hubungkan ke database
    $conn = new mysqli("localhost", "root", "", "undangan_db.");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Perbarui status kehadiran berdasarkan ID
    $sql = "UPDATE tamu SET hadir = 1 WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Tindakan berhasil
        echo '<script>window.location.href = "admin.php";</script>';
    } else {
        // Tindakan gagal
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
