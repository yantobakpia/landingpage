<?php
// Mulai sesi
session_start();

// Cek jika pengguna sudah masuk, arahkan ke halaman utama jika sudah masuk
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Sambungan ke database (menggunakan host, username, dan password yang sesuai)
$host = "localhost";
$username = "root";
$password = "";
$database = "manajemen_keuangan_db";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Inisialisasi variabel error
$username_error = $password_error = "";
$success_message = "";

// Proses pendaftaran jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dimasukkan oleh pengguna
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Validasi input
    if (empty($input_username)) {
        $username_error = "Username harus diisi.";
    }

    if (empty($input_password)) {
        $password_error = "Password harus diisi.";
    }

    // Jika tidak ada error validasi, lanjutkan dengan pendaftaran
    if (empty($username_error) && empty($password_error)) {
        // Hash kata sandi sebelum menyimpannya di database
        $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

        // Query untuk memasukkan data pengguna baru ke dalam database
        $query = "INSERT INTO users (username, password) VALUES ('$input_username', '$hashed_password')";
        if ($conn->query($query) === TRUE) {
            $success_message = "Pendaftaran berhasil. Silakan login.";
        } else {
            $username_error = "Username sudah digunakan.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Aplikasi Manajemen Keuangan</title>
    <!-- Tambahkan tautan ke stylesheet Bootstrap dan file CSS Anda -->
</head>
<body>
    <div class="container">
        <h1>Daftar</h1>
        <?php if (!empty($success_message)) { ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
                <span class="text-danger"><?php echo $username_error; ?></span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
                <span class="text-danger"><?php echo $password_error; ?></span>
            </div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
    </div>
</body>
</html>
