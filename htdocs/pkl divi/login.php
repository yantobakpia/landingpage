<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa informasi autentikasi (contoh sederhana)
    $username = "admin";
    $password = "password";

    if ($_POST["username"] === $username && $_POST["password"] === $password) {
        // Autentikasi berhasil, set token sesi
        $_SESSION["authenticated"] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head Content -->
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
