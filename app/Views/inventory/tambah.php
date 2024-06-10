<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-plus"></i>
                    Tambah</h3>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('inventory/proses-tambah') ?>" method="post">
                <?= csrf_field() ?>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="barang" name="barang" placeholder="Contoh: Shampoo Lifebuoy (maksimal 2 kata)">
                        </div>
                        <div class="col-md-6">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text fw-medium">Rp</span>
                                <input type="text" class="form-control jml-keluar" name="harga" id="harga" placeholder="Masukkan angka">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" rows="3" class="form-control"></textarea>
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-save"></i> Simpan data</button>
                        <button class="btn btn-outline-dark" type="reset"><i class="fa-solid fa-times"></i>
                            Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>