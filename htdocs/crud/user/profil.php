<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
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
            <a href="index.php">Selamat datang, <?php echo $_SESSION['username']; ?></a>
         </div>
         <div class="burger">
            <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
         </div>
         <div class="bg-sidebar"></div>
         <ul class="sidebar">
            <li><a href="profil.php">profil</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
         </ul>
      </div>
    </nav>
  </div>

<script src="app.js"></script>
</body>
</html>
<br>
   
   <center> <h2>Isi Profil</h2> </center>

        <form action="proses.php" method="post">
        <table cellpadding="3" cellspaciing="0">
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username"  required></td>
                </tr>
            
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>alamat</td>
                    <td>:</td>
                    <td><input type="text" name="alamat" size="50" required></td>
                </tr>
                <tr>
                    

                <tr>
                <td>usia</td>
                <td>:</td>
                <td><input type="text" name="usia" size="50" required></td>
                
            </tr>
            <td>jenis kelamin</td>
                    <td>:</td>
                    <td><select name="jenis_kelamin" required>
                        <option value="">Pilih kelamin</option>
                        <option value="laki-laki">laki-laki</option>
                        <option value="perempuan">perempuan</option>
                    </select></td>
                </tr>

            <tr>
                <td>&nbsp</td>
                <td></td>
                <td><input type="submit" name="tambah" value="Tambah"></td>
            </tr>
</table>
            </form>
    </body>
</html>