<?php
require_once 'vendor/autoload.php'; // Sesuaikan dengan path library yang sesuai

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil username dari form
    $username = $_POST["username"];

    // Buat QR Code
    $qrCode = new Endroid\QrCode\QrCode($username);
    $qrCode->setSize(250);
    $qrCode->setMargin(10);

    // Simpan QR Code sebagai gambar
    $qrCodePath = "qrcodes/{$username}.png";
    $qrCode->writeFile($qrCodePath);

    // Simpan username dan path QR Code ke database
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "undangan_db"; // Sesuaikan dengan nama database Anda

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, qrcode) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $qrCodePath);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Tampilkan QR Code kepada pengguna
    echo "QR Code untuk username '{$username}':<br>";
    echo "<img src='{$qrCodePath}' alt='QR Code'>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
</head>
<body>
    <form action="generate_qr.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Generate QR Code</button>
    </form>
</body>
</html>
