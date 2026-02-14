<?php
include 'config.php';
session_start();
include 'authcheckkasir.php';

$qty = $_POST['qty'];
$cart = $_SESSION['cart'];



foreach ($cart as $key => $value) {
    $_SESSION['cart'][$key]['qty'] = $qty[$key];

    $idbarang = $_SESSION['cart'][$key]['id'];

  
    $key = array_search($idbarang, array_column($_SESSION['cart'], 'id'));
    
    if ($key !== false) {
    
    }
}

header('location:kasir.php');
