<?php
include 'config.php';
session_start();


if (isset($_POST['masuk'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$username' and password='$password'");

   
    $data = mysqli_fetch_assoc($query);
  
    $check = mysqli_num_rows($query);
   

    if (!$check) {
        $_SESSION['error'] = 'Username & password salah';
    } else {
        $_SESSION['userid'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['role_id'] = $data['role_id'];

        header('location:index.php');
    }
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
    <link href="/css/signin.css" rel="stylesheet">
  	</head>
	<body class="text-center">
		<form method="post" class="form-signin">
			<img class="mb-4" src="image/foto awal.jpg" alt="" width="72" height="72">

			<?php if (isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
				<div class="alert alert-danger" role="alert">
					<?=$_SESSION['error']?>
				</div>
			<?php }
                $_SESSION['error'] = '';
            ?>
			<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
          <p class="mb-2">Username</p>
       
			<input type="text" class="form-control mb-3" name="username" placeholder="Username">
      <p class="mb-2">password</p>
			<input type="password" class="form-control" name="password" placeholder="Password">
      
			<input type="submit" name="masuk" value="Sign in" class="btn btn-primary mt-3 mb-3"/>
			<p class="mt-1 mb-3 ">&copy; 2024 </p>
		</form>
	</body>
</html>


