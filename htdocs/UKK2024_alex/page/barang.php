<?php

include 'config.php';


include 'authcheck.php';

// Mengeksekusi query untuk mendapatkan daftar barang
$view = $dbconnect->query('SELECT * FROM barang');

?>

<div class="container">
    <?php if (isset($_SESSION['success']) && $_SESSION['success'] != '') {?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>
        </div>
    <?php } $_SESSION['success'] = ''; ?>

    <h1>List Barang</h1>
    <a href="index.php?page=barang_add" class="btn btn-primary">Tambah data</a>
    <a href="/barang_cetak_barcode.php" class="btn btn-success">Cetak Barcode</a>
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
                    <a href="index.php?page=barang_edit&id=<?= $row['id_barang'] ?>"class="btn btn-success">Edit</a> |
                    <a href="/page/barang_hapus.php?id=<?= $row['id_barang'] ?>" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php
// Memeriksa apakah ada transaksi
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $id_barang = $value['id_barang'];
        $qty = $value['qty'];

        // Memanggil fungsi untuk mengurangi stok barang
        kurangiStokBarang($dbconnect, $id_barang, $qty);
    }
}
?>
