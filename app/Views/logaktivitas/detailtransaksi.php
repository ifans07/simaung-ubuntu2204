<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

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

$d = [];
foreach ($logdata as $value) {
    if ($value['tanggal'] != $tanggal) {
        //unset($value[$tanggal]);
        // d($value);
        $d[] = $value;
    }
}

?>

<section>
    <div class="mb-5">
        <div class="bread-container d-flex justify-content-center">
            <a href="<?= base_url('/') ?>" class="bread-list active">Beranda</a>
            <a href="<?= base_url('piutang') ?>" class="bread-list">Piutang</a>
            <a href="" class="bread-list">Kebutuhan</a>
            <a href="" class="bread-list">Target</a>
            <a href="" class="bread-list">Rencana</a>
        </div>
    </div>
    <div class="container">
        <div>
            <div class="header-coba mb-5">
                <h1>Detail</h1>
                <p>Detail transaksi <?= $tanggal ?></p>
            </div>
            <div class="d-flex justify-content-between align-items-end mb-2">
                <div><a href="<?= base_url('riwayat/tambah') ?>" class="btn btn-dark">Tambah transaksi</a></div>
                <div class="form-text">
                    Jumlah transaksi: <?php echo count($d) + count($datalog)
                                        ?>
                </div>
            </div>
            <div id="container">
                <div class="row row-cols-1 row-cols-md-3 g-2">
                    <?php foreach ($datalog as $log) : ?>
                    <a href="<?= base_url('riwayat/log-detail/'.$log['tanggal']) ?>" class="col box-cost">
                        <div class="card dompet" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="<?= $log['catatan'] ?>">
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
            </div>
            <hr>
            <div>
                <div class="row row-cols-1 row-cols-md-3 g-2">
                    <?php foreach ($d as $data) : ?>
                    <?php //if ($data['tanggal'] !== $tanggal) : 
                        ?>
                    <a href="<?= base_url('riwayat/log-detail/'.$data['tanggal']) ?>" class="col box-cost">
                        <div class="card dompet" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            data-bs-title="<?= $data['catatan'] ?>">
                            <div class=" row g-2">
                                <div class="col-3">
                                    <div class="icon-number">
                                        <?php
                                            $getTanggal = explode('-', $data['tanggal']);
                                            $tanggal = end($getTanggal);
                                            ?>
                                        <div><?= $tanggal ?></div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="text-dompet describe-text p-1">
                                        <span class="tipotext"><?= $data['nama_dompet'] ?></span>
                                        <div class="describe">
                                            <h6>
                                                <?= $data['log_aktivitas'] ?>
                                                <?php if ($data['status'] == 2) : ?>
                                                <?php foreach ($datadompet as $dompet) : ?>
                                                <?php if ($data['ke_iddompet'] == $dompet['id_dompet']) : ?>

                                                <?= $data['nama_dompet'] ?> ke <?= $dompet['nama_dompet'] ?>

                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </h6>
                                            <div class="form-text lh-1">
                                                <p class="p-0 m-0">Rp
                                                    <?= number_format($data['jumlah'], 0, ',', '.') ?> -
                                                    <?php if ($data['status'] == 0) : ?>
                                                    <span>Pengeluaran</span>
                                                    <?php elseif ($data['status'] == 1) : ?>
                                                    <span>Pendapatan</span>
                                                    <?php elseif ($data['status'] == 2) : ?>
                                                    <span>Transfer</span>
                                                    <?php elseif ($data['status'] == 3) : ?>
                                                    <span>Target</span>
                                                    <?php else : ?>
                                                    <span>Kebutuhan</span>
                                                    <?php endif; ?>
                                                </p>
                                                <p class="p-0 m-0">
                                                    <?= $hari[date('l', strtotime($data['tanggal']))] . ', ' . $data['tanggal'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php //endif;
                        ?>
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
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>