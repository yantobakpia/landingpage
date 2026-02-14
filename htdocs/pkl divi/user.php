<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Undangan</title>
    <!-- Tambahkan tautan ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Verifikasi Undangan</h1>
        <form method="POST" action="verify.php">
            <div class="mb-3">
                <label for="keyword" class="form-label">Masukkan Nama atau Nomor HP:</label>
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Contoh: John Doe atau 123456789">
            </div>
            <button type="submit" class="btn btn-primary">Verifikasi</button>
        </form>
    </div>
</body>
</html>

