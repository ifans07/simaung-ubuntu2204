<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php date_default_timezone_set("Asia/Kuala_Lumpur") ?>


<div class="container">
    <div>
        <div>
            <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;">
                <i class="fa-solid fa-layer-group"></i> Kebutuhan
            </h1>
        </div>
        <div class="card p-3">
            <div class="d-flex flex-wrap justify-content-between mb-4">
                <div class="mb-2">
                    <a href="/kebutuhan/tambah" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah
                        kebutuhan</a>
                </div>
                <div class="lh-1">
                    <small class="fw-medium"><?= date('l, d-m-Y H:i:s') ?></small>
                    <div>
                        <small class="form-text">Kebutuhan sudah terbeli: <?= $countkebutuhan ?></small>
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
                    foreach ($datakebutuhan as $row) : ?>
                        <?php $totalkebutuhan += $row['harga'] ?>
                        <?php if ($row['status'] == 1) : ?>
                            <div class="mb-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#kebutuhan-<?= $row['id'] ?>" class="nav-link">
                                    <div class="d-flex align-items-center gap-3">
                                        <div>
                                            <!-- <input type="checkbox" class="form-check-input p-2 status" value="<?php //$row['id'] 
                                                                                                                    ?>"
                                        name="id" data-status="0" data-tanggal="<?php //date('l, Y-m-d H:i:s') 
                                                                                ?>"
                                        data-bs-toggle="modal" data-bs-target="#kebutuhan-<?php //$row['id'] 
                                                                                            ?>">
                                    <input type="hidden" name="status" value="0"> -->
                                            <i class="fa-solid fa-times"></i>
                                        </div>
                                        <div>
                                            <div class="lh-1 mb-2">
                                                <strong>
                                                    <?= $row['kebutuhan'] ?>
                                                </strong> -
                                                <small>Rp <?= number_format($row['harga'], 0, ',', '.') ?></small>
                                                <div class="form-text"><?= $row['catatan'] ?></div>
                                            </div>
                                            <div class="d-flex gap-3">
                                                <a href="/kebutuhan/update/<?= $row['id'] ?>" class="text-dark"><i class="fa-solid fa-edit"></i></a>
                                                <a href="/kebutuhan/hapus/<?= $row['id'] ?>" class="text-dark" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php else : ?>
                            <?php $totalkeluar += $row['harga'] ?>
                            <div class="mb-3" data-bs-toggle="modal" data-bs-target="#kebutuhan-<?= $row['id'] ?>" style="cursor: pointer">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <input type="checkbox" class="form-check-input p-2 status" value="<?= $row['id'] ?>" name="id" data-status="1" data-tanggal="0000-00-00" checked disabled>
                                        <input type="hidden" name="status" value="1">
                                    </div>
                                    <div>
                                        <div class="lh-1 mb-2">
                                            <strong class="text-decoration-line-through">
                                                <?= $row['kebutuhan'] ?>
                                            </strong> -
                                            <small>Rp <?= number_format($row['harga'], 0, ',', '.') ?></small>
                                            <div class="form-text text-decoration-line-through"><?= $row['catatan'] ?></div>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="/kebutuhan/update/<?= $row['id'] ?>" class="text-dark"><i class="fa-solid fa-edit"></i></a>
                                            <a href="/kebutuhan/hapus/<?= $row['id'] ?>" class="text-dark" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                                            <small class="form-text">Done: <?= $row['periode'] ?></small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                </form>
                <?php foreach ($datakebutuhandone as $row) : ?>
                    <?php if ($row['status'] == 1) : ?>
                        <div class="mb-3">
                            <a href="#">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <input type="checkbox" class="form-check-input p-2 status" value="<?= $row['id'] ?>" name="id" data-status="1" data-tanggal="0000-00-00" checked disabled>
                                        <input type="hidden" name="status" value="1">
                                    </div>
                                    <div>
                                        <div class="lh-1 mb-2">
                                            <strong class="text-decoration-line-through">
                                                <?= $row['kebutuhan'] ?>
                                            </strong> -
                                            <small>Rp <?= number_format($row['harga'], 0, ',', '.') ?></small>
                                            <div class="form-text text-decoration-line-through"><?= $row['catatan'] ?></div>
                                        </div>
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="/kebutuhan/update/<?= $row['id'] ?>" class="text-dark"><i class="fa-solid fa-edit"></i></a>
                                            <a href="/kebutuhan/hapus/<?= $row['id'] ?>" class="text-dark" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                                            <small class="form-text">Done: <?= $row['periode'] ?></small>
                                        </div>

                                    </div>
                                </div>
                            </a>
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

<!-- modal -->
<?php foreach ($datakebutuhan as $row) : ?>
    <div class="modal fade" id="kebutuhan-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $row['kebutuhan'] ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div>
                            <label for="dompet" class="col-form-label">Dompet</label>
                            <select name="dompet" id="dompet" class="form-control">
                                <option value="">--- Pilih dompet ---</option>
                                <?php foreach ($datadompet as $dompet) : ?>
                                    <option value="<?= $dompet['id_dompet'] ?>"><?= $dompet['nama_dompet'] ?> - Rp</option>
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
        //                 url: '/kebutuhan/proses-checked',
        //                 method: 'post',
        //                 data: {
        //                     id: dataId,
        //                     status: dataStatus,
        //                     'tgl': dataTgl
        //                 },
        //                 dataType: 'json',
        //                 success: (response) => {
        //                     $('body').load('/kebutuhan')
        //                 }
        //             })
        //         }
        //     }
        // })
    })
</script>

<?= $this->endSection() ?>