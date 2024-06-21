<?php

// buat koneksi ke mysql dari file connection.php
// Menggunakan __DIR__ untuk memastikan jalur absolut
include(__DIR__ . "/../../config/connection.php");

$id = $_GET['id'];

$query = "SELECT id, nama_paket, harga_penginapan, harga_transportasi, harga_makanan FROM paket_wisata WHERE id = $id";
$result = $link->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode([]);
}
?>
