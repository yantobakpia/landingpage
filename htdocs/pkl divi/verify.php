<?php
// Hubungkan ke database
$conn = new mysqli("localhost", "root", "", "undangan_db.");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form (nama atau nomor hp)
$keyword = $_POST["keyword"];

// Query untuk mencari tamu berdasarkan nama atau nomor hp
$sql = "SELECT * FROM tamu WHERE nama LIKE '%$keyword%' OR nomor_hp = '$keyword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Tamu ditemukan
    $row = $result->fetch_assoc();
    $namaTamu = $row["nama"];

    // Tandai tamu sebagai "hadir" dalam database (jika diperlukan)
     $updateSql = "UPDATE tamu SET hadir = 1 WHERE nama LIKE '%$keyword%' OR nomor_hp = '$keyword'";
     if ($conn->query($updateSql) === TRUE) {
         echo "<script>
        alert('Selamat datang, $namaTamu! Kehadiran Anda telah terverifikasi.');
        window.location.href = 'user.php';
       </script>";
    } else {
        echo "Error: " . $updateSql . "<br>" . $conn->error;
     }

    // Jika Anda ingin mengarahkan pengguna ke halaman lain setelah verifikasi berhasil,
    // Anda dapat menggantikan komentar di atas dengan kode pengalihan yang sesuai.
} else {
    // Tamu tidak ditemukan
    echo "<script>
        alert('Tamu dengan nama atau nomor hp tersebut tidak ditemukan.');
        window.location.href = 'user.php'; // Ubah ini ke halaman yang sesuai
      </script>";
}

$conn->close();
?>
