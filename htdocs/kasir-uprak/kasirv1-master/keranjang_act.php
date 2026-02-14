<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php';
include 'authcheckkasir.php';

if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    $qty = isset($_POST['qty']) ? intval($_POST['qty']) : 1; // Ambil jumlah barang dari form

    // Dapatkan data barang dari database berdasarkan id_barang
    $query = "SELECT * FROM barang WHERE id_barang='$id_barang'";
    $result = mysqli_query($dbconnect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Kurangi stok barang di database
        $new_qty = $row['jumlah'] - $qty;
        if ($new_qty >= 0) { // Pastikan stok tidak negatif
            mysqli_query($dbconnect, "UPDATE barang SET jumlah=$new_qty WHERE id_barang='$id_barang'");

            // Proses tambahkan barang ke keranjang seperti sebelumnya
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Check if the product is already in the cart
            $key = array_search($row['id_barang'], array_column($_SESSION['cart'], 'id_barang'));

            if ($key !== false) {
                // Increment the quantity if the product is already in the cart
                $_SESSION['cart'][$key]['qty'] += $qty;
            } else {
                // Add the product to the cart if it's not already in the cart
                $row['qty'] = $qty;
                $_SESSION['cart'][] = $row;
            }

            // Redirect kembali ke halaman kasir setelah transaksi selesai
            header('location:kasir.php');
            exit; // Pastikan tidak ada output setelah header redirect
        } else {
            // Stok tidak mencukupi
            echo "Stok barang tidak mencukupi!";
            exit;
        }
    } else {
        // Barang tidak ditemukan
        echo "Barang tidak ditemukan!";
        exit;
    }
}
?>
