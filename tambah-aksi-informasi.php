<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_informasi'];
    $tanggal_upload = $_POST['tanggal_upload'];
    $deskripsi = $_POST['deskripsi'];

    // Lokasi folder upload
    $folder_upload = "./upload";

    // Info file yang diunggah
    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $tmp_file = $_FILES['foto']['tmp_name'];

    // Generate nama unik untuk file
    $nama_file_baru = uniqid() . "_" . $nama_file;

    // Path lengkap file yang diupload
    $path_file_upload = $folder_upload . $nama_file_baru;

    // Cek apakah file berhasil diunggah
    if (move_uploaded_file($tmp_file, $path_file_upload)) {
        // File berhasil diunggah, simpan informasi ke database
        $query = "INSERT INTO tb_informasi (nama_informasi, tanggal_upload, foto, deskripsi) VALUES ('$nama','$tanggal_upload','$nama_file_baru', '$deskripsi')";

        if (mysqli_query($connect, $query)) {
            header("Location: admData_informasi.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
        }
    } else {
        // Jika file gagal diunggah
        echo "Error: Gagal mengunggah file.";
    }

    // Tutup koneksi
    mysqli_close($connect);
}
