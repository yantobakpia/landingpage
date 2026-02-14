<!DOCTYPE html>
<html>
<head>
  <link href="aw.css" rel="stylesheet" type="text/css" />
  <style>
    .error-msg {
      color: white;
      background-color: red;
      padding: 10px;
      text-align: center;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="login">
    <h1>Login</h1>
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required="required" />
      <input type="password" name="password" placeholder="Password" required="required" />
      <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
    </form>
    <?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
      $host = "localhost"; // Ganti dengan host MySQL Anda
      $user = "root"; // Ganti dengan username MySQL Anda
      $pass = ""; // Ganti dengan password MySQL Anda
      $db = "perusahaan"; // Ganti dengan nama database Anda

      // Membuat koneksi ke database
      $conn = new mysqli($host, $user, $pass, $db);

      // Memeriksa koneksi
      if ($conn->connect_error) {
          die("Koneksi gagal: " . $conn->connect_error);
      }

      // Mendapatkan data dari form login
      $username = $_POST['username'];
      $password = $_POST['password'];

      // Melakukan query untuk memeriksa kecocokan username dan password
      $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $result = $conn->query($sql);

      // Memeriksa hasil query
      if ($result->num_rows > 0) {
          // Login berhasil
          header("Location: landing.php"); // Mengarahkan ke halaman index.php
          exit();
      } else {
          // Login gagal
          $login_error = "Login gagal!";
      }

      // Menutup koneksi ke database
      $conn->close();

      if (isset($login_error)) {
        echo '<p class="error-msg">' . $login_error . '</p>';
      }
    }
    ?>
  </div>
</body>
</html>
