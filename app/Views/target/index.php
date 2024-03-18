<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php date_default_timezone_set("Asia/Kuala_Lumpur") ?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;">
                    <i class="fa-solid fa-bullseye"></i> Target
                </h1>
            </div>
            <div class="card p-3">
                <div class="d-flex flex-wrap justify-content-between mb-4">
                    <div class="mb-2">
                        <a href="/target/tambah" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah
                            target</a>
                    </div>
                    <div class="lh-1">
                        <small class="fw-medium"><?= date('l, d-m-Y H:i:s') ?></small>
                        <div>
                            <small class="form-text">Target terbeli: <?= $counttarget ?></small>
                        </div>
                    </div>
                </div>
                <div>
                    <form action="/kebutuhan/proses-update-json" method="post" id="formname">
                        <?php
                        $totalkebutuhan = 0;
                        $totalkeluar = 0;
                        $sisa = 0;
                        $gaji = 12800000;
                        foreach ($rows as $row) : ?>
                        <?php $totalkebutuhan += $row['cost'] ?>
                        <?php if ($row['status'] == 1) : ?>
                        <div class="mb-3">
                            <a href="" data-bs-toggle="modal" data-bs-target="#target-<?= $row['id'] ?>"
                                class="nav-link">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <i class="fa-solid fa-times text-danger"></i>
                                    </div>
                                    <div>
                                        <div class="lh-1 mb-2">
                                            <strong>
                                                <?= $row['target'] ?>
                                            </strong> -
                                            <small>Rp <?= number_format($row['cost'], 0, ',', '.') ?></small>
                                            <div class="form-text"><?= $row['catatan'] ?></div>
                                        </div>
                                        <div class="d-flex">
                                            <a href="/target/update/<?= $row['id'] ?>"
                                                class="badge text-bg-primary me-1"><i class="fa-solid fa-edit"></i></a>
                                            <a href="/target/hapus/<?= $row['id'] ?>" class="badge text-bg-danger"
                                                onclick="return confirm('Yakin?')"><i class="fa-solid fa-x"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>

                    </form>
                    <hr>
                    <?php foreach ($datatargetdone as $row) : ?>
                    <?php
                        $tgl1mulai = explode(', ', $row['tanggal_mulai']);
                        $tgl2mulai = explode(' ', $tgl1mulai[1]);
                        $tgl1selesai = explode(', ', $row['tanggal_selesai']);
                        $tgl2selesai = explode(' ', $tgl1selesai[1]);
                        $tglawal = date_create($tgl1mulai[1]);
                        $tglakhir = date_create($tgl1selesai[1]);

                        $diff = date_diff($tglawal, $tglakhir);
                        $totalkeluar += $row['cost'];
                        if ($row['status'] == 0) :
                        ?>
                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <i class="fa-solid fa-check text-success"></i>
                            </div>
                            <div>
                                <div class="lh-1 mb-2">
                                    <strong class="text-decoration-line-through fw-medium">
                                        <?= $row['target'] ?>
                                    </strong> -
                                    <small class="text-decoration-line-through">Rp
                                        <?= number_format($row['cost'], 0, ',', '.') ?></small>
                                    <div class="form-text text-decoration-line-through"><?= $row['catatan'] ?></div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="/target/update/<?= $row['id'] ?>" class="text-dark"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="/target/hapus/<?= $row['id'] ?>" class="text-dark"
                                        onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                                    <div class="d-flex flex-column lh-1">
                                        <small class="form-text">Mulai:
                                            <?= date('l', strtotime($tgl1mulai[1])) . ", " . $tgl1mulai[1] ?></small>
                                        <small class="form-text">Done: <?= $row['tanggal_selesai'] ?> (<span
                                                class="fw-medium"><?= $row['nama_dompet'] ?></span>)</small>
                                    </div>
                                </div>
                                <div>
                                    <small class="form-text">Target ini selesai dalam <span
                                            class="fw-medium"><?= $diff->days ?></span> hari</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>

                </div>
                <hr>
                <div>
                    <div class="lh-sm">
                        <table>
                            <tr class="fw-medium">
                                <td>Total kebutuhan</td>
                                <td>:</td>
                                <td class="text-truncate">&nbsp;Rp
                                    <?= number_format($totalkebutuhan, 0, ',', '.') ?>/bulan
                                </td>
                            </tr>
                            <tr>
                                <td>Total keluar</td>
                                <td>:</td>
                                <td>&nbsp;Rp <?= number_format($totalkeluar, 0, ',', '.') ?>/bulan</td>
                            </tr>
                            <tr>
                                <td>Gaji</td>
                                <td>:</td>
                                <td>&nbsp;Rp 12.800.000/bulan</td>
                            </tr>
                            <tr class="fw-medium">
                                <td>Sisa</td>
                                <td>:</td>
                                <?php $sisa = $gaji - $totalkeluar ?>
                                <td class="text-truncate">&nbsp;Rp <?= number_format($sisa, 0, ',', '.') ?>/bulan</td>
                            </tr>
                        </table>
                        <!-- <p class="fw-medium m-0 p-0">Total kebutuhan: Rp 2.400.00/bulan</p>
                    <p class="p-0 m-0">Total keluar: Rp 1.400.000</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal -->
