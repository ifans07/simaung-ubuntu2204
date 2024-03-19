<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div class="mb-3">
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;">
                    <i class="fa-brands fa-wpforms"></i> Form tambah dompet
                </h1>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('dompet/proses-tambah') ?>" method="POST">
                    <div class="mb-3">
                        <label for="namadompet" class="form-label">Nama dompet</label>
                        <input type="text" class="form-control" name="namadompet" id="namadompet"
                            placeholder="Example: BRI, Tabung, Cash">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="saldo" class="form-label">Saldo</label>
                            <input type="number" class="form-control" name="saldo" id="saldo"
                                placeholder="Masukkan angka">
                        </div>
                        <div class="col-md-6">
                            <label for="saldoawal" class="form-label">Saldo awal</label>
                            <input type="number" class="form-control" name="saldoawal" id="saldoawal"
                                placeholder="Masukkan ulang saldo">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0">Ya</option>
                            <option value="1">Tidak</option>
                        </select>
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-plus"></i> Tambah
                            dompet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>