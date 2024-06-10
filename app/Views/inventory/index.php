<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php $total=0; ?>
<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;">
                    <i class="fa-solid fa-box-open"></i> Inventory
                </h1>
            </div>
            <div>
                <div class="my-3">
                    <a href="<?= base_url('inventory/tambah') ?>" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah data</a>
                </div>
                <?php if(empty($inventory)): ?>
                    <div class="alert alert-info">
                        <small class="form-text">Belum ada data!</small>
                    </div>
                <?php endif ?>
                <ul class="list-group">
                    <?php foreach($inventory as $row): ?>
                        <?php $total+=$row['harga'] ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('inventory/proses/'.$row['slug']) ?>" class="text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="text-center">
                                        <?php
                                            $nama = explode(' ', $row['nama_barang']);
                                            $inisial = '';
                                            foreach ($nama as $kata) {
                                                $inisial .= substr($kata, 0, 1);
                                            }
                                            ?>
                                        <span class="badge text-bg-dark p-3 fs-6 fw-medium" style="width: 55px;"><?= strtoupper($inisial) ?></span>
                                    </div>
                                    <div class="lh-1">
                                        <span class="fw-medium fs-6 text-dark"><?= $row['nama_barang'] ?></span>
                                        <div class="mb-2 catatan-piutang">
                                            <small class="form-text" style=""><?= $row['catatan'] ?></small>
                                        </div>
                                        <div>
                                            <span class="fw-medium form-text text-dark">Rp <?= number_format($row['harga'],0,',','.') ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="align-self-center flex-column">
                                    <span class="cta-tambah"><a href="<?= base_url('inventory/proses-delete/'.$row['slug']) ?>" class="badge text-bg-danger fw-medium fs-6 p-2" onclick="return confirm('yakin hapus?')"><i class="fa-solid fa-trash"></i></a></span>
                                    <span class=""><a href="<?= base_url('inventory/update/'.$row['slug']) ?>" class="badge text-bg-secondary fw-medium fs-6 p-2 cta-edit"><i class="fa-solid fa-edit"></i></a></span>
                                </div>
                            </div>
                        </a>
                        </li>
                    <?php endforeach ?>
                </ul>
                <div class="card p-3">
                    <small class="ms-5">Total: <span class="fw-medium">Rp<?= number_format($total, 0, ',', '.') ?></span></small>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>