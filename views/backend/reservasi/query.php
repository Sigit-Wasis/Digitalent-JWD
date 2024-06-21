<?php
    // buat koneksi ke mysql dari file connection.php
    // Menggunakan __DIR__ untuk memastikan jalur absolut
    include(__DIR__ . "/../../../config/connection.php");

    $query = "SELECT id, nama_pemesan, nomor_telepon, waktu_pelaksanaan, jumlah_peserta, pelayanan_paket, harga, created_at FROM pemesanan";
    $result = $link->query($query);
?>
