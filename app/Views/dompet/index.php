<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php

date_default_timezone_set('Asia/Kuala_Lumpur');

$totalsaldo = 0;
$totalsaldoawal = 0;

$totalmasuk = 0;
$totalkeluar = 0;
$keluarbulanini = 0;
$keluarhariini = 0;

$totalditerima = 0;
$totaltingkatkan = 0;
$totalhutang = 0;


foreach ($datadompet as $row) {
    $totalsaldo += $row['saldo'];
    $totalsaldoawal += $row['saldo_awal'];
}

foreach ($keluartotal as $data) {
    if ($data['tanggal'] >= date('2024-01-01') && $data['tanggal'] <= date('Y-m-d')) {
        if ($data['status'] != 2 && $data['status'] != 1 && $data['status'] != 5) {
            $totalkeluar += $data['jumlah'];
        }else{
            $totalmasuk += $data['jumlah'];
        }
    }
}

foreach ($logbulan as $bulan) {
    if($bulan['status'] != 1 && $bulan['status'] != 2 && $bulan['status'] != 5){
        $keluarbulanini += $bulan['jumlah'];
    }
}

foreach ($loghariini as $hari) {
    if($hari['status'] != 1 && $hari['status'] != 2 && $hari['status'] != 5){
        $keluarhariini += $hari['jumlah'];
    }
}

$months = [
    'Jan' => 'Januari',
    'Feb' => 'Februari',
    'Mar' => 'Maret',
    'Apr' => 'April',
    'Mei' => 'Mei',
    'Jun' => 'Juni',
    'Jul' => 'Juli',
    'Aug' => 'Agustus',
    'Sep' => 'September',
    'Oct' => 'Oktober',
    'Nov' => 'November',
    'Dec' => 'Desember'
];
$monthsIndex = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
];
$hari = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
];

foreach($datapiutang as $piutang){
    $totalhutang += $piutang['nominal'];
}
foreach($datacicilan as $cicilan){
    if($cicilan['status_cicilan'] == 0){
        $totalditerima += $cicilan['jml_cicilan'];
    }else{
        $totaltingkatkan += $cicilan['jml_cicilan'];
    }
}

?>

