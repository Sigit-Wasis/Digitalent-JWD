<main class="mt-5 mb-5" id="paket-wisata">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h2 class="fw-normal text-body-emphasis" style="font-family: 'Oswald', sans-serif !important">Paket Wisata</h2>
        <p class="fs-5 text-body-secondary" style="font-family: 'Oswald', sans-serif !important">Temukan petualangan baru dan ciptakan kenangan abadi dengan paket wisata eksklusif kami. Ayo, jelajahi dunia bersama kami!.</p>
    </div>

    <?php
        // tampilkan pesan jika ada
        if (isset($pesan)) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Mantappp',
                        text: '$pesan',
                        confirmButtonText: 'Resume Pesanan' // Custom teks untuk button OK
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // window.location.href = 'home.php';
                            // Setelah pengguna mengklik OK pada SweetAlert, tampilkan modal rangkuman
                            $('#rangkumanModal').modal('show'); // Menggunakan jQuery untuk menampilkan modal
                        }
                    });
                });
            </script>";
        }
    ?>

    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <?php
    // Loop untuk menampilkan setiap paket
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Hitung harga total dan harga diskon
            $harga_total = $row['harga_penginapan'] + $row['harga_transportasi'] + $row['harga_makanan'];
        ?>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3" style="background-color: #EAB14D">
                        <h4 class="my-0 fw-normal" style="font-family: 'Oswald', sans-serif !important;"><?= $row['nama_paket']; ?></h4>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title pricing-card-title"><?= "Rp. " . number_format($harga_total, 0, ',', '.'); ?></h2>
                        <ul class="list-unstyled mt-3 mb-4" style="font-weight: bold">
                            <li>Penginapan : <?= "Rp. " . number_format($row['harga_penginapan'], 0, ',', '.'); ?></li>
                            <li>Transportasi : <?= "Rp. " . number_format($row['harga_transportasi'], 0, ',', '.'); ?></li>
                            <li>Makanan : <?= "Rp. " . number_format($row['harga_makanan'], 0, ',', '.'); ?></li>
                        </ul>
                        <button type="button" class="btn btn-lg btn-outline-primary view-details" data-id="<?php echo $row['id'] ?>">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada data paket tersedia.</p>";
        }
    ?>
    </div>
</main>