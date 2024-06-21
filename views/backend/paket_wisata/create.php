<?php include('query.php') ?>

<?php include('../layouts/app.php') ?>
<?php include('../layouts/header.php') ?>

<div class="container-fluid">
    <div class="row">
        <?php include('../layouts/sidebar.php') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h4">Tambah Paket Wisata</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="<?= $base_url ?>/views/backend/paket_wisata/read.php" class="btn btn-sm btn-primary">Kembali</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <?php
                    if (isset($_GET['errors'])) {
                        $errors = $_GET['errors'];
                        if (is_array($errors)) {
                            echo "<div class='alert alert-danger'><ul>";
                            foreach ($errors as $error) {
                                echo "<li>" . htmlspecialchars($error) . "</li>";
                            }
                            echo "</ul></div>";
                        }
                    }
                ?>

                <form action="query.php" method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="nama_paket" class="form-label">Nama Paket <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Favorit Tour">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="harga_penginapan" class="form-label">Harga Penginapan <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" id="harga_penginapan" name="harga_penginapan" placeholder="1000000">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="harga_transportasi" class="form-label">Harga Transportasi <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" id="harga_transportasi" name="harga_transportasi" placeholder="1000000">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="harga_makanan" class="form-label">Harga Makanan <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" id="harga_makanan" name="harga_makanan" placeholder="1000000">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan </label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success">Simpan Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>

        </main>
    </div>
</div>

<?php include('../layouts/footer.php') ?>