<section>
    <div class="container">
        <!-- dompet & saldo -->
        <div class="">
            <div>
                <div class="mb-3">
                    <h1 class="rounded p-3" style="background-color: #f1f1f1; font-weight: 500"><i
                            class="fa-solid fa-wallet"></i> Dompet & Saldo
                    </h1>
                </div>
                <div class="">
                    <div class="row p-md-3 g-3">
                        <div class="col-md-6">
                            <!-- <span class="w-100"> -->
                            <div class="row h-100">
                                <div class="col-md-12 saldo">
                                    <div class="bg-saldo text-center lh-1">
                                        <p>
                                            Total saldo Total saldo
                                        </p>
                                        <p class="">
                                            Total saldo
                                        </p>
                                        <p>
                                            Total saldo Total saldo
                                        </p>
                                        <p>Total saldo</p>
                                        <p>Total saldo Total saldo</p>
                                        <p>Total saldo</p>
                                        <p>Total saldo Total saldo</p>
                                        <p>Total saldo</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <input type="password" class="form-control-plaintext"
                                            value="Rp<?= number_format($totalsaldo, 0, '.', '.') ?>"
                                            style="font-weight: 700" id="saldoHide">

                                        <span class="fs-2" style="cursor:pointer" id="toggleHideSaldo"><i
                                                class="fa-solid fa-eye" id="iconToggleHide"></i></span>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                <div class="row g-2">
                                    <div class="col-md-12 text-center">
                                        <div class="fw-medium">Rincian: </div>
                                        <small class="form-text">Saldo awal: Rp
                                            <?= number_format($totalsaldoawal, 0, ',', '.') ?></small> - <small class="form-text me-1">Sisa saldo: Rp <?= number_format($totalsaldoawal+$totalmasuk-$totalkeluar, 0,',','.') ?></small><sup
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Sisa saldo berdasarkan saldo awal - total pengeluaran sebagai perbandingan dengan saldo asli"><i
                                                class="fa-solid fa-info-circle"></i></sup>
                                    </div>
                                
                                    <div class="col-md-6">
                                    <span class="fw-medium">Pemasukan:</span>
                                        <div>
                                            <small class="form-text">Total masuk: <span class="text-primary">Coming soon</span></small>
                                        </div>
                                        <div>
                                            <small class="form-text">Masuk bulan ini: <span class="text-primary">Coming soon</span></small>
                                            <sup data-bs-toggle="tooltip" data-bs-title="Bulan <?= $months[date('M')] ?>"><i class="fa-solid fa-info-circle"></i></sup>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="fw-medium">Pengeluaran: </span>
                                        <div>
                                            <small class="form-text">Total keluar: <span class="text-danger">Rp
                                                <?= number_format($totalkeluar, 0, ',', '.') ?></span></small>
                                        </div>
                                        <div>
                                            <small class="form-text">Keluar bulan ini: <span class="text-danger">Rp
                                                <?= number_format($keluarbulanini, 0, ',', '.') ?></span></small>
                                                <sup data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Bulan <?= $months[date('M')] ?>"><i class="fa-solid fa-info-circle"></i></sup>
                                        </div>
                                        <div>
                                            <small class="form-text">Keluar hari ini: Rp
                                            <?= number_format($keluarhariini, 0, ',', '.') ?></small>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <span class="fw-medium">Piutang: </span>
                                        <div>
                                            <small class="form-text">Total piutang: Rp
                                                <?= number_format($totalhutang+$totaltingkatkan, 0, ',', '.') ?></small> - 
                                                <small class="form-text">Total sisa: <span class="text-danger">Rp <?= number_format(($totalhutang+$totaltingkatkan)-$totalditerima,0,',','.') ?></span></small>
                                                <sup data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="total hutang - total diterima"><i class="fa-solid fa-info-circle"></i></sup>
                                        </div>
                                        <div>
                                            <small class="form-text">Total diterima: <span class="text-primary">Rp
                                                <?= number_format($totalditerima, 0, ',', '.') ?></span></small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <span class="fw-medium">Random code: </span>
                                        <div>
                                            <small class="form-text"><?= uniqid($generate, $random) ?></small>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <?php if(date('m') != 27): ?>
                                        <div class="mt-3 mb-3">
                                            <a href="#" class="btn btn-dark"><i class="fa-solid fa-money-bill"></i> Input gaji <sup data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="tombol ini hanya muncul di tanggal gajian!"><i class="fa-solid fa-info-circle"></i></sup></a>
                                        </div>
                                        <?php endif; ?>
                                    </div>

                                </div>

                                </div>
                            </div>
                            <!-- </span> -->
                        </div>
                        <div class="col-md-6">
                            <div class="row h-50 row-cols-1 row-cols-md-2 g-3">
                                <?php foreach ($datadompet as $data) : ?>
                                <div class="col">
                                    <div class="card text-decoration-none dompet">
                                        <div class="row g-2">
                                            <div class="col-3">
                                                <div class="icon-number p-2">
                                                    <!-- <span class="badge text-bg-dark p-2 icon-dompet">
                                                        <i class="fa-solid fa-money-bill fs-1"></i>
                                                    </span> -->
                                                    <i class="fa-solid fa-money-bill"></i>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="text-dompet describe-text p-1">
                                                    <a href="/dompet/detail/<?= $data['id_dompet'] ?>" class="describe lh-1">
                                                        <p class="mb-1"><?= $data['nama_dompet'] ?></p>
                                                        <div class="lh-1">
                                                            <p class="m-0 p-0 fw-medium">Rp
                                                                <?= number_format($data['saldo'], 0, ',', '.') ?>
                                                            </p>

                                                            <p class="m-0 p-0 form-text">Saldo awal:
                                                                <?= number_format($data['saldo_awal'], 0, ',', '.') ?>
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <div class="col">
                                    <div class="card text-decoration-none dompet">
                                        <div class="row g-2">
                                            <div class="col-3">
                                                <div class="icon-number p-2">
                                                    <i class="fa-solid fa-plus"></i>
                                                </div>
                                            </div>
                                            <a href="/dompet/tambah" class="col-9 text-dark">
                                                <div class="text-dompet describe-text p-1">
                                                    <p class="mb-1 p-0 fw-medium">Tambah Dompet</p>
                                                    <p class="m-0 p-0">Rp0</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="bg-tgl">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div
                                    class="col-4 bg-white d-flex justify-content-end align-items-center bg-icon-primary">
                                    <div class="icon-primary d-flex align-items-center">
                                        <div class="text-dark">
                                            <p class="m-0 p-0 text-end">
                                                <?= date('d') ?>
                                            </p>
                                            <p class="m-0 p-0">
                                                <?= $months[date('M')] ?>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-8 bg-dark d-flex justify-content-start align-items-center bg-icon-secondary">
                                    <div class="icon-secondary d-flex align-items-center">
                                        <div>
                                            <?= date('Y') . $hari[date('l')] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="container">
                        <div class="mb-3">
                            <div class="row g-3">
                                <div class="col">
                                    <div>
                                        <label for="dari" class="form-label">Dari</label>
                                        <input type="date" class="form-control" id="dari">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label for="sampai" class="form-label">Sampai</label>
                                        <input type="date" class="form-control" id="sampai">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="container">
                            <div class="mb-3">
                                <div class="row row-cols-1 row-cols-md-3 d-flex align-items-center g-3">
                                    <div class="col">
                                        Keluar bulan ini: Rp <?= number_format($keluarbulanini, 0, ',', '.') ?>
                                    </div>
                                    <div class="col text-center position-relative">
                                        <div class="list-bln-toggle d-flex justify-content-center">
                                            <a class="text-dark w-50 d-flex justify-content-between"
                                                id="list-bln-toggle">
                                                <span class="me-5">
                                                    <?= $months[date('M')] ?>
                                                </span>
                                                <span><i class="fa-solid fa-chevron-down"></i></span>
                                            </a>
                                        </div>
                                        <div class="list-bln d-flex justify-content-center" id="list-bln">
                                            <div class="overflow-auto">
                                                <?php for ($i = 0; $i < count($monthsIndex); $i++) : ?>
                                                <div class="d-flex justify-content-between list-bln-item">
                                                    <span class="me-5"
                                                        data-month="<?= date('m') ?>"><?= $monthsIndex[$i] ?></span>
                                                    <span><i class="fa-solid fa-chevron-right"></i></span>
                                                </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col text-end">
                                        Selisih bulan ini: Rp
                                        <?= number_format(2820136 - $keluarbulanini, 0, ',', '.') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="bread-container d-flex justify-content-center">
                                    <a href="/" class="bread-list active">Beranda</a>
                                    <a href="/piutang" class="bread-list">Piutang</a>
                                    <a href="" class="bread-list">Kebutuhan</a>
                                    <a href="" class="bread-list">Target</a>
                                    <a href="" class="bread-list">Rencana</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end mb-3">
                                <div><a href="/riwayat/tambah" class="btn btn-dark">Tambah transaksi</a></div>
                                <div class="form-text">
                                    Jumlah transaksi: <?= $jmltrxblnini ?>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 g-3">
                                <?php foreach ($datalog as $log) : ?>
                                <div class="col box-cost">
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
                                </div>
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
                    </section>
                </div>
            </div>

            <!-- to do list -->
            <div class="mt-5">
                <div class="mb-3">
                    <h3 class="rounded p-3 fs-1 fw-medium" style="background-color: #f1f2f3;"><i
                            class="fa-solid fa-list"></i> To-do
                        list</h3>
                </div>
                <div class="card p-3">
                    <form action="/todolist/proses-tambah" method="post" class="mb-3">
                        <div class="row g-2 g-md-2">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="title" placeholder="Judul">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="deskripsi"
                                    placeholder="Ketikkan kegiatan/deskripsi - nya mas bro...">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-plus"></i>
                                    Masukkan</button>
                            </div>
                        </div>
                    </form>
                    <div id="container-todolist">
                        <div class="mb-2">
                            <strong class="fw-medium">List kegiatan</strong> -
                            <small><?= date('l, d-m-Y') ?></small>
                        </div>
                        <ul>
                            <?php foreach ($datatodolist as $row) : ?>
                            <li class="mb-2">
                                <div class="lh-1 mb-2">
                                    <strong class="fw-medium"><?= $row['title'] ?></strong>
                                    <div>
                                        <small class="form-text"><?= $row['deskripsi'] ?></small>
                                    </div>
                                </div>
                                <div>
                                    <a href="/todolist/update/<?= $row['slug'] ?>" class="badge text-bg-primary"><i
                                            class="fa-solid fa-pen"></i></a> <a
                                        href="/todolist/hapus/<?= $row['slug'] ?>" class="badge text-bg-danger"
                                        onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash"></i></a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Rencana, bertahan, periode pakai -->
            <div class="mt-5">
                <div class="mb-3">
                    <h3 class="rounded p-3 fs-1 fw-medium" style="background-color: #f1f2f3;"><i
                            class="fa-solid fa-calculator"></i>
                        Visi & Misi</h3>
                </div>
                <div class="card p-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-2">
                                <strong class="fw-medium">Rencana</strong> <a href="/rencana/tambah"
                                    class="badge text-bg-dark"><i class="fa-solid fa-plus"></i></a>
                            </div>
                            <ul>
                                <?php foreach ($datarencana as $row) : ?>
                                <li class="mb-2">
                                    <div class="lh-1">
                                        <strong class="fw-medium"><?= $row['rencana'] ?></strong>
                                        <div>
                                            <small class="form-text"><?= $row['catatan'] ?></small>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <li><a href="/rencana" class="text-decoration-none">Selengkapnya . . .</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <strong class="fw-medium">Penghitung periode</strong> <a href="/periode/tambah"
                                    class="badge text-bg-dark"><i class="fa-solid fa-plus"></i></a>
                            </div>
                            <ul>
                                <?php
                                foreach ($datapenghitung as $row) :
                                    $tglawal = date_create($row['tanggal_mulai']);
                                    $tglakhir = ($row['status_penghitung'] == 0) ? date_create(date('Y-m-d')) : date_create($row['tanggal_selesai']);
                                    // $tglakhir = date_create(date('Y-m-d'));
                                    $diff = date_diff($tglawal, $tglakhir);
                                ?>
                                <li class="mb-2">
                                    <div class="lh-1">
                                        <strong class="fw-medium"><?= $row['nama_aktivitas'] ?></strong> -
                                        <small><?= $row['tanggal_mulai'] ?></small>
                                        <div class="mb-1 text-truncate"><small
                                                class="form-text"><?= $row['catatan'] ?></small>
                                        </div>
                                        <div>
                                            <small class="">Periode: <span class="fw-medium"><?= $diff->days ?></span>
                                                hari</small>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <li><a href="/periode">Selengkapnya . . .</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-2">
                                <strong class="fw-medium">Lama penggunaan</strong> <a href="#"
                                    class="badge text-bg-dark"><i class="fa-solid fa-plus"></i></a>
                            </div>
                            <ul>
                                <?php foreach ($datapenggunaan as $row) : ?>
                                <li class="mb-2">
                                    <div class="lh-1">
                                        <strong class="fw-medium"><?= $row['nama_barang'] ?></strong> -
                                        <small><?= $row['tanggal_mulai'] ?></small>
                                        <div class="mb-1 text-truncate">
                                            <small class="form-text"><?= $row['catatan'] ?></small>
                                        </div>
                                        <div>
                                            <?php
                                                $tglawal = date_create($row['tanggal_mulai']);
                                                $tglakhir = ($row['status_penggunaan'] == 0) ? date_create(date('Y-m-d')) : date_create($row['tanggal_selesai']);
                                                // $tglakhir = date_create(date('Y-m-d'));
                                                $diff = date_diff($tglawal, $tglakhir);
                                                ?>
                                            <small>Pemakaian: <span class="fw-medium"><?= $diff->days ?></span>
                                                hari</small>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                                <li><a href="/penggunaan">Selengkapnya . . .</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- pengeluaran & target -->
            <div class="mt-5">
                <div class="mb-3">
                    <h3 class="rounded p-3 fs-1 fw-medium" style="background-color: #f1f2f3;"><i
                            class="fa-solid fa-bullseye"></i>
                        Kebutuhan & Target</h3>
                </div>
                <div class="card p-3">
                    <div class="row mb-3 g-3">
                        <div class="col-md-5 col">
                            <label for="dari" class="form-label">Dari</label>
                            <input type="date" class="form-control" name="dari" id="dari">
                        </div>
                        <div class="col-md-5 col">
                            <label for="sampai" class="form-label">Sampai</label>
                            <input type="date" class="form-control" name="sampai" id="sampai">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-dark w-100"><i class="fa-solid fa-eye"></i> Lihat</button>
                        </div>
                        <div class="col col-md-auto">
                            <!-- <label for="" class="form-label">-</label> -->
                            <a href="/kebutuhan/tambah" class="btn btn-dark form-control">
                                <i class="fa-solid fa-plus"></i>
                                Kebutuhan
                            </a>
                        </div>
                        <div class="col col-md-auto">
                            <!-- <label for="" class="form-label">-</label> -->
                            <a href="/target/tambah" class="btn btn-dark w-100"><i class="fa-solid fa-plus"></i> Tambah
                                target</a>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div>
                                <strong class="fw-medium">Kebutuhan</strong> - <small>Kebutuhan sebulan sesuai
                                    gaji</small>
                            </div>
                            <ul class="">
                                <?php foreach ($datakebutuhan as $row) : ?>
                                <?php if ($row['status'] == 1) : ?>
                                <li class="mb-1 align-self-center">
                                    <div class="p-0 m-0 lh-1">
                                        <strong class="fw-medium"><?= $row['kebutuhan'] ?></strong> -
                                        <small>Rp <?= number_format($row['harga'], 0, ',', '.') ?></small>
                                        <div class="form-text text-truncate"><?= $row['catatan'] ?></div>
                                    </div>
                                </li>
                                <?php else : ?>
                                <li class="mb-1 align-self-center">
                                    <div class="p-0 m-0 lh-1 text-decoration-line-through">
                                        <strong
                                            class="fw-medium text-decoration-line-through"><?= $row['kebutuhan'] ?></strong>
                                        -
                                        <small class="text-decoration-line-through">Rp
                                            <?= number_format($row['harga'], 0, ',', '.') ?></small>
                                        <div class="form-text text-truncate text-decoration-line-through">
                                            <?= $row['catatan'] ?></div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <li>
                                    <strong class="fw-medium"><a href="/kebutuhan"
                                            class="text-decoration-none">Selengkapnya
                                            . . .</a></strong>
                                </li>
                            </ul>
                            <!-- <div class="mt-3">
                            <a href="/kebutuhan" class="text-decoration-none btn btn-dark"><span>Selengkapnya</span> <i class="fa-solid fa-angles-right"></i></a>
                        </div> -->
                        </div>
                        <div class="col-md-6 d-flex flex-column flex-wrap">
                            <div>
                                <strong class="fw-medium">Target</strong> - <small>Perlu nabung untuk membeli</small>
                            </div>
                            <ul>
                                <?php foreach ($datatarget as $row) : ?>
                                <?php if ($row['status'] == 1) : ?>
                                <li class="mb-1">
                                    <div class="lh-1">
                                        <strong class="fw-medium"><?= $row['target'] ?></strong> -
                                        <small>Rp <?= number_format($row['cost'], 0, ',', '.') ?></small>
                                        <div class="form-text"><?= $row['catatan'] ?></div>
                                    </div>
                                </li>
                                <?php else : ?>
                                <li class="mb-1">
                                    <div class="lh-1">
                                        <strong
                                            class="fw-medium text-decoration-line-through"><?= $row['target'] ?></strong>
                                        -
                                        <small>Rp <?= number_format($row['cost'], 0, ',', '.') ?></small>
                                        <div class="form-text text-decoration-line-through"><?= $row['catatan'] ?>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <li><strong class="fw-medium"><a href="/target"
                                            class="text-decoration-none">Selengkapnya .
                                            .
                                            .</a></strong></li>
                            </ul>
                            <!-- <div class="">
                            <a href="" class="text-decoration-none btn btn-dark w-md-100"><span>Selengkapnya</span> <i
                                    class="fa-solid fa-angles-right"></i></a>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<script>
