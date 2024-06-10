<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

    $jmlHari = date('t', strtotime(date('Y-m-01')));

?>

<section>
    <div class="container">
        <?php if(empty($gaji)): ?>
            <div class="alert alert-info">
                Gaji belum di set! Silakan set melalui form di bawah
            </div>
        <?php else: ?>
        <div class="mb-3">
            <div>
                <h3>Data Gaji</h3>
            </div>
            <div class="alert alert-info d-flex justify-content-between">
                <div class="d-flex flex-column">
                    <small>Nominal Gaji: <span class="fw-medium"><?= number_format($gaji[0]['gaji'],0,',','.') ?></span></small>
                    <small>Tanggal Gajian: <span class="fw-medium"><?= $gaji[0]['tanggal_gajian'] ?></span></small>
                    <small>Payroll: <span class="fw-medium"><?= $gaji[0]['nama_dompet'] ?></span></small>
                </div>
                <div class="align-self-center">
                    <a href="<?= base_url('user/gaji/update/'.$gaji[0]['slug']) ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit" class="badge text-bg-dark p-2"><i class="fa-solid fa-edit"></i></a>
                    <a href="<?= base_url('user/gaji/delete/'.$gaji[0]['slug']) ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus" class="badge text-bg-danger p-2" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash-alt"></i></a>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(empty($gaji)): ?>
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i class="fa-solid fa-plus"></i> Input Gaji</h3>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('user/gaji/proses-tambah') ?>" method="post">
                <?= csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="gaji" class="form-label">Gaji</label>
                            <div class="input-group">
                                <span class="input-group-text fw-medium">Rp</span>
                                <input type="text" class="form-control jml-keluar" name="gaji" id="gaji" placeholder="Masukkan angka">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jmlhari" class="form-label">Tanggal Gajian</label>
                            <select name="jmlhari" id="jmlhari" class="form-select">
                                <option value="">--- Pilih Tanggal Gajian ---</option>
                                <?php for($i=1;$i<=$jmlHari;$i++): ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dompet" class="form-label">Dompet</label>
                            <select name="dompet" id="dompet" class="form-select">
                                <option value="">--- Pilih Dompet ---</option>
                                <?php foreach($dompet as $row): ?>
                                    <option value="<?= $row['id_dompet'] ?>"><?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?></option>
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
        <?php else: ?>
            <div class="alert alert-warning">
                <small>Gaji hanya bisa di input sekali!</small>
            </div>
        <?php endif ?>
        <div>
            <div>
                <h3><i class="fa-solid fa-list"></i> Riwayat Gaji</h3>
            </div>
            <div class="">
                
                <ul class="list-group">
                        <?php foreach($riwayatgajiuser as $row): ?>
                        <li class="list-group-item">
                            <div>
                                <span class="fw-medium">Rp <?= number_format($row['gaji'],0,',','.') ?></span>
                            </div>
                            <div>
                                <span class="form-text">Gaji bulan <?= date('F', strtotime($row['tanggal'])) ?> - <?= $row['tanggal'] ?>(<?= $row['nama_dompet'] ?>)</span>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>

            </div>
        </div>

    </div>
</section>

<?= $this->endSection() ?>