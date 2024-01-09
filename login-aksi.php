<?php
// Sertakan file koneksi.php
include 'koneksi.php';

// Lakukan sesi untuk memulai atau melanjutkan sesi
session_start();

// Ambil data yang dikirimkan dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan proses pengecekan login
$query = "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'";
$result = $connect->query($query);

if ($result->num_rows > 0) {
	// Login berhasil, ambil data pengguna
	$row = $result->fetch_assoc();

	// Simpan ID pengguna ke dalam sesi
	$_SESSION['user_id'] = $row['id_login'];

	// Redirect ke halaman yang diinginkan setelah login
	header('Location: admin-page.php');
} else {
	// Login gagal, kembali ke halaman login
	header('Location: login.php');
}
