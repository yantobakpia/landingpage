<!DOCTYPE html>
<html>
<head>
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

        form {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }
    </style>
</head>
    <body>
        <div class="container">
<?php
    include 'nav_trn.php';
?><br>
<form action="store_trn.php" method="post">
    <input type="text" name="kodetrn" placeholder="Kode Transaksi"> <br/>
    <input type="text" name="kodeprd" placeholder="Kode Produk"> <br/>
    <input type="date" name="tgltrn" placeholder="Tanggal Transaksi"> <br/><br>
    <input type="text" name="oprcuci" placeholder="Operator Cuci"> <br/>
    <input type="time" name="mulai_cuci" placeholder="Mulai cuci"> <br/><br>
    <input type="time" name="akhir_cuci" placeholder="Akhir cuci"> <br/><br>
    <input type="text" name="numberjob" placeholder="Numberjob"> <br/>
    <button>Save</button>
</form>              
        </div>
    </body>
