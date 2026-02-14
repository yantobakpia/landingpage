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
<?php 
    include_once("connection_trn.php");

    $statement = $conn->prepare('SELECT * FROM t_trans WHERE kodetrn=:kodetrn ');
    $statement->execute([
        'kodetrn' => $_GET['kodetrn']
    ]);
    
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
?>
<form action="update_trn.php?kodetrn=<?php echo $_GET['kodetrn']; ?>" method="post">

    <input type="text" name="kodetrn" placeholder="Kode Transaksi"    value="<?php echo $user['kodetrn']; ?>"> <br/>
    <input type="text" name="kodeprd" placeholder="Kode Produk"       value="<?php echo $user['kodeprd']; ?>"> <br/>
    <input type="DATE" name="tgltrn"  placeholder="Tanggal transaksi" value="<?php echo $user['tgltrn']; ?>"> <br/><br>
    <input type="text" name="oprcuci" placeholder="operator"          value="<?php echo $user['oprcuci']; ?>"> <br/>
	<input type="TIME" name="mulai_cuci" placeholder="mulai cuci"     value="<?php echo $user['mulai_cuci']; ?>"> <br/><br>
	<input type="TIME" name="akhir_cuci" placeholder="selesai cuci"   value="<?php echo $user['akhir_cuci']; ?>"> <br/><br>
	<input type="text" name="numberjob"  placeholder="Pekerjaan ke-"  value="<?php echo $user['numberjob']; ?>"> <br/>
    <button>Update</button>
</form>
        </div>
    </body>
</html>