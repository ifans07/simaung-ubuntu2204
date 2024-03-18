<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php

$nama = explode(' ', $piutang['nama_peminjam']);
$inisial = '';
foreach ($nama as $kata) {
    $inisial .= substr($kata, 0, 1);
}
$diterima = 0;
$tingkatkan = 0;
foreach($cicilan as $cicil){
    if($cicil['status_cicilan'] == 0){
        $diterima += $cicil['jml_cicilan'];
    }else{
        $tingkatkan += $cicil['jml_cicilan'];
    }
}


?>

<section>
    <div class="container">
        <div>
            <div class="mb-3">
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-user"></i>
                    Detail Hutang <?= $inisial ?>
                </h3>
            </div>
            <div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div>
                            <span class="fs-4 p-3 badge text-bg-dark fw-medium"><?= $inisial ?></span>
                        </div>
                        <div class="lh-1">
                            <span class="fw-medium fs-5"><?= $piutang['nama_peminjam'] ?></span>
                            <div class="">
                                <small class="form-text"><?= $piutang['catatan'] ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="align-self-center">
                        <a href="/piutang/update/<?= $piutang['id'] ?>"
                            class="badge text-bg-secondary fw-medium fs-6 p-2"><i class="fa-solid fa-edit"></i></a>
                        <a href="/piutang/tambah-detail/<?= $piutang['id'] ?>" class="badge text-bg-primary fs-6 p-2"><i
                                class="fa-solid fa-plus"></i></a>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="lh-1">
                            <span class="form-text">Diterima</span>
                            <div>
                                Rp <?= number_format($piutang['nominal']+$tingkatkan,0,',','.') ?>/ <span class="text-primary">Rp <?= number_format($diterima,0,',','.') ?></span>
                            </div>
                        </div>
                        <div class="lh-1 text-end">
                            <span class="form-text">Tersisa</span>
                            <div>
                                Rp
                                <?= number_format(($piutang['nominal']+$tingkatkan)-$diterima,0,',','.') ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $persentaseCicilan = round(($diterima/($piutang['nominal']+$tingkatkan))*100, 1);
                    ?>
                    <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark"
                            style="width: <?= ceil($persentaseCicilan) ?>%">
                            <?= $persentaseCicilan.'%' ?>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p><small class="form-text">Pinjaman awal:</small> <span class="fw-medium">Rp
                                <?= number_format($piutang['nominal'], 0, ',', '.') ?></span>
                        </p>
                        <p><small class="form-text">Total pinjaman:</small> <span class="fw-medium">Rp
                                <?= number_format($piutang['nominal']+$tingkatkan, 0, ',', '.') ?></span> <sup
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-title="Pinjaman awal yang sudah dijumlahkan/ditingkatkan (ni orang minjam lagi)"><i
                                    class="fa-solid fa-info-circle"></i></sup>
                        </p>
                        <p><small class="form-text">Tanggal:</small> <span
                                class="fw-medium"><?= $piutang['tanggal_pinjam'] ?></span></p>
                        <p><small class="form-text">Dompet:</small> <span
                                class="fw-medium"><?= $piutang['nama_dompet'] ?></span></p>
                    </div>
                </div>
                <div>
                    <div class="d-flex justify-content-between mb-1">
                        <div class="fw-medium">Riwayat</div>
                        <div class="form-text fw-medium"><?= date('m-d-Y H:i:s') ?></div>
                    </div>
                    <ul class="list-group">
                        <?php foreach($cicilan as $row): ?>
                        <li class="list-group-item">
                            <div>
                                <?php if($row['status_cicilan']==0): ?>
                                <span class="fw-medium">Rp <?= number_format($row['jml_cicilan'],0,',','.') ?></span>
                                <?php else: ?>
                                <span class="text-danger fw-medium">Rp
                                    <?= number_format($row['jml_cicilan'],0,',','.') ?></span>
                                <?php endif; ?>
                            </div>

                            <div>
                                <?php if($row['status_cicilan'] == 0): ?>
                                <span class="fw-medium">Cicilan</span> - <?= $row['tanggal'] ?> -
                                <?= $row['catatan_cicilan'] ?>
                                <?php else: ?>
                                <span class="fw-medium">Tingkatkan</span> - <?= $row['tanggal'] ?> -
                                <?= $row['catatan_cicilan'] ?>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>