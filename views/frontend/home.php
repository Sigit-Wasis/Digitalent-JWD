<?php
    $base_url = "/digitalent"; // Sesuaikan dengan direktori aplikasi Anda

    // buat koneksi ke mysql dari file connection.php
    // Menggunakan __DIR__ untuk memastikan jalur absolut
    include(__DIR__ . "/../../config/connection.php");

    // Query untuk mengambil data paket
    $query = "SELECT id, nama_paket, harga_penginapan, harga_transportasi, harga_makanan FROM paket_wisata";
    $result = $link->query($query);

    // ambil pesan jika ada  
    if (isset($_GET["pesan"])) {
        $pesan = $_GET["pesan"];
    }
    
    // Fungsi untuk memformat angka menjadi Rupiah
    function formatRupiah($number) {
        return 'Rp. ' . number_format($number, 0, ',', '.');
    }

    // Ambil data dari URL jika ada
    $nama_pemesan = isset($_GET['nama_pemesan']) ? $_GET['nama_pemesan'] : '';
    $nomor_telepon = isset($_GET['nomor_telepon']) ? $_GET['nomor_telepon'] : '';
    $waktu_pelaksanaan = isset($_GET['waktu_pelaksanaan']) ? $_GET['waktu_pelaksanaan'] : '';
    $jumlah_peserta = isset($_GET['jumlah_peserta']) ? $_GET['jumlah_peserta'] : '';
    $pelayanan_paket = isset($_GET['pelayanan_paket']) ? $_GET['pelayanan_paket'] : '';
    $harga_paket = isset($_GET['harga_paket']) ? $_GET['harga_paket'] : '';
    $jumlah_tagihan = isset($_GET['jumlah_tagihan']) ? $_GET['jumlah_tagihan'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Informasi Wisata Lampung</title>
    <link rel="icon" href="<?= $base_url ?>/assets/img/favicon.ico" type="image/png" >
    <link href="<?= $base_url ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href="<?= $base_url ?>/assets/css/style.css" rel="stylesheet">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>    
<main>
    <div class="container">
        <!-- -------------------- Header -------------------- -->
        <?php include('_header.php'); ?>
        <!-- -------------------- End Header -------------------- -->

        <!-- -------------------- Slider -------------------- -->
        <?php include('_slider.php'); ?>
        <!-- -------------------- End Slider -------------------- -->

        <!-- -------------------- Quote -------------------- -->
        <?php include('_quote.php'); ?>
        <!-- -------------------- End Quote -------------------- -->
        
        <!-- -------------------- Blog -------------------- -->
        <?php include('_blog.php'); ?>
        <!-- -------------------- End Blog -------------------- -->

        <!-- -------------------- Paket Wisata -------------------- -->
        <?php include('_paket_wisata.php'); ?>
        <!-- -------------------- End Paket Wisata -------------------- -->

        <!-- -------------------- Modal Pesan -------------------- -->
        <?php include('modal_pesan.php'); ?>
        <!-- -------------------- End Modal Pesan -------------------- -->

        <!-- Modal untuk menampilkan rangkuman hasil insert -->
        <?php include('modal_rangkuman.php'); ?>
        <!-- End Modal untuk menampilkan rangkuman hasil insert -->

        <!-- -------------------- Galeri -------------------- -->
        <?php include('_galeri.php'); ?>
        <!-- ------------------- End Galeri -------------------- -->
    
        <!-- -------------------- Kontak -------------------- -->
        <?php include('_kontak.php'); ?>
        <!-- -------------------- End Kontak --------------------  -->

        <!-- -------------------- Footer --------------------  -->
        <?php include('_footer.php'); ?>
        <!-- -------------------- End Footer -------------------- -->
    </div>
</main>

    <script src="<?= $base_url ?>/assets/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="<?= $base_url ?>/assets/js/script.js"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.view-details').on('click', function() {
                var paketId = $(this).data('id');

                $.ajax({
                    url: 'get_paket_details.php',
                    type: 'GET',
                    data: { id: paketId },
                    dataType: 'json',
                    success: function(response) {
                        $('#modalTitle').text('Detail Paket Wisata: ' + response.nama_paket);
                        $('#modalNamaPaket').text(response.nama_paket);
                        $('#modalHargaPenginapan').text(formatRupiah(response.harga_penginapan));
                        $('#modalHargaTransportasi').text(formatRupiah(response.harga_transportasi));
                        $('#modalHargaMakanan').text(formatRupiah(response.harga_makanan));

                        // Set nilai checkbox berdasarkan response
                        $('#hiddenPenginapan').val(parseFloat(response.harga_penginapan));
                        $('#hiddenTransportasi').val(parseFloat(response.harga_transportasi));
                        $('#hiddenMakanan').val(parseFloat(response.harga_makanan));
                        $('#idPaketWisata').val(parseFloat(response.id));

                        $('#exampleModal').modal('show');
                    }
                });
            });

            // Fungsi untuk menformat angka ke Rupiah dari "5000000.00" menjadi Rp. 5.000.000
            function formatRupiah(value) {
                // Mengonversi string ke float
                const number = parseFloat(value);
                
                // Memastikan angka valid
                if (isNaN(number)) {
                    return value;
                }

                // Memformat angka ke Rupiah
                return 'Rp. ' + number.toLocaleString('id-ID', {
                    minimumFractionDigits: 0
                });
            }
            
            // Kalkulasi untuk total dari penginapan, transportasi, dan makanan
            function calculatePackagePrice() {
                var totalHarga = 0;

                if ($('#penginapan').is(':checked')) {
                    totalHarga += parseFloat($('#hiddenPenginapan').val());
                }
                if ($('#transportasi').is(':checked')) {
                    totalHarga += parseFloat($('#hiddenTransportasi').val());
                }
                if ($('#makanan').is(':checked')) {
                    totalHarga += parseFloat($('#hiddenMakanan').val());
                }

                $('#harga_paket').val(totalHarga);
                calculateTotal();
            }

            // Kalkulasi untuk total tagihan keseluruhan
            function calculateTotal() {
                var waktuPelaksanaan = parseFloat($('#waktu_pelaksanaan').val()) || 0;
                var jumlahPeserta = parseFloat($('#jumlah_peserta').val()) || 0;
                var hargaPaket = parseFloat($('#harga_paket').val()) || 0;

                var totalTagihan = (waktuPelaksanaan * jumlahPeserta) * hargaPaket;
                $('#jumlah_tagihan').val(totalTagihan);
            }

            $('#waktu_pelaksanaan').on('input', function() {
                calculateTotal();
            });

            $('#jumlah_peserta').on('input', function() {
                calculateTotal();
            });

            $('#waktu_pelaksanaan, #penginapan, #transportasi, #makanan').on('change', function() {
                calculatePackagePrice();
            });

            function validatePhoneNumber() {
                var input = document.getElementById('nomor_telepon');
                input.value = input.value.replace(/\D/g, '').slice(0, 16);
            }
        });
    </script>
    <script>
        // Tangkap klik pada tombol "Ya"
        $(document).ready(function() {
            $('#yaBtn').click(function(e) {
                $('#rangkumanModal').modal('hide'); // Menutup modal
                e.preventDefault(); // Menghentikan default action dari elemen <a>
                window.location.href = 'home.php#paket-wisata'; // Redirect ke home.php dengan hash
            });
        });
    </script>
</body>
</html>