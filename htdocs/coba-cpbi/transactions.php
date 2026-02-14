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

// Proses penambahan transaksi jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];

    // Validasi input
    $error_message = "";

    if (empty($keterangan)) {
        $error_message .= "Keterangan harus diisi. ";
    }

    if (!is_numeric($jumlah) || $jumlah <= 0) {
        $error_message .= "Jumlah harus berupa angka positif. ";
    }

    if (empty($error_message)) {
        // Masukkan transaksi ke database
        $query = "INSERT INTO transactions (user_id, keterangan, jumlah) VALUES ($user_id, '$keterangan', $jumlah)";
        if ($conn->query($query) === TRUE) {
            // Update saldo pengguna
            $saldo += $jumlah;
            $update_query = "UPDATE users SET saldo = $saldo WHERE id = $user_id";
            $conn->query($update_query);
        }
    }
}

// Ambil daftar transaksi pengguna dari database
$query = "SELECT * FROM transactions WHERE user_id = $user_id ORDER BY tanggal DESC";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Aplikasi Manajemen Keuangan</title>
    <!-- Tautan ke stylesheet Bootstrap dan file CSS Anda -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan tautan ke file CSS Anda jika ada -->
</head>
<body>
    <div class="container">
        <h1>Transaksi</h1>
        <p>Selamat datang di halaman transaksi Anda.</p>
        <h2>Saldo Anda: $<?php echo $saldo; ?></h2>

        <h3>Tambah Transaksi</h3>
        <form method="POST" action="">
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <?php if (!empty($error_message)) { ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>

        <h3>Riwayat Transaksi</h3>
        <!-- Tampilkan daftar transaksi pengguna dari database di sini -->
<table class="table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Aksi</th> <!-- Tambahkan kolom Aksi -->
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
                // Tambahkan tombol delete dengan tautan ke fungsi delete
                echo "<td><a href='transactions.php?delete_id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Belum ada transaksi.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
// Fungsi untuk menghapus transaksi
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    
    // Hapus transaksi dari database
    $delete_query = "DELETE FROM transactions WHERE id = $delete_id AND user_id = $user_id";
    if ($conn->query($delete_query) === TRUE) {
        // Update saldo pengguna (jika diperlukan)
        // $saldo -= $jumlah_transaksi;

        // Redirect kembali ke halaman transaksi
        header("Location: transactions.php");
        exit();
    } else {
        echo "Error saat menghapus transaksi: " . $conn->error;
    }
}
?>

        <p><a href="index.php">Kembali ke Dashboard</a></p>
    </div>

    <!-- Tautan ke Bootstrap JavaScript dan JavaScript kustom jika ada -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
