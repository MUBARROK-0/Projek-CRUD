<!-- logout.php -->
<?php
session_start();
session_unset(); // Hapus semua variabel session
session_destroy(); // Hapus session
header("Location: login.php"); // Redirect ke halaman login
exit();
?>
