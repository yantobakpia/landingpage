<?php
// Hubungkan ke database
$conn = new mysqli("localhost", "root", "", "undangan_db.");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah parameter ID tamu ada di URL
if (isset($_GET["id"])) {
    $id_tamu = $_GET["id"];

    // Query untuk menghapus data tamu berdasarkan ID
    $sql = "DELETE FROM tamu WHERE id = $id_tamu";

    if ($conn->query($sql) === TRUE) {
        // Penghapusan berhasil, arahkan kembali ke halaman admin
        header("Location: admin.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tamu tidak ditemukan.";
}

$conn->close();
?>
