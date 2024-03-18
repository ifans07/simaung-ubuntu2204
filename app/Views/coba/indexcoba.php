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

?>
<section>
    <div>
        <div class="bread-container d-flex justify-content-center">
            <a href="/" class="bread-list active">Beranda</a>
            <a href="/piutang" class="bread-list">Piutang</a>
            <a href="" class="bread-list">Kebutuhan</a>
            <a href="" class="bread-list">Target</a>
            <a href="" class="bread-list">Rencana</a>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div>
            <div class="header-coba">
                <h1>Coba</h1>
                <p>Percobaan syntax</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row row-cols-1 row-cols-md-3 g-1" style="transform: rotate(-8deg); overflow: hidden;">
                        <div class="col-md-6">
                            <div class="card text-dark text-center" style="height: 12rem; max-width: 18rem; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <h2>Rp 17.173.500</h2>
                                <hr>
                                <small>Total Saldo</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-dark text-center" style="height: 12rem; max-width: 18rem;">
                                <h2>Saldo awal</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-dark text-center" style="height: 12rem; max-width: 18rem;">
                                <h2>Total Keluar</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-dark text-center" style="height: 12rem; max-width: 18rem;">
                                <h2>Total keluar hari ini</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-dark text-center" style="height: 12rem; max-width: 18rem;">
                                <h2>Total keluar bulan ini</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-dark text-center" style="height: 12rem; max-width: 18rem;">
                                <?php $minus = -1 ?>
                                <h2>Rp 123.456.789</h2>
                                <hr>
                                <p>Total keluar periode <?= date('Y-m-d') ?> s/d 27-05-2023</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <label for="" class="form-label">Bulan sebelum</label>
                                <input type="date" class="form-control" id="bln-sblm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="" class="form-label">Bulan ini</label>
                                <input type="date" class="form-control" id="bln-ini">
                            </div>
                        </div>
                    </div>
                    <div id="container">
                        <div class="row row-cols-1 row-cols-md-3 g-2">
                            <?php foreach ($datalog as $log) : ?>
                                <div class="col box-cost">
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
                    <!-- end log -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {

        let setMonth = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
            'Oktober',
            'November', 'Desember'
        ]
        let time = new Date()
        let bulan = time.getMonth()
        let tanggal = time.getDate()
        let blnSbnr = bulan + 1
        let bulan0 = (bulan < 10) ? '0' + blnSbnr : blnSbnr
        let tanggal0 = (tanggal < 10) ? '0' + tanggal : tanggal
        let tahun = time.getFullYear()
        let blnIni = document.getElementById('bln-ini')
        let blnSblm = document.getElementById('bln-sblm')
        console.log(bulan0)
        if (bulan + 1 == 12) {
            console.log(setMonth[0])
            blnSblm.value = tahun + '-' + bulan + '-' + tanggal
            blnIni.value = tahun + '-' + blnSbnr + '-' + tanggal
        } else {
            if (tanggal > 27 && tanggal < 31) {
                let nextBln = parseInt(bulan0)
                blnSblm.value = tahun + '-' + bulan0 + '-' + 27
                blnIni.value = tahun + '-' + '0' + (nextBln + 1) + '-' + 27
            } else {
                console.log('gagal')
                let blnIniInt = parseInt(bulan0)
                console.log(blnIniInt)
                if (bulan0 == '01') {
                    blnSblm.value = (tahun - 1) + '-' + 12 + '-' + 27
                } else {
                    blnSblm.value = tahun + '-' + '0' + (blnIniInt - 1) + '-' + 27
                }
                blnIni.value = tahun + '-' + bulan0 + '-' + 27
            }
        }
        console.log(blnIni.value)
        console.log(blnSblm.value)
        $('#container').load('http://localhost:8080/coba/filterlog/' + blnSblm.value +
            '/' + blnIni.value)

        $('#bln-ini').on('change', function() {
            $('#container').load('http://localhost:8080/coba/filterlog/' + blnSblm.value +
                '/' + $(this).val())
        })

        $('#bln-sblm').on('change', function() {
            $('#container').load('http://localhost:8080/coba/filterlog/' + $(this).val() +
                '/' + blnIni.value)
        })
    })
</script>

<?= $this->endSection() ?>