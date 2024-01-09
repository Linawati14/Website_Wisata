<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM tb_pengguna WHERE id='$id'") or die(mysqli_error($connect));

header("location:admData_pengguna.php");
