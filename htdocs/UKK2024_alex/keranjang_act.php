<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'config.php';
include 'authcheckkasir.php';

if (isset($_POST['id_barang'])) {
    $id_barang = $_POST['id_barang'];
    $qty = isset($_POST['qty']) ? intval($_POST['qty']) : 1;

 
    $query = "SELECT * FROM barang WHERE id_barang='$id_barang'";
    $result = mysqli_query($dbconnect, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

       
        $new_qty = $row['jumlah'] - $qty;
        if ($new_qty >= 0) { 
            mysqli_query($dbconnect, "UPDATE barang SET jumlah=$new_qty WHERE id_barang='$id_barang'");

            
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

           
            $key = array_search($row['id_barang'], array_column($_SESSION['cart'], 'id_barang'));

            if ($key !== false) {
               
                $_SESSION['cart'][$key]['qty'] += $qty;
            } else {
                
                $row['qty'] = $qty;
                $_SESSION['cart'][] = $row;
            }

           
            header('location:kasir.php');
            exit; 
        } else {
           
            echo "Stok barang tidak mencukupi!";
            exit;
        }
    } else {
      
        echo "Barang tidak ditemukan!";
        exit;
    }
}
?>
