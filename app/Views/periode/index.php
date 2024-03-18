<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded fw-medium fs-1 p-3" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-calendar"></i> Penghitung periode</h3>
            </div>
            <div class="card p-3">
                <div class="mb-3">
                    <a href="/periode/tambah" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah data</a>
                    <div class="float-end">
                        <small class="fw-medium"><?= date('l d-m-Y H:i:s') ?></small>
                    </div>
                </div>

                <?php foreach($dataperiode as $row): ?>
                <div class="d-flex mb-3">
                    <div class="align-self-center me-3">
                        <i class="fa-solid fa-dot-circle"></i>
                    </div>
                    <div>
                        <div
                            class="lh-1 mb-1">
                            <small class="fw-medium"><?= $row['nama_aktivitas'] ?></small>
                            -
                            <small><?= $row['tanggal_mulai'] ?></small>
                            <div class="">
                                <small class="form-text"><?= $row['catatan'] ?></small>
                            </div>
                        </div>
                        <div>
                            <a href="/penggunaan/update/<?= $row['id'] ?>" class="badge text-bg-secondary"><i class="fa-solid fa-pen"></i></a>
                            <a href="/penggunaan/hapus/<?= $row['id'] ?>" class="badge text-bg-danger"><i class="fa-solid fa-trash-alt"></i></a>
                            <a href="" class="badge text-bg-primary"><i class="fa-solid fa-check"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <hr>
                <?php foreach ($dataperiode as $row) : ?>
                <div class="d-flex gap-2 mb-2">
                    <div class="align-self-center">
                        <i class="fa-solid <?= ($row['status_penghitung'] == 0) ? 'fa-times' : 'fa-check'; ?>"></i>
                    </div>
                    <div class="lh-1">
                        <div
                            class="lh-1 mb-1 <?= ($row['status_penghitung'] == 0) ? '' : 'text-decoration-line-through'; ?>">
                            <small class="fw-medium"><?= $row['nama_aktivitas'] ?></small> -
                            <small><?= $row['tanggal_mulai'] ?></small>
                            <div class="">
                                <small class="form-text"><?= $row['catatan'] ?></small>
                            </div>
                        </div>
                        <div>
                            <?php
                                $tglawal = date_create($row['tanggal_mulai']);
                                $tglakhir = ($row['status_penghitung'] == 0) ? date_create(date('Y-m-d')) : date_create($row['tanggal_selesai']);
                                // $tglakhir = date_create(date('Y-m-d'));
                                $diff = date_diff($tglawal, $tglakhir);
                                ?>
                            <small class="">Periode: <span class="fw-medium"><?= $diff->days ?></span> hari</small>
                            - <a href="/periode/update/<?= $row['id'] ?>"
                                class="badge <?= ($row['status_penghitung'] == 0) ? 'text-bg-primary' : 'text-bg-dark' ?>"><i
                                    class="fa-solid fa-pen"></i></a> <a href="/periode/hapus/<?= $row['id'] ?>"
                                class="badge <?= ($row['status_penghitung'] == 0) ? 'text-bg-danger' : 'text-bg-dark' ?>"
                                onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                            <?php if ($row['status_penghitung'] == 0) : ?><a href=""
                                class="badge <?= ($row['status_penghitung'] == 0) ? 'text-bg-success' : 'text-bg-dark' ?>"
                                data-bs-toggle="modal" data-bs-target="#periode-<?= $row['id'] ?>"><i
                                    class="fa-solid fa-check"></i></a><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="d-flex gap-2">
                    <div class="align-self-center">
                        <i class="fa-solid fa-times"></i>
                    </div>
                    <div class="lh-1">
                        <div class="lh-1 mb-1">
                            <small class="fw-medium">Panjangin rambut</small> - <small>2023-10-10</small>
                            <div class="form-text">
                                Catatan kecil rara
                            </div>
                        </div>
                        <div>
                            <small class="form-text">Periode: <span class="fw-medium">12</span> hari</small> - <a
                                href="" class="badge text-bg-primary"><i class="fa-solid fa-pen"></i></a> <a href=""
                                class="badge text-bg-danger"><i class="fa-solid fa-trash-alt"></i></a> <a href=""
                                class="badge text-bg-success"><i class="fa-solid fa-check"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<?php $i = 0;
foreach ($dataperiode as $row) : ?>
<?php
    $tglawal = date_create($row['tanggal_mulai']);
    $tglakhir = date_create(date('Y-m-d'));
    $diff = date_diff($tglawal, $tglakhir);
    ?>
<div class="modal fade" id="periode-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/periode/proses-done" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="modal-header">
                    <h1 class="modal-title fs-6 fw-normal" id="exampleModalLabel">Atur tanggal habis barang!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col-md-12 lh-1">
                            <label for="" class="fw-medium"><?= $row['nama_aktivitas'] ?></label>
                            <div>
                                <small>Pemakaian barang sudah <span class="fw-medium"><?= $diff->days ?></span>
                                    hari</small>
                            </div>
                        </div>
                        <hr>
                        <div class="col">
                            <label for="tgl_mulai" class="form-label">Tanggal beli</label>
                            <input type="date" class="form-control tgl_mulai" name="tgl_mulai"
                                value="<?= $row['tanggal_mulai'] ?>" readonly id="tgl_mulai" disabled>
                        </div>
                        <div class="col">
                            <label for="tgl_selesai" class="form-label">Tanggal habis</label>
                            <input type="date" class="form-control tgl_selesai" name="tgl_selesai" id="tgl_selesai"
                                value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="tampilSelisih">
                            <small class="text-info"><span class="fw-medium"><?= $row['nama_aktivitas'] ?></span> habis
                                dalam <span class="fw-medium"><?= $diff->days ?></span> hari pemakaian</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="fa-solid fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
let tglawal = document.querySelectorAll('.tgl_mulai')
let tglakhir = document.querySelectorAll('.tgl_selesai')
let tampilDiffDay = document.querySelectorAll('.tampilSelisih')
tglakhir.forEach((tgl, index) => {
    tgl.addEventListener('change', (e, d) => {
        let date1 = new Date(tglawal[index].value)
        let date2 = new Date(tgl.value)
        let diffTime = date2.getTime() - date1.getTime()
        let diffDays = diffTime / (1000 * 3600 * 24)
        tampilDiffDay[index].innerHTML =
            `<small class="text-info">Pemakaian akan di set habis dalam <span class="fw-medium">${diffDays}</span> hari</small>`
    })
})
</script>

<?= $this->endSection() ?>