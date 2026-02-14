<?php
// Mulai sesi
session_start();

// Cek jika pengguna belum masuk, arahkan ke halaman login jika belum masuk
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
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

// Dapatkan data pengguna yang masuk
$user_id = $_SESSION['user_id'];

// Ambil saldo pengguna dari database
$query = "SELECT saldo FROM users WHERE id = $user_id";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $saldo = $row['saldo'];
} else {
    $saldo = 0; // Jika tidak ada data saldo ditemukan, set saldo ke 0.
}

// Ambil riwayat transaksi pengguna dari database
$query = "SELECT * FROM transactions WHERE user_id = $user_id ORDER BY tanggal DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aplikasi Manajemen Keuangan</title>
    <!-- Tautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <p>Selamat datang di dashboard Anda.</p>
        <h2>Saldo Anda: $<?php echo $saldo; ?></h2>

        <h3>Riwayat Transaksi</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "<td>" . $row['keterangan'] . "</td>";
                        echo "<td>$" . $row['jumlah'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Belum ada transaksi.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <p><a href="logout.php">Keluar</a></p>
    </div>

    <!-- Tautan ke Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
