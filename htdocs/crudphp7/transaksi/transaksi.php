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

    .edit-trn,
    .delete-trn {
        color: #000;
        text-decoration: none;
        margin-right: 10px;
    }

    .edit-trn:hover {
        color: rgba(16, 23, 232);
    }

    .delete-trn:hover {
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
    .btn {
    background-color: rgba(0, 61, 107, 0.8);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    cursor: pointer;
  }
    .btn:hover{
        color: rgb(16, 232, 20);
    }
</style>
<body>
<div class="container">
<?php
    include 'nav_trn.php';
?>
<?php include_once("connection_trn.php"); ?>  

<table border="1" cellspacing="0" cellpadding="10"> 
	<thead>
    <tr>
        <th colspan="8" class="table-title">Riwayat Transaksi</th>
    </tr>
    <tr>
        <th>Kode Transaksi</th>
        <th>kode produksi</th>
        <th>Tanggal Transaksi</th>
        <th>Operator</th>
		<th>Mulai Cuci</th>
		<th>Selesai Cuci</th>
		<th>Penyelesaian Job</th>
        <th>Action</th>
    </tr>
    </thead>
    <?php $query = $conn->query('SELECT * FROM t_trans'); ?>

    <?php if($query->rowCount() > 0): ?>
        <?php 
            $no = 1; 
            foreach($query->fetchAll(PDO::FETCH_ASSOC) AS $row): 
        ?>  
            <tr class="table-content">
                <td> <?php echo $row['kodetrn']; ?> </td>
                <td> <?php echo $row['kodeprd']; ?> </td>
                <td> <?php echo $row['tgltrn'];  ?> </td>
				<td> <?php echo $row['oprcuci']; ?> </td>
                <td> <?php echo $row['mulai_cuci']; ?> </td>
				<td> <?php echo $row['akhir_cuci']; ?> </td>
                <td> <?php echo $row['numberjob'];  ?> </td>
                <td> 
                <a class="edit-trn" href="edit_trn.php?kodetrn=<?php echo $row['kodetrn']; ?>">Edit</a>
                <a class="delete-trn" onclick="konfirmasiHapus()">Delete</a>
                            <script>
  function konfirmasiHapus() {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      // Aksi jika pengguna menekan tombol "OK"
      window.location.href="delete_trn.php?kodetrn=<?php echo $row['kodetrn']; ?>"; // Ganti "hapus_data.php" dengan URL atau skrip PHP yang menghapus data
    } else {
      // Aksi jika pengguna menekan tombol "Batal"
      // Tidak ada tindakan yang diambil
    }
  }
</script>
                </td>
            </tr>
        <?php 
            $no++; 
            endforeach; 
        ?>
    <?php else: ?>        
        <tr>
            <th colspan="8">Belum ada data produk</th>
        </tr>		
    <?php endif; ?>

</table><br>
<a href="create_trn.php" class="btn">Tambah Transaksi</a>
</button></a>
    </div>
    </body>
<tfoot>

</tfoot>