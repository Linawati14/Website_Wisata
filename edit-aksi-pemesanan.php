<?php
include 'koneksi.php';

$id = $_POST['id'];
$bayar = $_POST['bayar'];
$kembalian = $_POST['kembali'];

$querys = mysqli_query($connect, "UPDATE tb_pemesanan SET bayar='$bayar', kembali='$kembalian' WHERE id_pemesanan='$id'");

if ($querys) {
    header("Location: admData_pemesanan.php");
    exit(); // Add this line to prevent further execution
} else {
    echo 'GAGAL MENGUPDATE DATA';
    echo $bayar;
    echo $kembalian;
}
