<?php
include 'config.php';
session_start();



if (isset($_SESSION['userid'])) {
    if ($_SESSION['role_id'] == 2) {
      
        header('Location:kasir.php');
    }
} else {
    $_SESSION['error'] = 'Anda harus login dahulu';
    header('location:login.php');
}

 ?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<title>Kasir bapak kita</title>


		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="signin.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-light sticky-top bg-light  shadow">
   
  <a class="navbar-brand col-md-5 col-lg-5 mr-5 px-3" href="index.php">Kasir bapak kita</a>
  <div class="sb-sidenav-menu">
    <div class="nav">
            <a class="nav-link" href="index.php?page=barang">
              <span data-feather="file">Barang</span>
            </a>
        
          
            <a class="nav-link" href="index.php?page=role">
              <span data-feather="shopping-cart"></span>
              Role
            </a>
          
          
            <a class="nav-link" href="index.php?page=user">
              <span data-feather="users"></span>
              User
            </a>
   
      <a class="nav-link" href="logout.php">Logout</a>
    
    
</nav>


    <main role="main" class="col-md-9  col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Dashboard Admin  </h1>
	  </div>
    <?php

      if (isset($_GET['page']) && $_GET['page'] != '') {
          include 'page/' . $_GET['page'] . '.php';
      } else {
          include 'page/home.php';
      }
    ?>
    </main>
  </div>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
