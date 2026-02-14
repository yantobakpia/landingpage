<!DOCTYPE html>
<html>
<head>
    <title>Data Produk D'Orange Wash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
    body {
        background: url('https://i.imgur.com/w3JVqf9.jpeg') center center fixed;
        background-size: cover;
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
    }

    table {
        width: 100%;
        background-color: #fff;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #dee2e6;
        margin-top: 20px;
        border-radius: 10px;
        overflow: hidden;
    }

    caption.title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        background-color: rgba(0, 61, 107, 0.8);
        color: #fff;
        border-radius: 10px 10px 0 0;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    /* ... (CSS styles you've provided) ... */

    .blue-button {
        background-color: rgba(0, 61, 107, 0.8);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .blue-button:hover {
        color: rgb(16, 232, 20);
    }
    </style>
</head>
<body>
    <div class="container">
        <?php include 'navbar.php'; ?>

        <?php include_once("koneksi.php"); ?>

        <div class="table-responsive">
            <table class="table" border="1" cellspacing="0" cellpadding="10">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Track</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php $query = $conn->query('SELECT * FROM peserta'); ?>

                <?php if($query->rowCount() > 0): ?>
                    <?php 
                        $no = 1; 
                        foreach($query->fetchAll(PDO::FETCH_ASSOC) AS $row): 
                    ?>
                        <tr class="table-content">
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['nomor_hp']; ?></td>
                            <td><?php echo $row['jenis_kelamin']; ?></td>
                            <td><?php echo $row['asal']; ?></td>
                            <td><?php echo $row['ikut_seminar']; ?></td>
                            <td> 
                                <a class="edit-link" href="edit.php?<?php echo $row['nama']; ?>">Edit</a>
                                <a class="delete-link" href="delete.php?nama=<?php echo $row['nama']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php 
                        $no++; 
                        endforeach; 
                    ?>
                <?php else: ?>        
                    <tr>
                        <th colspan="6">Belum ada data user</th>
                    </tr>		
                <?php endif; ?>
            </table>
        </div>
        <br>
        <div class="text-center">
            <a href="create.php" class="blue-button">Tambah Data</a>
        </div>
    </div>
</body>
</html>
