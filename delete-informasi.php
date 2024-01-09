<?php
include 'koneksi.php';
$id = $_GET['id_informasi'];
mysqli_query($connect, "DELETE FROM tb_informasi WHERE id_informasi='$id'") or die(mysqli_error($connect));

header("location:admData_informasi.php");
