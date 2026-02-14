<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tamu</title>
    <!-- Tambahkan tautan ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Tamu</h1>
        <form method="POST" action="add_guest_action.php" id="addForm">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Tamu:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="nomor_hp" class="form-label">Nomor HP:</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
            </div>
            <!-- Token akan dihasilkan otomatis oleh server, jadi tidak perlu input pengguna -->
            <input type="hidden" name="token" id="token" value="">
            <button type="submit" class="btn btn-primary" id="submitBtn">Tambah</button> <button onclick="confirmExit()" class="btn btn-danger">Keluar</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            // Generate a random token
            var token = generateToken();
            $("#token").val(token); // Set the generated token to the hidden input

            $("#addForm").on("submit", function (e) {
                e.preventDefault();
                var nama = $("#nama").val();
                var alamat = $("#alamat").val();
                var nomor_hp = $("#nomor_hp").val();

                if (nama === "" || alamat === "" || nomor_hp === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Belum ada data. Isi data terlebih dahulu.'
                    });
                } else {
                    Swal.fire({
                        title: 'Anda yakin ingin menambahkan data?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, tambahkan',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $("#addForm").off("submit"); // Matikan event handler agar tidak memicu dua kali
                            $("#addForm").submit(); // Kirim formulir
                        }
                    });
                }
            });
        });

        function generateToken() {
            // Generate a random token (example: 32 characters long)
            var characters = '0123456789';
            var token = '';
            var tokenLength = 8; // You can adjust the length of the token as needed
            for (var i = 0; i < tokenLength; i++) {
                var randomIndex = Math.floor(Math.random() * characters.length);
                token += characters.charAt(randomIndex);
            }
            return token;
        }

        function confirmExit() {
            Swal.fire({
                title: 'Anda yakin ingin keluar?',
                text: 'Anda akan meninggalkan halaman ini.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "admin.php";
                }
            });
        }
    </script>
</body>
</html>
