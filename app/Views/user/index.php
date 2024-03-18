<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

$totalsaldo = 0;
foreach($datadompet as $dompet){
    $totalsaldo += $dompet['saldo'];
}

?>

<section>
    <div class="container">
        <div>
            <div>
                <div class="header-coba">
                    <h1>User</h1>
                    <p>Welcome, Ifan Sutiono</p>
                </div>
            </div>
            <div class="card mb-5">
                <div class="d-flex">
                    <div class="me-3">
                        <img src="/assets/hero/hero.jpg" alt="" class="img-thumbnail" width="200" height="200">
                    </div>
                    <div class="align-self-center lh-1 user-profil">
                        <h1 class="user-saldo">Rp <?= number_format($totalsaldo, 0,',','.') ?></h1>
                        <p class="p-1 m-0">Nama: username</p>
                        <p class="p-1 m-0">Email: email@gmail.com</p>
                        <p class="p-1 m-0">alamat: jl. alamat</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="header-coba">
                    <h1>Piutang</h1>
                    <p>Kelola hutang & piutang</p>
                </div>
                <div>
                    <div class="my-3">
                        <a href="/piutang/tambah" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah data</a>
                    </div>
                    <ul class="list-group">
                        <?php foreach ($datapiutang as $row) : ?>
                        <li class="list-group-item">
                            <a href="/piutang/detail/<?= $row['id'] ?>" class="text-decoration-none">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-3 align-items-center">
                                        <div>
                                            <?php
                                                // function inisial($nama)
                                                // {
                                                //     $arr = explode(' ', $nama);
                                                //     $singkatan = '';
                                                //     foreach ($arr as $kata) {
                                                //         $singkatan .= substr($kata, 0, 1);
                                                //     }
                                                //     return $singkatan;
                                                // }
                                                $nama = explode(' ', $row['nama_peminjam']);
                                                $inisial = '';
                                                foreach ($nama as $kata) {
                                                    $inisial .= substr($kata, 0, 1);
                                                }
                                                ?>
                                            <span class="badge text-bg-dark p-3 fs-5 fw-medium"><?= strtoupper($inisial) ?></span>
                                        </div>
                                        <div class="lh-1">
                                            <span class="fw-medium fs-6 text-dark"><?= $row['nama_peminjam'] ?></span>
                                            <div class="mb-2">
                                                <small class="form-text"><?= $row['catatan'] ?></small>
                                            </div>
                                            <span class="text-danger">Rp
                                                <?= number_format($row['nominal'], 0, ',', '.') ?> - <?= $row['nama_dompet'] ?></span>
                                        </div>
                                    </div>
                                    <div class="align-self-center">
                                        <a href="/piutang/update/<?= $row['id'] ?>" class="badge text-bg-secondary fw-medium fs-6 p-2"><i class="fa-solid fa-edit"></i></a>
                                        <a href="/piutang/tambah-detail/<?= $row['id'] ?>"
                                            class="badge text-bg-primary fw-medium fs-6 p-2"><i
                                                class="fa-solid fa-plus"></i></a>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>