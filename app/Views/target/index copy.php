<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php date_default_timezone_set("Asia/Kuala_Lumpur") ?>

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
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <input type="checkbox" class="form-check-input p-2 status" value="<?= $row['id'] ?>"
                                    name="id" data-status="0" data-tanggal="<?= date('l, Y-m-d H:i:s') ?>">
                                <input type="hidden" name="status" value="0">
                            </div>
                            <div>
                                <div class="lh-1 mb-2">
                                    <strong>
                                        <?= $row['target'] ?>
                                    </strong> -
                                    <small>Rp <?= number_format($row['cost'], 0, ',', '.') ?></small>
                                    <div class="form-text"><?= $row['catatan'] ?></div>
                                </div>
                                <div class="d-flex gap-3">
                                    <a href="/target/update/<?= $row['id'] ?>" class="text-dark"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="/target/hapus/<?= $row['id'] ?>" class="text-dark"
                                        onclick="return confirm('Yakin?')"><i class="fa-solid fa-x"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php else : ?>
                    <?php $totalkeluar += $row['cost'] ?>
                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <input type="checkbox" class="form-check-input p-2 status" value="<?= $row['id'] ?>"
                                    name="id" data-status="1" data-tanggal="0000-00-00" checked>
                                <input type="hidden" name="status" value="1">
                            </div>
                            <div>
                                <div class="lh-1 mb-2">
                                    <strong class="text-decoration-line-through">
                                        <?= $row['target'] ?>
                                    </strong> -
                                    <small>Rp <?= number_format($row['cost'], 0, ',', '.') ?></small>
                                    <div class="form-text text-decoration-line-through"><?= $row['catatan'] ?></div>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <a href="/target/update/<?= $row['id'] ?>" class="text-dark"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="/target/hapus/<?= $row['id'] ?>" class="text-dark"
                                        onclick="return confirm('Yakin?')"><i class="fa-solid fa-x"></i></a>
                                    <small class="form-text">Done: <?= $row['tanggal_selesai'] ?></small>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>

                </form>
            </div>
            <hr>
            <div>
                <div class="lh-sm">
                    <table>
                        <tr class="fw-medium">
                            <td>Total kebutuhan</td>
                            <td>:</td>
                            <td class="text-truncate">&nbsp;Rp <?= number_format($totalkebutuhan, 0, ',', '.') ?>/bulan
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

    let html = ''
    $('.status').on('click', (e) => {
        let data = document.querySelectorAll('.status');
        let dataStatus = e.target.getAttribute('data-status')
        let dataTgl = e.target.getAttribute('data-tanggal')
        let dataId = e.target.value
        console.log(dataTgl)
        for (let i = 1; i <= data.length; i++) {
            if (dataId == i) {
                $.ajax({
                    url: '/target/proses-checked',
                    method: 'post',
                    data: {
                        id: dataId,
                        status: dataStatus,
                        'tgl': dataTgl
                    },
                    dataType: 'json',
                    success: (response) => {
                        $('body').load('/target')
                    }
                })
            }
        }
    })
})
</script>

<?= $this->endSection() ?>