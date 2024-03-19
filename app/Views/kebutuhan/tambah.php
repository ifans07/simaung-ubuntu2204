<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i
                        class="fa-brands fa-wpforms"></i>
                    Form tambah kebutuhan</h1>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('kebutuhan/proses-tambah') ?>" method="POST">
                    <div class="mb-3">
                        <label for="kebutuhan" class="form-label">Nama kebutuhan</label>
                        <input type="text" class="form-control" name="kebutuhan" id="kebutuhan"
                            placeholder="Barang/ Hal yang dibutuhkan">
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Biaya</label>
                        <input type="number" class="form-control" name="cost" id="cost"
                            placeholder="Harga dari kebutuhan">
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan"
                            placeholder="Sisipkan catatan untuk diingat!">
                    </div>
                    <div>
                        <button class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah kebutuhan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>