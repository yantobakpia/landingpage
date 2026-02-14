<?php
// Hubungkan ke database
$conn = new mysqli("localhost", "root", "", "undangan_db.");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
session_start();


// Periksa apakah pengguna sudah login
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    header("Location: login.php");
    exit;
}
// Query untuk menghitung jumlah anggota
$sqlCountAnggota = "SELECT COUNT(*) AS totalAnggota FROM tamu";
$resultCountAnggota = $conn->query($sqlCountAnggota);
$rowCountAnggota = $resultCountAnggota->fetch_assoc();

// Query untuk menghitung jumlah anggota yang sudah hadir
$sqlCountHadir = "SELECT COUNT(*) AS totalHadir FROM tamu WHERE hadir = 1";
$resultCountHadir = $conn->query($sqlCountHadir);
$rowCountHadir = $resultCountHadir->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <!-- Tambahkan tautan ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        /* Gaya dasar */
        .swal2-popup {
            background-color: #f2f5f3;
        }
        /* Gaya untuk judul alert */
        .swal2-title {
            color: #FF0000; /* Warna merah */
            font-size: 24px; /* Ukuran font */
            font-weight: bold; /* Ketebalan font */
        }
        /* Gaya untuk teks dalam alert */
        .swal2-content {
            color: #333; /* Warna teks */
            font-size: 16px; /* Ukuran font */
        }
        /* Gaya untuk tombol "Batal" */
        .swal2-cancel {
            background-color: #333; /* Warna latar belakang tombol */
            color: #FFF; /* Warna teks tombol */
        }
        /* Gaya untuk tombol "Ya, Hapus!" */
        .swal2-confirm {
            background-color: #FF0000; /* Warna latar belakang tombol */
            color: #FFF; /* Warna teks tombol */
        }
        
        /* Gaya untuk navigasi */
        .navbar {
            background-color: #f8f9fa; /* Warna latar belakang */
        }
        .navbar-brand {
            font-size: 24px; /* Ukuran font */
        }
        
        /* Gaya untuk tombol-tombol */
        .btn {
            margin-right: 10px; /* Jarak antar tombol */
        }
        
        /* Gaya untuk tabel */
        .table {
            margin-top: 20px; /* Jarak atas tabel */
        }
        
        /* Gaya untuk responsif */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 18px; /* Ukuran font lebih kecil pada layar kecil */
            }
            .btn {
                margin-right: 5px; /* Jarak antar tombol lebih kecil pada layar kecil */
            }
            .table {
                font-size: 14px; /* Ukuran font lebih kecil pada layar kecil */
            }
        }
    </style>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex" method="GET" action="">
                <input type="text" id="keyword" placeholder="Cari berdasarkan nama atau token" onkeyup="filterTabel()">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Panel Admin</h1>
        <div class="mb-3">
            <p>Jumlah Anggota: <?php echo $rowCountAnggota['totalAnggota']; ?></p>
            <p>Jumlah Anggota yang Sudah Hadir: <?php echo $rowCountHadir['totalHadir']; ?></p>
        </div>
        <a href="add_guest.php" class="btn btn-success mb-3">Tambah Tamu</a>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
        <table class="table" id="tabelTamu">
            <thead>
                <tr>
                    <th>Nomor Urutan</th>
                    <th>Nama Tamu</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Token</th>
                    <th>Status Kehadiran</th>
                    <th>Waktu Input</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop untuk menampilkan daftar tamu dari database -->
                <?php
                // Hubungkan ke database
                $conn = new mysqli("localhost", "root", "", "undangan_db.");
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Query untuk mendapatkan daftar tamu dan mengurutkannya berdasarkan nama
                $sql = "SELECT * FROM tamu ORDER BY nama ASC"; // ASC untuk mengurutkan dari A ke Z
                $result = $conn->query($sql);

                $nomorUrutan = 1; // Inisialisasi nomor urutan

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $nomorUrutan . "</td>"; // Tambahkan nomor urutan
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["alamat"] . "</td>";
                        echo "<td>" . $row["nomor_hp"] . "</td>";
                        echo "<td>" . $row["token"] . "</td>";
                        echo "<td>";
                        if ($row["hadir"] == 1) {
                            echo "Hadir";
                        } else {
                            echo "Belum Hadir";
                        }
                        echo "</td>";
                        echo "<td>" . $row["waktu_input"] . "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-danger' onclick='confirmDelete(" . $row["id"] . ")'>Hapus</button>";
                        echo "<button class='btn btn-primary' onclick='confirmHadir(" . $row["id"] . ")'>Hadir</button>";
                        echo "</td>";
                        echo "</tr>";
                        $nomorUrutan++; // Increment nomor urutan
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada tamu.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus data ini?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke delete.php jika konfirmasi di-OK
                window.location.href = "delete.php?id=" + id;
            }
        });
    }

    function confirmHadir(id) {
        Swal.fire({
            title: 'Yakin ingin mengubah status menjadi Hadir?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hadir',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Tandai tamu sebagai Hadir menggunakan URL
                window.location.href = "update_hadir.php?id=" + id;
            }
        });
    }

    function filterTabel() {
        var keyword = document.getElementById("keyword").value.toLowerCase();
        var tabel = document.getElementById("tabelTamu");
        var rows = tabel.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            var nama = rows[i].getElementsByTagName("td")[1].textContent.toLowerCase(); // Indeks kolom nama
            var nomor_hp = rows[i].getElementsByTagName("td")[3].textContent.toLowerCase(); // Indeks kolom nomor_hp

            if (nama.includes(keyword) || nomor_hp.includes(keyword)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
    </script>
</body>
</html>
