<!-- add_admin_process.php -->
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password menggunakan password_hash()
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan admin baru ke dalam database
    $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Admin baru berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
