<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

    $jmlHari = date('t', strtotime(date('Y-m-01')));

?>

<section>
    <div class="container">

        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i class="fa-solid fa-plus"></i> Input Gaji</h3>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('user/gaji/proses-update') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="idgaji" value="<?= $gaji['id'] ?>">
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="gaji" class="form-label">Gaji</label>
                            <div class="input-group">
                                <span class="input-group-text fw-medium">Rp</span>
                                <input type="text" class="form-control jml-keluar" name="gaji" id="gaji" placeholder="Masukkan angka" value="<?= number_format($gaji['gaji'], 0,',','.') ?>">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jmlhari" class="form-label">Tanggal Gajian</label>
                            <select name="jmlhari" id="jmlhari" class="form-select">
                                <option value="">--- Pilih Tanggal Gajian ---</option>
                                <?php for($i=1;$i<=$jmlHari;$i++): ?>
                                    <?php if($gaji['tanggal_gajian'] == $i): ?>
                                        <option value="<?= $i ?>" selected><?= $i ?></option>
                                    <?php else: ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endif ?>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dompet" class="form-label">Dompet</label>
                            <select name="dompet" id="dompet" class="form-select">
                                <option value="">--- Pilih Dompet ---</option>
                                <?php foreach($dompet as $row): ?>
                                    <?php if($gaji['iddompet'] == $row['id_dompet']): ?>
                                    <option value="<?= $row['id_dompet'] ?>" selected><?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?></option>
                                    <?php else: ?>
                                    <option value="<?= $row['id_dompet'] ?>"><?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
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