<?php foreach ($rows as $row) : ?>
<div class="modal fade" id="target-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/target/proses-done" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="modal-header">
                    <div class="lh-1">
                        <div class="d-flex align-items-center">
                            <h1 class="modal-title fs-5 fw-medium" id="exampleModalLabel"><?= $row['target'] ?></h1>
                            <input type="hidden" name="target" value="<?= $row['target'] ?>">
                        </div>
                        <div class="form-text text-truncate">Rp <?= number_format($row['cost'], 0, ',', '.') ?> -
                            <?= $row['catatan'] ?>
                        </div>
                        <input type="hidden" value="<?= $row['cost'] ?>" name="cost">
                        <input type="hidden" value="<?= $row['catatan'] ?>" name="catatan">
                        <input type="hidden" name="status" value="0">
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" readonly class="form-control-plaintext" value="<?= date('l, Y-m-d H:i:s') ?>"
                            name="tanggal">
                    </div>
                    <div>
                        <label for="dompet" class="col-form-label">Dompet</label>
                        <select name="dompet" id="dompet" class="form-control">
                            <option value="">--- Pilih dompet ---</option>
                            <?php foreach ($datadompet as $dompet) : ?>

                            <option value="<?= $dompet['id_dompet'] ?>"><?= $dompet['nama_dompet'] ?> -

                                <?php foreach ($logkeluar as $log) : ?>
                                <?php if ($dompet['nama_dompet'] == $log['nama_dompet']) : ?>
                                Rp
                                <?= number_format($dompet['saldo'] - $log['jumlah'], 0, ',', '.') ?>
                                <?php endif; ?>
                                <?php endforeach; ?>

                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script>
$(document).ready(() => {

    // $('.status').on('click', (e) => {
    //     let dataStatus = e.target.getAttribute('data-status')
    //     let dataId = e.target.value
    //     $.ajax({
    //         url: "/kebutuhan/proses-update-json/" + dataId + "/" + dataStatus,
    //         method: "GET",
    //         // data: {
    //         //     id: dataId,
    //         //     status: dataStatus
    //         // },
    //         dataType: "JSON",
    //         success: (response) => {
    //             console.log(response)
    //         }
    //     })
    // })



    // let html = ''
    // $('.status').on('click', (e) => {
    //     let data = document.querySelectorAll('.status');
    //     let dataStatus = e.target.getAttribute('data-status')
    //     let dataTgl = e.target.getAttribute('data-tanggal')
    //     let dataId = e.target.value
    //     console.log(dataTgl)
    //     for (let i = 1; i <= data.length; i++) {
    //         if (dataId == i) {
    //             $.ajax({
    //                 url: '/target/proses-checked',
    //                 method: 'post',
    //                 data: {
    //                     id: dataId,
    //                     status: dataStatus,
    //                     'tgl': dataTgl
    //                 },
    //                 dataType: 'json',
    //                 success: (response) => {
    //                     $('body').load('/target')
    //                 }
    //             })
    //         }
    //     }
    // })
})
</script>

<?= $this->endSection() ?>