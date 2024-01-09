<?php 
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama_lengkap'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$orang = $_POST['orang'];
$type = $_POST['type'];
$tanggal_ditambahkan = $_POST['tanggal_ditambahkan'];

$querys = mysqli_query($connect, "UPDATE tb_pengguna SET nama_lengkap='$nama', email='$email', username='$username', username='$username',password='$password', orang='$orang', type='$type', tanggal_ditambahkan='$tanggal_ditambahkan' WHERE id='$id'");

if ($querys) {
    header("Location: admData_pengguna.php");
} else {
    echo 'GAGAL MENGUPDATE DATA';
    echo $nama; echo $email; echo $username; echo $password; echo $orang; echo $type; echo $tanggal_ditambahkan;
}
