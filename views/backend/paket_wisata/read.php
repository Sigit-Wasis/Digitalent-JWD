<?php include('query.php') ?>

<?php include('../layouts/app.php') ?>

<?php include('../layouts/header.php') ?>

<div class="container-fluid">
    <div class="row">
        <?php include('../layouts/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Paket Wisata</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="<?= $base_url ?>/views/backend/paket_wisata/create.php" class="btn btn-sm btn-success">Tambah Paket Wisata</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive small">
                <!-- Tampilkan pesan sukses jika ada -->
                <?php 
                    if (isset($_GET['pesan'])) {
                        $pesan = $_GET['pesan'];
                        echo "<div class='alert alert-success'>";
                        echo $pesan;
                        echo "</div>";
                    }
                ?>

                <table class="table table-striped table-sm">
                    <?php
                        if ($result->num_rows > 0) {
                            echo "<table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>#</th>
                                        <th scope='col'>Nama Paket</th>
                                        <th scope='col'>Harga Penginapan</th>
                                        <th scope='col'>Harga Transportasi</th>
                                        <th scope='col'>Harga Makanan</th>
                                        <th scope='col'>Harga Total</th>
                                    </tr>
                                </thead>
                            <tbody>";
                        
                            // Inisialisasi variabel nomor urut
                            $nomor = 1;
                            // Output data dari setiap baris
                            while($row = $result->fetch_assoc()) {
                                $harga_total = $row["harga_penginapan"] + $row["harga_transportasi"] + $row["harga_makanan"];
                                echo "<tr>
                                        <td>" . $nomor . "</td>
                                        <td>" . $row["nama_paket"]. "</td>
                                        <td>Rp. " . number_format($row["harga_penginapan"], 0, ',', '.') . "</td>
                                        <td>Rp. " . number_format($row["harga_transportasi"], 0, ',', '.') . "</td>
                                        <td>Rp. " . number_format($row["harga_makanan"], 0, ',', '.') . "</td>
                                        <td>Rp. " . number_format($harga_total, 0, ',', '.') . "</td>
                                    </tr>";
                                    $nomor++;
                            }
                            echo "</tbody></table>";
                        } else {
                            echo "<tbody><tr><td colspan='8'>Tidak ada data</td></tr></tbody>";
                        }
                    ?>
                </table>
            </div>
        </main>

    </div>
</div>

<?php include('../layouts/footer.php') ?>