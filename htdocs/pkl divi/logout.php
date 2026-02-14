<?php
session_start();

// Hapus token sesi dan arahkan kembali ke halaman login
unset($_SESSION["authenticated"]);
header("Location: login.php");
exit;
?>
