<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $id_wisata = $_POST['id_wisata'];
    $wisata = $_POST['wisata'];
    $tanggal_kunjungan = $_POST['tanggal_kunjungan'];
    $jumlah_tiket = $_POST['jumlah_tiket'];
    $harga = $_POST['harga'];
    $total_pembayaran = $_POST['total_pembayaran'];

    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO tb_pemesanan (id, id_wisata, wisata, tanggal_kunjungan, jumlah_tiket, harga, total_pembayaran) VALUES ('$id','$id_wisata','$wisata','$tanggal_kunjungan','$jumlah_tiket', '$harga', '$total_pembayaran')";
    if (mysqli_query($connect, $query)) {
        header("Location: admData_pemesanan.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }

    // Tutup connect
    mysqli_close($connect);
}
