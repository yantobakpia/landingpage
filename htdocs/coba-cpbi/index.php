<?php
// Mulai sesi
session_start();

// Cek jika pengguna belum masuk
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Sambungan ke database
$host = "localhost";
$username = "root"; // Ganti dengan "root"
$password = ""; // Kosongkan password

$database = "manajemen_keuangan_db"; // Ganti dengan nama database yang sudah dibuat

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

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Keuangan</title>
    <!-- Tautan ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan tautan ke file CSS Anda jika ada -->
</head>
<body>
<?php
    // Include navbar.php
    include('navbar.php');
    ?>
    <!-- Tambahkan navigasi atau header -->
    <header>
        <h1>Selamat Datang di Aplikasi Manajemen Keuangan</h1>
        <p>Sisa Saldo Anda: $<?php echo $saldo; ?></p>
    </header>

    <!-- Tambahkan konten utama di sini -->
    <main>
        <h2>Riwayat Transaksi</h2>
        <!-- Tampilkan daftar transaksi pengguna dari database di sini -->
        <!-- Tampilkan daftar transaksi pengguna dari database di sini -->
<?php
// Sambungan ke database (menggunakan host, username, dan password yang sesuai)
$host = "localhost";
$username = "root"; // Ganti dengan "root"
$password = ""; // Kosongkan password

$database = "manajemen_keuangan_db"; // Ganti dengan nama database yang sudah dibuat

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Dapatkan data pengguna yang masuk
$user_id = $_SESSION['user_id'];

// Ambil riwayat transaksi pengguna dari database
$query = "SELECT * FROM transactions WHERE user_id = $user_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Tanggal</th>';
    echo '<th>Keterangan</th>';
    echo '<th>Jumlah</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['tanggal'] . '</td>';
        echo '<td>' . $row['keterangan'] . '</td>';
        echo '<td>$' . $row['jumlah'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>Belum ada transaksi.</p>';
}

// Tutup koneksi database
$conn->close();
?>

    </main>

    <!-- Tambahkan footer -->
    <footer>
       <center> <p>&copy; 2023 Aplikasi Manajemen Keuangan</p></center> 
    </footer>

    <!-- Tautan ke Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Tambahkan tautan ke file JavaScript Anda jika ada -->
</body>
</html>
