<?php

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

$totalkeluar = 0;
foreach ($datalog as $log) {
    if ($log['status'] != 2 && $log['status'] != 1 && $log['status'] != 5) {
        $totalkeluar += $log['jumlah'];
    }
}

$tglGajian = 0;
foreach ($datagaji as $gaji) {
    $tglGajian = $gaji['tanggal_gajian'];
}

?>

<div class="mb-3">
    <div class="row row-cols-1 row-cols-md-3 d-flex align-items-center g-3">
        <div class="col">
            <div>
                Keluar bulan ini: Rp <?= number_format($totalkeluar, 0, ',', '.') ?><sup class="ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="pengeluaran disesuaikan dengan tanggal dan bulan dimulai gajian | tanggal gajian: <?= $tglGajian ?>"><i class="fa-solid fa-info-circle"></i></sup>
            </div>
        </div>
        <div class="col text-center position-relative">
            <div class="list-bln-toggle d-flex justify-content-center">
                <a class="text-dark w-50 d-flex justify-content-between" id="list-bln-toggle">
                    <span class="">
                        <?php if (date('m') == '01') : ?>
                            <?php if (date('d') >= '27' && date('d') <= '31') : ?>
                                <?= $monthsIndex[date('n') - 1] ?>
                            <?php else : ?>
                                <?= $monthsIndex['11'] ?>
                            <?php endif; ?>
                        <?php elseif (date('m') == '12') : ?>
                            <?php if (date('d') >= '27' && date('d') <= 31) : ?>
                                <?= $monthsIndex[date('n') - 1] ?>
                            <?php else : ?>
                                <?= $monthsIndex[date('n') - 2] ?>
                            <?php endif; ?>
                        <?php else : ?>
                            <?php if (date('d') >= '27' && date('d') <= '31') : ?>
                                <?= $monthsIndex[date('n') - 1] ?>
                            <?php else : ?>
                                <?= $monthsIndex[date('n') - 2] ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </span> <span class="mx-1">-</span> <span>
                        <?php if (date('m') == '01') : ?>
                            <?php if (date('d') >= '27' && date('d') <= '31') : ?>
                                <?= $monthsIndex[date('n')] ?>
                            <?php else : ?>
                                <?= $monthsIndex[date('n') - 1] ?>
                            <?php endif; ?>
                        <?php elseif (date('m') == '12') : ?>
                            <?php if (date('d') >= '27' && date('d') <= 31) : ?>
                                <?= $monthsIndex[0] ?>
                            <?php else : ?>
                                <?= $monthsIndex[date('n') - 1] ?>
                            <?php endif; ?>
                        <?php else : ?>
                            <?php if (date('d') >= '27' && date('d') <= '31') : ?>
                                <?= $monthsIndex[date('n')] ?>
                            <?php else : ?>
                                <?= $monthsIndex[date('n') - 1] ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </span>
                    <!-- <span><i class="fa-solid fa-chevron-down"></i></span> -->
                </a>
            </div>
            <div class="list-bln d-flex justify-content-center" id="list-bln">
                <div class="overflow-auto">
                    <?php for ($i = 0; $i < count($monthsIndex); $i++) : ?>
                        <div class="d-flex justify-content-between list-bln-item">
                            <span class="me-5"><?= $monthsIndex[$i] ?></span>
                            <!-- <span><i class="fa-solid fa-chevron-right"></i></span> -->
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <div class="col text-end">
            Sisa bulan ini: Rp
            <?= number_format(2853862 - $totalkeluar, 0, ',', '.') ?>
        </div>
    </div>
</div>
<div>
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
        Jumlah transaksi: <?= count($datalog) ?>
    </div>
</div>
<?php if (count($datalog) != 0) : ?>
    <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php foreach ($datalog as $log) : ?>
            <div class="col box-cost">
                <div class="card dompet" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="<?= $log['catatan'] ?>">
                <div class="icon-hapus">
                    <form action="/riwayat/hapus" method="post">
                        <input type="hidden" name="dompetid" value="<?= $log['id_dompet'] ?>" class="text-end">
                        <input type="hidden" name="jumlah" value="<?= $log['jumlah'] ?>" class="text-end">
                        <input type="hidden" name="saldo" value="<?= $log['saldo'] ?>" class="text-end">
                        <input type="hidden" name="logid" value="<?= $log['id'] ?>" class="text-end">
                        <input type="hidden" name="statuslog" value="<?= $log['status'] ?>" class="text-end">
                        <button type="submit" style="border: none; background-color: transparent;border-radius: 50%;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="hapus" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash text-light"></i></button>
                    </form>
                    <!-- <a href="/riwayat/hapus/<?php //echo $log['id'] ?>" onclick="return confirm('Yakin?')"><i class="fa-solid fa-trash-alt text-danger"></i></a> -->
                </div>
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
                                <a href="/riwayat/log-detail/<?= $log['tanggal'] ?>" class="describe">
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
                                        <p class="p-0 m-0">
                                            <?php if($log['status'] != 1 && $log['status'] != 2 && $log['status'] != 5): ?>
                                                <span class="text-danger">Rp <?= number_format($log['jumlah'], 0, ',', '.') ?></span> -
                                            <?php else: ?>
                                            <span class="text-primary">Rp <?= number_format($log['jumlah'], 0, ',', '.') ?></span> -
                                            <?php endif; ?>
                                            
                                            <?php if ($log['status'] == 0) : ?>
                                                <span>Pengeluaran</span>
                                            <?php elseif ($log['status'] == 1) : ?>
                                                <span>Pendapatan</span>
                                            <?php elseif ($log['status'] == 2) : ?>
                                                <span>Transfer</span>
                                            <?php elseif ($log['status'] == 3) : ?>
                                                <span>Target</span>
                                            <?php elseif($log['status'] == 4) : ?>
                                                <span>Kebutuhan</span>
                                            <?php elseif($log['status'] == 5): ?>
                                                <span>Cicil</span>
                                            <?php else: ?>
                                            <span>Debitur</span>
                                            <?php endif; ?>
                                        </p>
                                        <p class="p-0 m-0">
                                            <?= $hari[date('l', strtotime($log['tanggal']))] . ', ' . $log['tanggal'] ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div>
        <div>Belum ada transaksi di rentang waktu berikut</div>
    </div>
<?php endif ?>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<script>
    // $(document).ready(function() {
    //     let btnListToggle = document.getElementById("list-bln-toggle");
    //     let blnList = document.getElementById("list-bln");
    //     btnListToggle.addEventListener("click", function() {
    //         blnList.classList.toggle("active");
    //         console.log(blnList);
    //     });
    //     document.addEventListener('click', function(e) {
    //         if (!btnListToggle.contains(e.target)) {
    //             blnList.classList.remove('active')
    //         }
    //     })
    // })
</script>