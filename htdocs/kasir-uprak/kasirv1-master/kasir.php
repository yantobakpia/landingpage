<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php';
include 'authcheckkasir.php';

$barang = mysqli_query($dbconnect, 'SELECT * FROM barang');
$sum = 0;

if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $sum += (intval($value['harga']) * intval($value['qty']));
    }
}

// Periksa apakah 'bayar' dan 'total' ada di $_POST sebelum mengaksesnya
$bayar = isset($_POST['bayar']) ? preg_replace('/\D/', '', $_POST['bayar']) : 0;
$total = isset($_POST['total']) ? $_POST['total'] : 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kasir</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Kasir</h1>
            <h2>Hai <?=$_SESSION['nama']?></h2>
            <a href="logout.php">Logout</a> |
            <a href="keranjang_reset.php">Reset Keranjang</a> |
            <a href="riwayat.php">Riwayat Transaksi</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-8">
            <!-- Form untuk menambahkan barang ke keranjang -->
            <form method="post" action="keranjang_act.php">
                <div class="form-group">
                    <label for="id_barang">Pilih Kode Barang:</label>
                    <select name="id_barang" class="form-control">
                        <?php while ($row = mysqli_fetch_assoc($barang)): ?>
                            <option value="<?= $row['id_barang'] ?>"><?= $row['kode_barang'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
            </form>
            <br>
            <!-- Form untuk update keranjang -->
            <form method="post" action="keranjang_update.php">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                    <!-- Tampilkan barang yang ada di keranjang -->
                    <?php if (isset($_SESSION['cart'])):
                        foreach ($_SESSION['cart'] as $key => $value): ?>
                            <tr>
                                <td><?= $value['nama'] ?></td>
                                <td align="right"><?= number_format($value['harga']) ?></td>
                                <td class="col-md-2">
                                    <input type="number" name="qty[<?= $key ?>]" value="<?= $value['qty'] ?>" class="form-control">
                                </td>
								<td align="right"><?= number_format(intval($value['qty']) * intval($value['harga'])) ?></td>
                                <td><a href="keranjang_hapus.php?key=<?= $key ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a></td>
                            </tr>
                        <?php endforeach;
                    endif; ?>
                </table>
                <button type="submit" class="btn btn-success">Perbaruhi</button>
            </form>
        </div>
        <div class="col-md-4">
            <!-- Form untuk menyelesaikan transaksi -->
            <h3>Total Rp. <?= number_format($sum) ?></h3>
            <form action="transaksi_act.php" method="POST">
                <input type="hidden" name="total" value="<?= $sum ?>">
                <div class="form-group">
                    <label>Bayar</label>
                    <input type="text" id="bayar" name="bayar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Selesai</button>
            </form>
            <!-- Tampilkan kembalian jika ada -->
            <?php if (isset($_GET['kembalian'])): ?>
                <div class="alert alert-success" role="alert">
                    Kembalian: <?= 'Rp. ' . number_format($_GET['kembalian']) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    // Format angka menjadi format Rupiah
    var bayar = document.getElementById('bayar');
    bayar.addEventListener('keyup', function (e) {
        bayar.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
</body>
</html>
