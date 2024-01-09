<?php
ob_start(); // Start output buffering
include "koneksi.php";

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$id_wisata = isset($_GET['id_wisata']) ? $_GET['id_wisata'] : 1; // Default ke 1 jika tidak ada id_wisata yang dipilih
$result = $connect->query("SELECT latitude, longitude FROM tb_wisata WHERE id_wisata = $id_wisata");
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$connect->close();

header('Content-Type: application/json');
echo json_encode($data);
ob_end_flush(); // Flush the output
