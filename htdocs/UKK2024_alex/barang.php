<?php
include 'config.php';
session_start();

// Mengeksekusi query untuk mendapatkan daftar barang
$view = $dbconnect->query('SELECT * FROM barang');

// Fungsi untuk mengurangi stok barang setelah transaksi
function kurangiStokBarang($dbconnect, $id_barang, $qty) {
    $result = mysqli_query($dbconnect, "UPDATE barang SET jumlah = jumlah - $qty WHERE id_barang = $id_barang");
    return $result;
}

?>

<div class="container">
    <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') {?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>
        </div>
    <?php } $_SESSION['success'] = ''; ?>

    <h1>List Barang</h1>
    <a href="index.php?page=barang_add" class="btn btn-primary">Tambah data</a>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>ID Barang</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $view->fetch_array()) { ?>
            <tr>
                <td><?= $row['id_barang'] ?></td>
                <td><?= $row['kode_barang'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['harga'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td>
                    <a href="index.php?page=barang_edit&id=<?= $row['id_barang'] ?>">Edit</a> |
                    <a href="/page/barang_hapus.php?id=<?= $row['id_barang'] ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_barang = $value['id'];
        $qty = $value['qty'];

        kurangiStokBarang($dbconnect, $id_barang, $qty);
    }
}
?>
