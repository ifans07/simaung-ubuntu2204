<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php date_default_timezone_set('Asia/Kuala_Lumpur') ?>
<?php
$hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
$h = date('w');

?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i class="fa-brands fa-plus"></i>
                    Form tambah target</h1>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('target/proses-tambah') ?>" method="POST">
                    <div class="mb-3">
                        <label for="target" class="form-label">Nama target</label>
                        <input type="text" class="form-control" name="target" id="target"
                            placeholder="Ketik target yang bermanfaat">
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Biaya</label>
                        <input type="number" class="form-control" name="cost" id="cost"
                            placeholder="Biaya yang diperlukan">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-4">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="text" name="hari" readonly class="form-control-plaintext"
                                value="<?= date('l') ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="time" class="form-label">Waktu/ Jam</label>
                            <input type="time" class="form-control" id="time" name="time" value="<?= date('H:i:s') ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan"
                            placeholder="Sisipkan catatan untuk diingat!">
                    </div>
                    <div>
                        <button class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah target</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>