<?php
    // buat koneksi ke mysql dari file connection.php
    // Menggunakan __DIR__ untuk memastikan jalur absolut
    include(__DIR__ . "/../../../config/connection.php");

    // QUERY UNTUK MENGAMBIL DATA
    $query = "SELECT id, nama_paket, harga_total_paket, harga_penginapan, harga_transportasi, harga_makanan, created_at FROM paket_wisata ORDER BY created_at DESC";
    $result = $link->query($query);

    // Pastikan method request adalah POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Tangkap data dari form
        $nama_paket = $_POST['nama_paket'];
        $harga_penginapan = $_POST['harga_penginapan'];
        $harga_transportasi = $_POST['harga_transportasi'];
        $harga_makanan = $_POST['harga_makanan'];
        $keterangan = $_POST['keterangan'];
        
        // Validasi data (contoh sederhana, silakan sesuaikan sesuai kebutuhan)
        $errors = array();
        
        if (empty($nama_paket)) {
            $errors[] = "Nama Paket tidak boleh kosong.";
        }
        
        if (!is_numeric($harga_penginapan) || $harga_penginapan < 0) {
            $errors[] = "Harga Penginapan harus berupa angka dan lebih besar atau sama dengan 0.";
        }
        
        if (!is_numeric($harga_transportasi) || $harga_transportasi < 0) {
            $errors[] = "Harga Transportasi harus berupa angka dan lebih besar atau sama dengan 0.";
        }
        
        if (!is_numeric($harga_makanan) || $harga_makanan < 0) {
            $errors[] = "Harga Makanan harus berupa angka dan lebih besar atau sama dengan 0.";
        }

        // Jika ada error, tampilkan pesan error
        if (!empty($errors)) {
            $pesan = "Ooppps, Ada Kesalahan.";
            $pesan = urlencode($pesan);
            $query_string = http_build_query(array('errors' => $errors));
            header("Location: create.php?pesan={$pesan}&{$query_string}");
        }
        
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO paket_wisata (nama_paket, harga_penginapan, harga_transportasi, harga_makanan, keterangan)
                VALUES ('$nama_paket', $harga_penginapan, $harga_transportasi, $harga_makanan, '$keterangan')";
        
        $result = mysqli_query($link, $query);

        //periksa hasil query
        if($result) {
            // INSERT berhasil, redirect ke home.php + pesan
            $pesan = "Paket Wisata Anda Berhasil Dibuat.";
            $pesan = urlencode($pesan);
            header("Location: read.php?pesan={$pesan}");
        } else {
            die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
        }
        
        // Tutup koneksi
        mysqli_close($koneksi);
    }
?>
