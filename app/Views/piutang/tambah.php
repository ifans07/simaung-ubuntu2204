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
                <form action="<?= base_url('piutang/proses-tambah') ?>" method="post">
                    <div class="mb-3">
                        <label for="peminjam" class="form-label">Peminjam</label>
                        <input type="text" class="form-control" id="peminjam" name="peminjam"
                            placeholder="Kepada siapa anda meminjamkan? (nama depan & nama belakang">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Rp 0">
                        </div>
                        <div class="col-md-6">
                            <label for="dompet" class="form-label">Dompet</label>
                            <select name="dompet" id="dompet" class="form-select" aria-label="Default select example">
                                <option value="">Pilih dompet</option>
                                <?php foreach ($datadompet as $row) : ?>
                                <option value="<?= $row['id_dompet'] ?> <?= $row['saldo'] ?>">
                                    <?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" class="form-control" name="waktu" id="waktu"
                                value="<?= date('H:i:s') ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan"
                            placeholder="Untuk apa itu?">
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