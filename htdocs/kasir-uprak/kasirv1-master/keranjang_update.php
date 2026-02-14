<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

$qty = $_POST['qty'];
$cart = $_SESSION['cart'];

// print_r($qty);

foreach ($cart as $key => $value) {
    $_SESSION['cart'][$key]['qty'] = $qty[$key];

    $idbarang = $_SESSION['cart'][$key]['id'];

    //cek jika di keranjang sudah ada barang yang masuk
    $key = array_search($idbarang, array_column($_SESSION['cart'], 'id'));
    // return var_dump($key);
    if ($key !== false) {
    
    }
}

header('location:kasir.php');
