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
            <a href="">Selamat datang, <?php echo $_SESSION['username']; ?></a>
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