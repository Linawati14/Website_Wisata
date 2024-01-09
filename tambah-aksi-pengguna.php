<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $orang = $_POST['orang'];
    $type = $_POST['type'];
    $tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO tb_pengguna (nama_lengkap, email, username, password, orang, type, tanggal_ditambahkan) VALUES ('$nama','$email','$username', '$password', '$orang', '$type', '$tanggal_ditambahkan')";
    if (mysqli_query($connect, $query)) {
        header("Location: admData_pengguna.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }

    // Tutup connect
    mysqli_close($connect);
}
