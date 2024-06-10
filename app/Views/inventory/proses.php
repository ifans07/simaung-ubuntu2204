<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

$hari = [
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu',
    'Sunday' => 'Minggu'
];

?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-plus"></i>
                    Tambah</h3>
            </div>
            <div class="card p-3">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="barang" name="barang" placeholder="Contoh: Shampoo Lifebuoy (maksimal 2 kata)" value="<?= $barang['nama_barang'] ?>" readonly disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text fw-medium">Rp</span>
                                <input type="text" class="form-control jml-keluar" name="harga" id="harga" placeholder="Masukkan angka" value="<?= number_format($barang['harga'],0,',','.') ?>" readonly disabled>
                            </div>
                        </div>
                    </div>
                    <div>
                        <ul class="nav nav-underline">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?= base_url('/') ?>" role="tab"><i class="fa-solid fa-arrow-left"></i>
                                    Kembali</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark active" data-bs-toggle="list" href="#kebutuhan" role="tab">Kebutuhan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" data-bs-toggle="list" href="#target" role="tab">Target</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark disabled" data-bs-toggle="list" href="#periode" role="tab">Periode</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark disabled" data-bs-toggle="list" href="#penggunaan" role="tab">Lama Penggunaan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kebutuhan">
                            <form action="<?= base_url('inventory/proses-addkebutuhan') ?>" method="post">
                            <?= csrf_field() ?>
                                <input type="hidden" name="barang" value="<?= $barang['nama_barang'] ?>">
                                <input type="hidden" name="harga" value="<?= $barang['harga'] ?>">
                                <div class="d-flex">
                                    <span class="form-label align-self-end"><?= $hari[date('l')] ?>, </span>&nbsp;<input type="text" readonly class="form-control-plaintext" name="tanggal" value="<?= date('Y-m-d H:i') ?>">
                                    <input type="hidden" name="status" value="0">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Dompet</label>
                                    <select name="dompet" id="" class="form-select">
                                        <option value="">--- Pilih Dompet ---</option>
                                        <?php foreach($dompet as $row): ?>
                                        <?php if($row['id_dompet'] != 0): ?>
                                            <option value="<?= $row['id_dompet'].' '.$row['saldo'] ?>"><?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="catatan" class="form-label">Catatan</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="butuhCheck" name="status">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Status Terbeli</label>
                                        </div>
                                    </div>
                                    <textarea name="catatan" id="catatan" rows="3" class="form-control"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-dark" type="submit"><i class="fa-solid fa-save"></i> Simpan data</button>
                                    <button class="btn btn-outline-dark" type="reset"><i class="fa-solid fa-times"></i>
                                        Cancel</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="target">
                        <form action="" method="post">
                        <?= csrf_field() ?>
                            <input type="hidden" name="barang" value="<?= $barang['nama_barang'] ?>">
                            <input type="hidden" name="harga" value="<?= $barang['harga'] ?>">
                            <div>
                                <input type="text" readonly class="form-control-plaintext" value="<?= $hari[date('l')].", ".date('Y-m-d H:i:s') ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Dompet</label>
                                <select name="dompet" id="dompet" class="form-select">
                                    <option value="">--- Pilih Dompet ---</option>
                                    <?php foreach($dompet as $row): ?>
                                    <?php if($row['id_dompet']): ?>
                                        <option value="<?= $row['id_dompet'] ?>"><?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?></option>
                                    <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="butuhCheck" name="status">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Status Terbeli</label>
                                    </div>
                                </div>
                                <textarea name="catatan" id="catatan" rows="3" class="form-control"></textarea>
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
        </div>
    </div>
</section>

<?= $this->endSection() ?>