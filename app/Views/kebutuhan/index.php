<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php date_default_timezone_set("Asia/Kuala_Lumpur") ?>

<?php

$jmlkebutuhandone = [];
foreach ($logkebutuhan as $row) {
    if ($row['status'] == 4) {
        $jmlkebutuhandone[] = $row['status'];
    }
}

?>

<section>
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
                            <small class="form-text">Kebutuhan: <?= count($datakebutuhan) ?></small>
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
                        <?php //if ($row['status'] == 1) : ?>
                        <div class="mb-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#kebutuhan-<?= $row['id'] ?>"
                                class="nav-link">
                                <div class="d-flex align-items-center gap-3">
                                    <div>
                                        <i class="fa-solid fa-dot-circle"></i>
                                    </div>
                                    <div>
                                        <div class="lh-1 mb-2">
                                            <strong>
                                                <?= $row['kebutuhan'] ?>
                                            </strong> -
                                            <small>Rp <?= number_format($row['harga'], 0, ',', '.') ?></small>
                                            <div class="form-text"><?= $row['catatan'] ?></div>
                                        </div>
                                        <div class="d-flex">
                                            <a href="/kebutuhan/update/<?= $row['id'] ?>"
                                                class="badge text-bg-primary me-1"><i class="fa-solid fa-edit"></i></a>
                                            <a href="/kebutuhan/hapus/<?= $row['id'] ?>" class="badge text-bg-danger"
                                                onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php //endif; ?>
                        <?php endforeach; ?>

                    </form>
                </div>
                <hr>

                <!-- kebutuhan done update -->
                <div>
                    <div class="lh-1 float-end">
                        <small class="fw-medium"><?= date('l, d-m-Y H:i:s') ?></small>
                        <div>
                            <small class="form-text">Kebutuhan terbeli: <?= count($jmlkebutuhandone) ?></small>
                        </div>
                    </div>
                    <?php foreach ($logkebutuhan as $log) : ?>
                    <?php if ($log['status'] == 4) : ?>
                    <div class="mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <div>
                                <i class="fa-solid fa-check text-success"></i>
                            </div>
                            <div>
                                <div class="lh-1 mb-2">
                                    <strong class="text-decoration-line-through">
                                        <?= $log['log_aktivitas'] ?>
                                    </strong> -
                                    <small class="text-decoration-line-through">Rp
                                        <?= number_format($log['jumlah'], 0, ',', '.') ?></small>
                                    <div class="form-text text-decoration-line-through"><?= $log['catatan'] ?></div>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="/kebutuhan/update/<?= $log['id'] ?>" class="text-dark"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="/kebutuhan/hapus/<?= $log['id'] ?>" class="text-dark"
                                        onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                                    <small class="form-text">Done:
                                        <?= date('l', strtotime($log['tanggal'])) . ', ' . $log['tanggal'] ?> (<span
                                            class="fw-medium"><?= $log['nama_dompet'] ?></span>)</small>
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
<?php foreach ($datakebutuhan as $row) : ?>
<div class="modal fade" id="kebutuhan-<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/kebutuhan/proses-done" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="modal-header">
                    <div class="lh-1">
                        <div class="d-flex align-items-center">
                            <h1 class="modal-title fs-5 fw-medium" id="exampleModalLabel"><?= $row['kebutuhan'] ?></h1>
                            <input type="hidden" name="kebutuhan" value="<?= $row['kebutuhan'] ?>">
                        </div>
                        <div class="form-text text-truncate">Rp <?= number_format($row['harga'], 0, ',', '.') ?> -
                            <?= $row['catatan'] ?>
                        </div>
                        <input type="hidden" value="<?= $row['harga'] ?>" name="harga">
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
                        <select name="dompet" id="dompet" class="form-select">
                            <option value="">--- Pilih dompet ---</option>
                            <?php foreach ($datadompet as $dompet) : ?>

                            <option value="<?= $dompet['id_dompet'] ?>,<?= $dompet['saldo'] ?>">
                                <?= $dompet['nama_dompet'] ?> -
                                Rp <?= number_format($dompet['saldo'], 0, ',', '.') ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <input type="text" readonly class="form-control-plaintext" value="-" id="saldo">
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
<script>
$(document).ready(() => {

    $('#dompet').on('change', function() {
        console.log('berhasil')
        let idDompet = $(this).val()
        $.ajax({
            url: '/dompet/datajson',
            method: 'POST',
            data: {
                iddompet: idDompet
            },
            dataType: 'JSON',
            success: (e) => {
                console.log(e)
                $('#saldo').val(e.hasil.saldo)
            }
        })
    })
})
</script>
<?php endforeach; ?>

<?= $this->endSection() ?>