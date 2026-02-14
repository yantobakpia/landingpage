<?php
include 'config.php';
session_start();
include "authcheckkasir.php";


$bayar = preg_replace('/\D/', '', $_POST['bayar']);
$bayar = (int) $bayar;

$tanggal_waktu = date('Y-m-d H:i:s');
$nomor = rand(111111, 999999);
$total = $_POST['total'];
$total = (int) $total;
$nama = $_SESSION['nama'];
$kembali = $bayar - $total;

mysqli_query($dbconnect, "INSERT INTO transaksi (id_transaksi, tanggal_waktu, nomor, total, nama, bayar, kembali) VALUES (NULL, '$tanggal_waktu', '$nomor', '$total', '$nama', '$bayar', '$kembali')");

$id_transaksi = mysqli_insert_id($dbconnect);


foreach ($_SESSION['cart'] as $key => $value) {
    if (isset($value['id']) && isset($value['diskon'])) {
        $id_barang = $value['id'];
        $harga = $value['harga'];
        $qty = $value['qty'];
        $tot = $harga * $qty;

       
        $result = mysqli_query($dbconnect, "SELECT * FROM barang WHERE id_barang = '$id_barang'");
        
        if (mysqli_num_rows($result) > 0) {
            
            mysqli_query($dbconnect, "INSERT INTO transaksi_detail (id_transaksi_detail, id_transaksi, id_barang, harga, qty, total) VALUES (NULL, '$id_transaksi', '$id_barang', '$harga', '$qty', '$tot')");
            
            
            mysqli_query($dbconnect, "UPDATE barang SET jumlah = jumlah - '$qty' WHERE id_barang = '$id_barang'");
        } else {
            echo "Barang dengan ID $id_barang tidak ditemukan.";
            
        }
    } else {
        echo "Kunci 'id' atau 'diskon' tidak ditemukan dalam array.";
      
    }
}


$_SESSION['cart'] = [];


header("location:kasir.php?kembalian=$kembali");
?>
