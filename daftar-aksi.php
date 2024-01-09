<?php
// Lakukan koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO tb_user (username, password) VALUES ('$username', '$hashedPassword')";
    if (mysqli_query($connect, $query)) {
        echo "Pendaftaran berhasil. Silakan <a href='login.php'>masuk</a>.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }

    // Tutup connect
    mysqli_close($connect);
}
