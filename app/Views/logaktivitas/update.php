<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i class="fa-solid fa-edit"></i>
                    Form
                    edit aktivitas</h1>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('riwayat/proses-update') ?>" method="post">
                    <input type="hidden" name="id" value="<?= $log['id'] ?>">
                    <div class="mb-3">
                        <label for="log" class="form-label">Aktivitas</label>
                        <input type="text" class="form-control" id="log" name="log"
                            value="<?= $log['log_aktivitas'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah"
                            placeholder="Nominal yang keluar" value="<?= $log['jumlah'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="ex:"
                            value="<?= $log['tanggal'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="dompet" class="form-label">Dompet</label>
                        <select name="dompet" id="dompet" class="form-control">
                            <?php foreach ($dompet as $row) : ?>
                            <?php if ($row['id_dompet'] == $log['id_dompet']) : ?>
                            <option value="<?= $log['id_dompet'] ?>" selected><?= $row['nama_dompet'] ?></option>
                            <?php else : ?>
                            <option value="<?= $row['id_dompet'] ?>"><?= $row['nama_dompet'] ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" id="catatan" name="catatan"
                            placeholder="ketik sesuatu untuk diingat" value="<?= $log['catatan'] ?>">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-edit"></i> update
                            Aktivitas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>