<?php
// Lakukan koneksi ke database
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_lengkap = $_POST["nama_lengkap"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO tb_pengguna (nama_lengkap, email, username, password) VALUES ('$nama_lengkap','$email','$username', '$password')";
    if (mysqli_query($connect, $query)) {
        echo "Pendaftaran berhasil. Silakan <a href='index.php'>masuk</a>.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }

    // Tutup connect
    mysqli_close($connect);
}