$(document).ready(function() {
    const times = new Date()
    let tanggal = times.getDate()
    tanggal = (tanggal < 10) ? '0' + tanggal : tanggal;
    let bulan = times.getMonth()
    bulan += 1;
    bulan = (bulan < 10) ? '0' + bulan : bulan;
    let tahun = times.getFullYear()

    let dariTgl = document.getElementById('dari')
    let sampaiTgl = document.getElementById('sampai')
    let base_URL = window.location.origin
    if (bulan == 12) {
        if (tanggal >= 27 && tanggal <= 31) {
            dariTgl.value = tahun + '-' + bulan + '-' + 27
            sampaiTgl.value = (tahun + 1) + '-' + '01' + '-' + 27
        } else {
            dariTgl.value = tahun + '-' + (parseInt(bulan) - 1) + '-' + 27
            sampaiTgl.value = tahun + '-' + bulan + '-' + 27
        }
    } else if (bulan == '01') {
        if (tanggal >= 27 && tanggal <= 31) {
            dariTgl.value = tahun + '-' + bulan + '-' + 27
            sampaiTgl.value = tahun + '-' + '0' + (parseInt(bulan) + 1) + '-' + 27
        } else {
            dariTgl.value = (tahun - 1) + '-' + 12 + '-' + 27
            sampaiTgl.value = tahun + '-' + bulan + '-' + 27
        }
    } else {
        if (tanggal >= 27 && tanggal <= 31) {
            dariTgl.value = tahun + '-' + bulan + '-' + 27
            sampaiTgl.value = tahun + '-' + '0' + (parseInt(bulan) + 1) + '-' + 27
        } else {
            dariTgl.value = tahun + '-' + '0' + (parseInt(bulan) - 1) + '-' + 27
            sampaiTgl.value = tahun + '-' + bulan + '-' + 27
        }
    }


    $('#container').load(base_URL+'/riwayat/log-filter/' + dariTgl.value + '/' + sampaiTgl.value)
    $('#dari').on('change', function() {
        console.log($(this).val())
        $('#container').load(base_URL+'/riwayat/log-filter/' + $(this).val() + '/' +
            sampaiTgl
            .value)
    })
    $('#sampai').on('change', function() {
        $('#container').load(base_URL+'/riwayat/log-filter/' + dariTgl.value + '/' + $(this)
            .val())
        console.log($(this).val())
    })
})
</script>

<!-- section todolist -->
<script>
    $(document).ready(function(){
        let base_URL = window.location.origin
        $('#container-todolist').load(base_URL+"/todo/data-list")
    })
</script>

<script>
$(document).ready(function() {
    $('#toggleHideSaldo').on('click', function() {
        let coba = $('#saldoHide').attr('type')
        let iconHide = $('#iconToggleHide')
        if (coba == 'password') {
            $('#saldoHide').prop('type', 'text')
            iconHide.removeClass('fa-eye')
            iconHide.addClass('fa-eye-slash')
        } else {
            $('#saldoHide').prop('type', 'password')
            iconHide.removeClass('fa-eye-slash')
            iconHide.addClass('fa-eye')
        }
    })
})
</script>

<?= $this->endSection() ?>