<?php
if (isset($_GET['keyword'])) {
    // Ambil kata kunci pencarian dari input form
    $keyword = $_GET['keyword'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "undangan_db.");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Kueri SQL untuk mencari data berdasarkan nama atau barcode
    $sql = "SELECT * FROM tamu WHERE nama LIKE '%$keyword%' OR nomor_hp LIKE '%$keyword%'";
    $result = $conn->query($sql);

    // Tampilkan hasil pencarian
    if ($result->num_rows > 0) {
        echo "<h2>Hasil Pencarian:</h2>";
            echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li><strong>Nama:</strong> " . $row["nama"] . ", <strong>Barcode:</strong> " . $row["nomor_hp"] . "</li>";
                            }
                             echo "</ul>";

    } else {
        echo "Tidak ada hasil yang ditemukan.";
    }

    // Tutup koneksi ke database
    $conn->close();
}
?>
