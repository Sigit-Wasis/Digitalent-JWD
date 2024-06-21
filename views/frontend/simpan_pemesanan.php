<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    // $errors = [];

    // if (empty($_POST['nama_pemesan'])) {
    //     $errors[] = "Nama pemesan tidak boleh kosong.";
    // }

    // if (empty($_POST['nomor_telepon'])) {
    //     $errors[] = "Nomor telepon tidak boleh kosong.";
    // } elseif (!preg_match('/^\d+$/', $_POST['nomor_telepon'])) {
    //     $errors[] = "Nomor telepon harus berupa angka.";
    // }

    // if (empty($_POST['waktu_pelaksanaan'])) {
    //     $errors[] = "Waktu pelaksanaan tidak boleh kosong.";
    // } elseif (!is_numeric($_POST['waktu_pelaksanaan']) || $_POST['waktu_pelaksanaan'] <= 0) {
    //     $errors[] = "Waktu pelaksanaan harus berupa angka dan lebih dari 0.";
    // }

    // if (empty($_POST['jumlah_peserta'])) {
    //     $errors[] = "Jumlah peserta tidak boleh kosong.";
    // } elseif (!is_numeric($_POST['jumlah_peserta']) || $_POST['jumlah_peserta'] <= 0) {
    //     $errors[] = "Jumlah peserta harus berupa angka dan lebih dari 0.";
    // }

        // Check if checkboxes are checked
    // if (!isset($_POST['penginapan']) && !isset($_POST['transportasi']) && !isset($_POST['makanan'])) {
    //     $errors[] = "Minimal harus memilih satu pelayanan paket.";
    // }

    // If there are errors, redirect with error messages
    // if (!empty($errors)) {
         // Serialize errors into a query string
    //     $errorString = http_build_query(array('errors' => $errors));

         // Redirect with error string
    //     header("Location: home.php?" . $errorString);
    //     exit;
    // }

    // buat koneksi ke mysql dari file connection.php
    // Menggunakan __DIR__ untuk memastikan jalur absolut
    include(__DIR__ . "/../../config/connection.php");

    // Ambil dan bersihkan data dari form
    $nama_pemesan = $link->real_escape_string($_POST['nama_pemesan']);
    $nomor_telepon = $link->real_escape_string($_POST['nomor_telepon']);
    $waktu_pelaksanaan = $link->real_escape_string($_POST['waktu_pelaksanaan']);
    $jumlah_peserta = $link->real_escape_string($_POST['jumlah_peserta']);
    $pelayanan_paket = $link->real_escape_string($_POST['idPaketWisata']);
    $harga_paket = $link->real_escape_string($_POST['harga_paket']);
    $jumlah_tagihan = $link->real_escape_string($_POST['jumlah_tagihan']);

    // Buat query SQL untuk menyimpan data
    $query = "INSERT INTO pemesanan (nama_pemesan, nomor_telepon, waktu_pelaksanaan, jumlah_peserta, pelayanan_paket, harga, jumlah_tagihan) VALUES ('$nama_pemesan', '$nomor_telepon', '$waktu_pelaksanaan', '$jumlah_peserta', '$pelayanan_paket', '$harga_paket', '$jumlah_tagihan')";

    $result = mysqli_query($link, $query);

    //periksa hasil query
    if($result) {
        // Siapkan data untuk dilempar ke home.php
        $data = array(
            'nama_pemesan' => $nama_pemesan,
            'nomor_telepon' => $nomor_telepon,
            'waktu_pelaksanaan' => $waktu_pelaksanaan,
            'jumlah_peserta' => $jumlah_peserta,
            'harga_paket' => $harga_paket,
            'jumlah_tagihan' => $jumlah_tagihan
        );

        // Ubah array menjadi string parameter URL
        $data_url = http_build_query($data);

        // Redirect ke home.php dengan menyertakan data dalam URL + pesan
        $pesan = "Pesanan Anda Berhasil Dikirim.";
        $pesan = urlencode($pesan);
        header("Location: home.php?pesan={$pesan}&{$data_url}");
    } else {
        die ("Query gagal dijalankan: ".mysqli_errno($link)." - ".mysqli_error($link));
    }
}
?>
