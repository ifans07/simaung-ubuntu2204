<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php

$totalkeluar = 0;
foreach ($logkeluar as $row) {
    $totalkeluar += $row['jumlah'];
}

?>

<section>
    <div class="container">
        <div class="bread-container">
            <a href="/" class="bread-list active">Beranda</a>
            <a href="" class="bread-list">Piutang</a>
            <a href="" class="bread-list">Kebutuhan</a>
            <a href="" class="bread-list">Target</a>
            <a href="" class="bread-list">Rencana</a>
        </div>
        <div class="mb-5">
            <div>
                <h1 class="rounded p-3 fw-medium d-flex justify-content-between flex-wrap gap-2" style="background-color: #f1f2f3;">
                    <div>
                        <i class="fa-solid fa-info"></i>
                        Detail dompet
                    </div>
                    <div>
                        <a href="/dompet/detail/edit-dompet/<?= $dompet['id_dompet'] ?>" class="btn btn-dark">
                            <i class="fa-solid fa-pen"></i>
                            Edit dompet
                        </a>
                        <a href="/dompet/detail/hapus-dompet/<?= $dompet['id_dompet'] ?>" class="btn btn-dark" onclick="return confirm('yakin?')">
                            <i class="fa-solid fa-trash-alt"></i>
                            Hapus
                        </a>
                    </div>
                </h1>
            </div>
            <div class="card p-3">
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <h3><?= $dompet['nama_dompet'] ?></h3>
                        <span class="px-2">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                    </div>
                    <div class="d-flex justify-content-between  flex-wrap">
                        <h3>
                            <i class="fa-solid fa-money-bill"></i>
                            Rp <?= number_format($dompet['saldo'], 0, ',', '.') ?>
                        </h3>
                        <a href="/dompet/detail/edit-saldo/<?= $dompet['id_dompet'] ?>" class="btn btn-dark">
                            <i class="fa-solid fa-pen"></i>
                            Edit saldo
                        </a>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-between">
                        <p>Saldo awal</p>
                        <span>Rp <?= number_format($dompet['saldo_awal'], 0, ',', '.') ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Pendapatan</p>
                        <span>1 Transaksi</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Pengeluaran</p>
                        <span><?= $countlogkeluar ?> Transaksi</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Target</p>
                        <span><?= $countlogtarget ?> Transaksi</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Kebutuhan</p>
                        <span><?= $countlogkebutuhan ?> Transaksi</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Total keluar</p>
                        <span>Rp <?= number_format($totalkeluar, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i class="fa-solid fa-list"></i>
                    Daftar
                    transaksi</h1>
            </div>
            <div class="card p-3">
                <div class="mb-2">
                    <strong class="fw-medium">Riwayat</strong> <a href="/riwayat/tambah" class="badge text-bg-dark"><i class="fa-solid fa-plus"></i></a>
                </div>
                <ul>
                    <?php if (!empty($logkeluar)) : ?>
                        <?php foreach ($logkeluar as $row) : ?>
                            <li class="mb-1 pb-1" style="border-bottom: 1px solid #d5d6d7;">
                                <div class="lh-1 mb-1">
                                    <strong class="fw-medium"><?= $row['log_aktivitas'] ?></strong> - <small class="">Rp
                                        <?= number_format($row['jumlah'], 0, ',', '.') ?></small>
                                    <div class="form-text"><?= $row['catatan'] ?></div>
                                </div>
                                <div class="lh-sm">
                                    <small>Terbeli :
                                        <?= date('l', strtotime($row['tanggal'])) . ', ' . $row['tanggal'] ?> (<span class="fw-medium"><?= $row['nama_dompet'] ?>
                                        </span> -
                                        <?php if ($row['status'] == 0) : ?>
                                            <span>Keluar</span><?php elseif ($row['status'] == 1) : ?><span>Masuk</span><?php elseif ($row['status'] == 2) : ?>
                                            <span>Transfer</span><?php elseif ($row['status'] == 3) : ?><span>Target</span><?php elseif ($row['status'] == 4) : ?>
                                            <span>Kebutuhan</span><?php endif; ?>)</small>
                                    <a href="/riwayat/update/<?= $row['id'] ?>" class="badge text-bg-primary"><i class="fa-solid fa-edit"></i></a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li>
                            <div class="alert alert-info form-text">Belum ada riwayat peggunaan uang
                                dengan dompet ini!</div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>