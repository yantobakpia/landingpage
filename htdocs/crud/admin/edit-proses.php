<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Responsive</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>
<body>
<?php 
        session_start();
        if($_SESSION['status']!="login"){
            header("location:../index.php?pesan=belum_login");
        }
    ?>
  <div class="wrapper">
    <nav>
      <div class="container-flex">
        <div class="brand">
            <a href="data.php">Selamat datang, <?php echo $_SESSION['username']; ?></a>
         </div>
         <div class="burger">
            <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
         </div>
         <div class="bg-sidebar"></div>
         <ul class="sidebar">
            <li><a href="data.php">Data</a></li>
            <li><a href="editdata">Edit Data</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
         </ul>
      </div>
    </nav>
  </div>
  
  <?php

if(isset($_POST['simpan'])){
    include ("config.php");

    $id = $_POST['id'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
  
    $usia = $_POST['usia'];

    $jenis_kelamin = $_POST['jenis_kelamin'];
    $update = mysqli_query($con, "UPDATE tabel_biodata SET username='$username', nama='$nama', alamat='$alamat',usia='$usia',jenis_kelamin='$jenis_kelamin' WHERE id='$id'");

    if($update){
        echo 'Data berhasil di simpan';
        echo '<a href="edit.php?id='.$id.'">Kembali</a>';
    }else{
        echo 'Gagal menyimpan data';
        echo '<a href="edit.php?id='.$id.'">Kembali</a>';
    }
}else {
    echo '<script>window.history.back()</script>';
}

?>
<script src="app.js"></script>
</body>
</html>