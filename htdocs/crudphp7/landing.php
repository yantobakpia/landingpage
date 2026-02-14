<!DOCTYPE html>
<html>
<head>
    <title>Data Produk D'Orange Wash</title>
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

    th {
        background-color: rgba(0, 61, 107, 0.8);
        color: #fff;
    }

    th:first-child,
    td:first-child {
        width: 15%;
    }

    th:last-child,
    td:last-child {
        width: 15%;
    }

    .edit-link,
    .delete-link {
        color: #000;
        text-decoration: none;
        margin-right: 10px;
    }

    .edit-link:hover {
        color: rgba(16, 23, 232);
    }

    .delete-link:hover {
        color: rgba(255, 0, 0);
    }

    tfoot th {
        text-align: right;
        font-style: italic;
        padding-top: 20px;
    }

    .table-title {
        text-align: center;
        margin-bottom: 20px;
    }

    .table-content {
        background-color: rgba(255, 255, 255); 
        color: #333;
    }

    .table-content:hover {
        background-color: #d1d1d1;
    }
    .blue-button {
    background-color: rgba(0, 61, 107, 0.8);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    cursor: pointer;
  }
    .blue-button:hover{
        color: rgb(16, 232, 20);
    }
</style>

</head>
<body>
    <div class="container">
        <?php include 'nav.php'; ?>

        <?php include_once("connection.php"); ?>

        <table border="1" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th colspan="5" class="table-title">Data Produk D'Orange Wash</th>
                </tr>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga Jasa</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php $query = $conn->query('SELECT * FROM t_prod'); ?>

            <?php if($query->rowCount() > 0): ?>
                <?php 
                    $no = 1; 
                    foreach($query->fetchAll(PDO::FETCH_ASSOC) AS $row): 
                ?>
                    <tr class="table-content">
                        <td><?php echo $row['kodeprd']; ?></td>
                        <td><?php echo $row['namaprd']; ?></td>
                        <td><?php echo $row['hargaprd']; ?></td>
                        <td><?php echo $row['keterangan']; ?></td>
                        <td> 
                            <a class="edit-link" href="edit.php?kodeprd=<?php echo $row['kodeprd']; ?>">Edit</a>
                            <a class="delete-link" href="delete.php?kodeprd=<?php echo $row['kodeprd']; ?>">Delete</a>
                        </td>

                    </tr>
                <?php 
                    $no++; 
                    endforeach; 
                ?>
            <?php else: ?>        
                <tr>
                    <th colspan="5">Belum ada data user</th>
                </tr>		
            <?php endif; ?>
        </table>
<br>
        <tfoot>
        <a href="create.php" class="blue-button">Tambah Data</a>
        </tfoot>
    </div>
</body>
</html>


