<div class="modal fade" id="rangkumanModal" tabindex="-1" role="dialog" aria-labelledby="rangkumanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="rangkumanModalLabel">RANGKUMAN RESERVASI PAKET WISATA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Tampilkan informasi atau rangkuman hasil insert di sini -->
                <div class="table-responsive">
                    <table class="table table-bordered mt-3">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Pemesan</th>
                                <td><?php echo $nama_pemesan; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nomor Telepon</th>
                                <td><?php echo $nomor_telepon; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Waktu Pelaksanaan</th>
                                <td><?php echo $waktu_pelaksanaan; ?> Hari</td>
                            </tr>
                            <tr>
                                <th scope="row">Pelayanan Paket</th>
                                <td><?php echo $pelayanan_paket; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Harga Paket</th>
                                <td><?php echo $harga_paket; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah Tagihan</th>
                                <td><?php echo $jumlah_tagihan; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-light justify-content-center">
                <div class="text-center col-md-12">
                    <h5 class="font-weight-bold">Pesan Lagi?</h5>
                </div>
                <a href="#" class="btn btn-success btn-block" id="yaBtn">Ya</a>
                <button type="button" class="btn btn-danger btn-block" data-bs-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>