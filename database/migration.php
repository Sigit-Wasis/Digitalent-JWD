<?php
    $base_url = "/digitalent"; 
    $mysqli = new mysqli("localhost", "root", "123456");

    //buat database digitalent jika belum ada
    $query = "CREATE DATABASE IF NOT EXISTS digitalent";
    $result = mysqli_query($mysqli, $query);

    if(!$result){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Database <b>'digitalent'</b> berhasil dibuat... <br>";
    }

    //pilih database digitalent
    $result = mysqli_select_db($mysqli, "digitalent");

    if(!$result){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Database <b>'digitalent'</b> berhasil dipilih... <br>";
    }

    // cek apakah tabel paket_wisata sudah ada. jika ada, hapus tabel
    $query = "DROP TABLE IF EXISTS paket_wisata";
    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'paket_wisata'</b> berhasil dihapus... <br>";
    }

    // Query untuk membuat tabel paket_wisata
    $query  = "CREATE TABLE paket_wisata (";
    $query .= "id INT AUTO_INCREMENT, ";
    $query .= "nama_paket VARCHAR(100), ";
    $query .= "harga_total_paket DECIMAL(10,2), ";
    $query .= "harga_penginapan DECIMAL(10,2), ";
    $query .= "harga_transportasi DECIMAL(10,2), ";
    $query .= "harga_makanan DECIMAL(10,2), ";
    $query .= "keterangan TEXT, ";
    $query .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
    $query .= "PRIMARY KEY (id)";
    $query .= ")";

    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'paket_wisata'</b> berhasil dibuat... <br>";
    }

    // cek apakah tabel pemesanan sudah ada. jika ada, hapus tabel
    $query = "DROP TABLE IF EXISTS pemesanan";
    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'pemesanan'</b> berhasil dihapus... <br>";
    }

    // Query untuk membuat tabel pemesanan
    $query  = "CREATE TABLE pemesanan (";
    $query .= "id INT AUTO_INCREMENT, ";
    $query .= "nama_pemesan VARCHAR(100), ";
    $query .= "nomor_telepon VARCHAR(20), ";
    $query .= "waktu_pelaksanaan DATETIME, ";
    $query .= "jumlah_peserta INT, ";
    $query .= "pelayanan_paket SET('perjalanan', 'transportasi', 'makanan'), ";
    $query .= "harga BIGINT, ";
    $query .= "jumlah_tagihan BIGINT, ";
    $query .= "created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, ";
    $query .= "PRIMARY KEY (id)";
    $query .= ")";

    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'pemesanan'</b> berhasil dibuat... <br>";
    }

    // cek apakah tabel admin sudah ada. jika ada, hapus tabel
    $query = "DROP TABLE IF EXISTS admin";
    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'admin'</b> berhasil dihapus... <br>";
    }

    // buat query untuk CREATE tabel admin
    $query  = "CREATE TABLE admin (username VARCHAR(50), password CHAR(40))";
    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'admin'</b> berhasil dibuat... <br>";
    }

    // buat username dan password untuk admin
    $username = "admin123";
    $password = sha1("rahasia");

    // buat query untuk INSERT data ke tabel admin
    $query  = "INSERT INTO admin VALUES ('$username','$password')";

    $hasil_query = mysqli_query($mysqli, $query);

    if(!$hasil_query){
        die ("Query Error: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
    }
    else {
        echo "Tabel <b>'admin'</b> berhasil diisi... <br>";
        echo "Buka Website di <a href='{$base_url}/views/frontend/home.php'><b>Sini</b></a>";
    }

    // tutup koneksi dengan database mysql
    mysqli_close($mysqli);
?>
