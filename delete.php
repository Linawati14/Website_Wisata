<?php 
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($connect,"DELETE FROM tb_wisata WHERE id_wisata='$id'")or die(mysqli_error($connect));

header("location:admin-page.php");
