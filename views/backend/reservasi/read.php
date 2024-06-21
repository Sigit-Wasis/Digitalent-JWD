<?php include('query.php') ?>

<?php include('../layouts/app.php') ?>
<?php include('../layouts/header.php') ?>

<div class="container-fluid">
    <div class="row">
        <?php include('../layouts/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Reservasi</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="<?= $base_url ?>/views/backend/reservasi/read.php" class="btn btn-sm btn-primary">Reload</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive small">
                <table class="table table-striped table-sm">
                    <?php
                        if ($result->num_rows > 0) {
                            echo "<thead>
                                    <tr>
                                        <th scope='col'>#</th>
                                        <th scope='col'>Nama Pemesan</th>
                                        <th scope='col'>Telepon</th>
                                        <th scope='col'>Waktu (hari)</th>
                                        <th scope='col'>Jumlah Peserta</th>
                                        <th scope='col'>Pelayanan Paket</th>
                                        <th scope='col'>Harga</th>
                                        <th scope='col'>Dibuat Pada</th>
                                    </tr>
                                </thead>
                                <tbody>";

                            // Output data dari setiap baris
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["id"]. "</td>
                                        <td>" . $row["nama_pemesan"]. "</td>
                                        <td>" . $row["nomor_telepon"]. "</td>
                                        <td>" . $row["waktu_pelaksanaan"]. " Hari</td>
                                        <td>" . $row["jumlah_peserta"]. "</td>
                                        <td>" . $row["pelayanan_paket"]. "</td>
                                        <td>Rp. " . number_format($row["harga"], 0, ',', '.') . "</td>
                                        <td>" . $row["created_at"]. "</td>
                                    </tr>";
                            }
                            echo "</tbody>";
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