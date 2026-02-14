<?php
// Mulai sesi
session_start();

// Cek jika pengguna sudah masuk, arahkan ke halaman utama jika iya
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Proses masuk jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Ambil data yang dimasukkan oleh pengguna
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Query untuk mencari pengguna dengan username yang cocok
    $query = "SELECT * FROM users WHERE username = '$input_username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Periksa apakah kata sandi cocok
        if (password_verify($input_password, $row['password'])) {
            // Kata sandi cocok, set sesi pengguna dan arahkan ke halaman utama
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Kata sandi salah.";
        }
    } else {
        $error_message = "Username tidak ditemukan.";
    }

    // Tutup koneksi database
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Manajemen Keuangan</title>
    <!-- Tambahkan tautan ke stylesheet Bootstrap dan file CSS Anda -->
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Masuk</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>
