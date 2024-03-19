<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php

$totalkeluar = 0;
foreach ($logkeluar as $log) {
    $totalkeluar += $log['jumlah'];
}

?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;">
                    <i class="fa-solid fa-edit"></i>
                    Form edit saldo
                </h1>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('dompet/proses-update-saldo') ?>" method="POST">
                    <input type="hidden" name="iddompet" value="<?= $datadompet['id_dompet'] ?>">
                    <div class="mb-3">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="number" class="form-control" name="saldo" id="saldo"
                            placeholder="Masukkan hanya angka" value="<?= $datadompet['saldo'] - $totalkeluar ?>">
                        <small class="form-text">Saldo awal: <?= $datadompet['saldo_awal'] ?></small>
                    </div>
                    <div>
                        <button class="btn btn-dark">
                            <i class="fa-solid fa-edit"></i> Update saldo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>