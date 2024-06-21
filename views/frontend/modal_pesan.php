<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light text-black">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan <b id="modalNamaPaket"></b></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="simpan_pemesanan.php" method="POST">
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama_pemesan" class="form-label">Nama Pemesan <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nomor_telepon" class="form-label">Nomor Telepon <span style="color: red">*</span></label>
                                    <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="" required maxlength="16">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="waktu_pelaksanaan" class="form-label">Waktu Pelaksanaan <small><i>(hari)</i></small> <span style="color: red">*</span></label>
                                    <input type="number" min="1" class="form-control" id="waktu_pelaksanaan" name="waktu_pelaksanaan" placeholder="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jumlah_peserta" class="form-label">Jumlah Peserta <span style="color: red">*</span></label>
                                    <input type="number" min="1" class="form-control" id="jumlah_peserta" name="jumlah_peserta" placeholder="" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pelayanan_paket" class="form-label">Pelayanan Paket <span style="color: red">*</span></label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="penginapan" id="penginapan">
                                        <label class="form-check-label" for="penginapan">
                                            Penginapan (<span id="modalHargaPenginapan"></span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="transportasi" id="transportasi">
                                        <label class="form-check-label" for="transportasi">
                                            Transportansi (<span id="modalHargaTransportasi"></span>)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="makanan" id="makanan">
                                        <label class="form-check-label" for="makanan">
                                            Makanan (<span id="modalHargaMakanan"></span>)
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="harga_paket" class="form-label">Harga Paket</label>
                                    <input type="number" class="form-control" id="harga_paket" name="harga_paket" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
                                    <input type="number" class="form-control" name="jumlah_tagihan" id="jumlah_tagihan" readonly>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" id="hiddenPenginapan" name="hiddenPenginapan">
                <input type="hidden" id="hiddenTransportasi" name="hiddenTransportasi">
                <input type="hidden" id="hiddenMakanan" name="hiddenMakanan">
                <input type="hidden" id="idPaketWisata" name="idPaketWisata">

                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Pesan Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>