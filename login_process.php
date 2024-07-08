<!-- login_process.php -->
<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan query ke database untuk mencari admin dengan username tertentu
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        // Admin ditemukan, verifikasi password
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            // Password cocok, set session dan redirect ke halaman admin
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: admin_panel.php");
            exit();
        } else {
            // Password tidak cocok
            echo "Username atau Password salah.";
        }
    } else {
        // Admin tidak ditemukan
        echo "Username atau Password salah.";
    }

    $conn->close();
}
?>
