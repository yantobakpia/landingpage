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
    $sql = "SELECT * FROM tamu WHERE nama LIKE '%$keyword%' OR barcode LIKE '%$keyword%'";
    $result = $conn->query($sql);

    // Tampilkan hasil pencarian
    if ($result->num_rows > 0) {
        echo "<h2>Hasil Pencarian:</h2>";
        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nama Tamu</th>";
        echo "<th>Barcode</th>";
        echo "<th>Status Kehadiran</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["barcode"] . "</td>";
            echo "<td>";
            if ($row["hadir"] == 1) {
                echo "Hadir";
            } else {
                echo "Belum Hadir";
            }
            echo "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Tidak ada hasil yang ditemukan.";
    }

    // Tutup koneksi ke database
    $conn->close();
}
?>
