<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;">
                    <i class="fa-solid fa-pen"></i>
                    Form edit dompet
                </h1>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('dompet/proses-update') ?>" method="POST">
                    <input type="hidden" name="iddompet" value="<?= $datadompet['id_dompet'] ?>">
                    <div class="mb-3">
                        <label for="namadompet" class="form-label">Nama dompet</label>
                        <input type="text" class="form-control" name="namadompet" id="namadompet"
                            placeholder="Example: BRI, Tabung, Cash" value="<?= $datadompet['nama_dompet'] ?>">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="saldo" class="form-label">Saldo</label>
                            <input type="number" class="form-control" name="saldo" id="saldo"
                                placeholder="Masukkan angka" value="<?= $datadompet['saldo'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="saldoawal" class="form-label">Saldo awal</label>
                            <input type="number" class="form-control" name="saldoawal" id="saldoawal"
                                placeholder="Masukkan ulang saldo" value="<?= $datadompet['saldo_awal'] ?>" disabled>
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
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-edit"></i> Update
                            dompet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>