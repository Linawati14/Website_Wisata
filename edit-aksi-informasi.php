<?php
include 'koneksi.php';
$id = $_POST['id_informasi'];
$nama_informasi = $_POST['nama_informasi'];
$tanggal_upload = $_POST['tanggal_upload'];
$foto = $_POST['foto'];
$deskripsi = $_POST['deskripsi'];

$querys = mysqli_query($connect, "UPDATE tb_informasi SET nama_informasi='$nama_informasi', tanggal_upload='$tanggal_upload', foto='$foto', deskripsi='$deskripsi' WHERE id_informasi='$id'");

if ($querys) {
    header("Location: admData_informasi.php");
} else {
    echo 'GAGAL MENGUPDATE DATA';
    echo $nama_informasi;
    echo $tanggal_upload;
    echo $foto;
    echo $deskripsi;
}
