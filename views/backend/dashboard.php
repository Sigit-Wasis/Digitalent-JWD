<?php
    // buat koneksi ke mysql dari file connection.php
    // Menggunakan __DIR__ untuk memastikan jalur absolut
    include(__DIR__ . "/../../config/connection.php");

    // Query untuk menghitung jumlah pemesanan
    $sql_pemesanan = "SELECT COUNT(*) as jumlah_pemesanan FROM pemesanan";
    $result_pemesanan = $link->query($sql_pemesanan);
    $row_pemesanan = $result_pemesanan->fetch_assoc();
    $jumlah_pemesanan = $row_pemesanan['jumlah_pemesanan'];

    // Query untuk menghitung jumlah paket wisata
    $sql_paket = "SELECT COUNT(*) as jumlah_paket FROM paket_wisata";
    $result_paket = $link->query($sql_paket);
    $row_paket = $result_paket->fetch_assoc();
    $jumlah_paket = $row_paket['jumlah_paket'];

    // Mendapatkan tanggal hari ini dalam format SQL
    $tanggal_hari_ini = date('Y-m-d');

    // Query untuk menghitung total reservasi hari ini
    $sql_reservasi_hari_ini = "SELECT COUNT(*) as total_reservasi FROM pemesanan WHERE DATE(created_at) = '$tanggal_hari_ini'";
    $result_reservasi_hari_ini = $link->query($sql_reservasi_hari_ini);

    if ($result_reservasi_hari_ini) {
        $row_reservasi_hari_ini = $result_reservasi_hari_ini->fetch_assoc();
        $total_reservasi = $row_reservasi_hari_ini['total_reservasi'];
    } else {
        $total_reservasi = 0;
    }
?>

<?php include('layouts/app.php') ?>

<?php include('layouts/header.php') ?>

<div class="container-fluid">
    <div class="row">
        <?php include('layouts/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Dashboard</h1>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body card-body text-center bg-secondary text-white rounded shadow font-weight-bold">
                            <h3><?= $jumlah_paket ?></h3> Total Paket Wisata.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center bg-secondary text-white rounded shadow font-weight-bold">
                            <h3><?= $jumlah_pemesanan ?></h3> Total Reservasi Keseluruhan.
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body card-body text-center bg-secondary text-white rounded shadow font-weight-bold">
                            <h3><?= $total_reservasi ?></h3> Total Reservasi Hari Ini.
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<?php include('layouts/footer.php') ?>
