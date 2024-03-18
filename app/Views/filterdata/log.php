<?php

$hari = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
];

$totalkeluar = 0;
$totalmasuk = 0;
$totaltransfer = 0;
$jmltrxkeluar = [];
$jmltrxmasuk = [];
$jmltrxtransfer = [];
foreach ($datalog as $data) {
    if ($data['status'] != 2 && $data['status'] != 1) {
        $totalkeluar += $data['jumlah'];
        $jmltrxkeluar[] = $data['jumlah'];
    }

    if ($data['status'] == 1) {
        $totalmasuk += $data['jumlah'];
        $jmltrxmasuk[] = $data['jumlah'];
    }

    if ($data['status'] == 2) {
        $totaltransfer += $data['jumlah'];
        $jmltrxtransfer[] = $data['jumlah'];
    }
}

?>

<div class="row mt-3 mb-3">
    <div class="col">
        <div class="lh-1">
            <p class="m-0 p-0">Kelaur bulan ini: <span>Rp <?= number_format($totalkeluar, 0, ',', '.') ?></span> |
                <span><?= count($jmltrxkeluar) ?></span>
            </p>
            <p class="m-0 p-0">Masuk bulan ini: <span>Rp <?= number_format($totalmasuk, 0, ',', '.') ?> |
                    <?= count($jmltrxmasuk) ?></span></p>
            <p class="m-0 p-0">Transfer bulan ini: <span>Rp <?= number_format($totaltransfer, 0, ',', '.') ?></span> |
                <span><?= count($jmltrxtransfer) ?></span>
            </p>
        </div>
    </div>
    <div class="col text-end">
        <div class="lh-1">
            <p class="m-0 p-0">Selisih bulan ini: <span>Rp
                    <?= number_format(2813600 - $totalkeluar, 0, ',', '.') ?></span></p>
            <p class="m-0 p-0">Jumlah transaksi: <span><?= count($datalog) ?></span></p>
        </div>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-3 g-2">
    <?php foreach ($datalog as $log) : ?>
        <a href="/coba/detaillog/<?= $log['tanggal'] ?>" class="col box-cost">
            <div class="card dompet" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?= $log['catatan'] ?>">
                <div class=" row g-2">
                    <div class="col-3">
                        <div class="icon-number">
                            <?php
                            $getTanggal = explode('-', $log['tanggal']);
                            $tanggal = end($getTanggal);
                            ?>
                            <div><?= $tanggal ?></div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="text-dompet describe-text p-1">
                            <span class="tipotext"><?= $log['nama_dompet'] ?></span>
                            <div class="describe">
                                <h6>
                                    <?= $log['log_aktivitas'] ?>
                                    <?php if ($log['status'] == 2) : ?>
                                        <?php foreach ($datadompet as $dompet) : ?>
                                            <?php if ($log['ke_iddompet'] == $dompet['id_dompet']) : ?>

                                                <?= $log['nama_dompet'] ?> ke <?= $dompet['nama_dompet'] ?>

                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </h6>
                                <div class="form-text lh-1">
                                    <p class="p-0 m-0">Rp
                                        <?= number_format($log['jumlah'], 0, ',', '.') ?> -
                                        <?php if ($log['status'] == 0) : ?>
                                            <span>Pengeluaran</span>
                                        <?php elseif ($log['status'] == 1) : ?>
                                            <span>Pendapatan</span>
                                        <?php elseif ($log['status'] == 2) : ?>
                                            <span>Transfer</span>
                                        <?php elseif ($log['status'] == 3) : ?>
                                            <span>Target</span>
                                        <?php else : ?>
                                            <span>Kebutuhan</span>
                                        <?php endif; ?>
                                    </p>
                                    <p class="p-0 m-0">
                                        <?= $hari[date('l', strtotime($log['tanggal']))] . ', ' . $log['tanggal'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
    <div class="col-4 box-cost">
        <div class="card">
            <div class="icon-number">
                <span>31</span>
            </div>
            <div class="describe-text">

            </div>
        </div>
    </div>
    <div class="col-4 box-cost">
        <div class="card">
            <div class="icon-number">
                <span>31</span>
            </div>
            <div class="describe-text">

            </div>
        </div>
    </div>
</div>