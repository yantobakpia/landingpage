<?php
// Generate a random token
$token = bin2hex(random_bytes(8)); // You can adjust the length of the token as needed

// Hubungkan ke database
$conn = new mysqli("localhost", "root", "", "undangan_db.");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$nomor_hp = $_POST["nomor_hp"];
$waktu_input = date("Y-m-d H:i:s");

// Query untuk menambahkan data ke database
$sql = "INSERT INTO tamu (nama, alamat, nomor_hp, token, waktu_input) VALUES ('$nama', '$alamat', '$nomor_hp', '$token', '$waktu_input')";

if ($conn->query($sql) === TRUE) {
    // Data berhasil ditambahkan, arahkan ke halaman admin atau tampilkan pesan sukses
    header("Location: admin.php"); // atau tampilkan pesan sukses
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
