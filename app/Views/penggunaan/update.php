<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-pen"></i>
                    Edit Barang</h3>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('penggunaan/proses-update') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="mb-3">
                        <label for="barang" class="form-label">Barang</label>
                        <input type="text" class="form-control" name="barang" id="barang"
                            placeholder="Kegiatan dengan periode waktu" value="<?= $data['nama_barang'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="2"
                            class="form-control"><?= $data['catatan'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal mulai</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            value="<?= $data['tanggal_mulai'] ?>">
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-save"></i> Simpan
                            perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>