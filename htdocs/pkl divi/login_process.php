<?php
session_start();

// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "undangan_db.");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap informasi login dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari admin berdasarkan username
$sql = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $admin = $result->fetch_assoc();
    if (password_verify($password, $admin['password'])) {
        // Informasi login cocok, set session dan redirect ke halaman admin
        $_SESSION['admin_id'] = $admin['id'];
        header("Location: admin.php");
        exit();
    }
}

// Jika informasi login tidak cocok, kembalikan ke halaman login dengan pesan error
$_SESSION['login_error'] = "Username atau password salah.";
header("Location:login.php");
exit();
?>
