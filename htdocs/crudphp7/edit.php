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
    include 'nav.php';
?><br>
<?php 

    include_once("connection.php");

    $statement = $conn->prepare('SELECT * FROM t_prod WHERE kodeprd=:kodeprd ');
    $statement->execute([
        'kodeprd' => $_GET['kodeprd']
    ]);
    
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
?>
<form action="update.php?kodeprd=<?php echo $_GET['kodeprd']; ?>" method="post">
    <input type="text" name="kodeprd" placeholder="Kode Produk" value="<?php echo $user['kodeprd']; ?>"> <br/>
    <input type="text" name="namaprd" placeholder="Nama Produk" value="<?php echo $user['namaprd']; ?>"> <br/>
    <input type="text" name="hargaprd" placeholder="Harga Jasa" value="<?php echo $user['hargaprd']; ?>"> <br/>
    <input type="text" name="keterangan" placeholder="Keterangan" value="<?php echo $user['keterangan']; ?>"> <br/>
    <button>Update</button>
</form>
</div>
</body