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

    <CENTER><h2>Edit Data Siswa</h2></CENTER>
<br>
<?php

include "config.php";

$id = $_GET['id'];
$show = mysqli_query($con, "SELECT * FROM tabel_biodata WHERE id='$id'");

if(mysqli_num_rows($show)==0){
    echo '<script>window.history.back()</script>';
}else{
    $data = mysqli_fetch_assoc($show);
}

?>

<form action="edit-proses.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <table cellpading="3" cellspacing="0">
        <tr>
            <td>username</td>
            <td>:</td>
            <td><input type="text" name="username" value="<?php echo $data['username']; ?>" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" size="30" value="<?php echo $data['nama']; ?>" required></td>
        </tr>
        <tr>
        <td>alamat</td>
            <td>:</td>
            <td><input type="text" name="alamat" size="30" value="<?php echo $data['alamat']; ?>" required></td>
        </tr>
        <td>usia</td>
            <td>:</td>
            <td><input type="text" name="usia" size="30" value="<?php echo $data['usia']; ?>" required></td>
        <tr>
            <td>Jenis kelamin</td>
            <td>:</td>
            <td>
                <select name="jenis_kelamin" required>
                <option value="">Pilih Kelamin</option>
                    <option value="laki-laki"<?php if($data['jenis_kelamin']=='Laki-Laki'){echo 'selected';} ?>>Laki-Laki</option>
                    <option value="perempuan"<?php if($data['jenis_kelamin']=='perempuan'){echo 'selected';} ?>>Perempuan</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>submit</td>
            <td>:</td>
            <td><input type="submit" name="simpan" value="Simpan"></td>
        </tr>
    </table>
</form>
   
<script src="app.js"></script>
</body>
</html>