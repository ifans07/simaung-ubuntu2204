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
                    <p>Welcome, <?= user()->username ?></p>
                </div>
            </div>
            <div class="card mb-5">
                <div class="d-flex">
                    <div class="me-md-3 me-1">
                        <img src="<?= base_url('assets/hero/hero.jpg') ?>" alt="" class="img-thumbnail img-user">
                    </div>
                    <div class="align-self-center lh-1 user-profil">
                        <h1 class="user-saldo">Rp <?= number_format($totalsaldo, 0,',','.') ?></h1>
                        <div class="mb-3 d-flex flex-column lh-1">
                            <span>Nama: <?= user()->username ?></span>
                            <span>Email: <?= user()->email ?></span>
                            <?php if(empty($gaji)): ?>
                                <span>Gaji: <span class="fw-medium">Belum di set. <a href="<?= base_url('user/gaji/input-gaji') ?>">Set gaji</a></span></span>
                            <?php else: ?>
                            <span id="btnGaji" style="cursor:pointer">Gaji: <span class="fw-medium" id="txtGaji" data-value="<?= number_format($gaji[0]['gaji'],0,',','.') ?>">Rp--------</span></span>
                            <?php endif ?>
                        </div>
                        <div>
                            <a href="<?= base_url('user/pengaturan') ?>"><i class="fa-solid fa-gear"></i> Pengaturan</a>
                            <a href="<?= base_url('/kategori') ?>"><i class="fa-solid fa-list"></i> Kategori</a>
                        </div>
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
                        <a href="<?= base_url('piutang/tambah') ?>" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah data</a>
                    </div>
                    <?php if(empty($datapiutang)): ?>
                        <div>
                            <small class="form-text">Belum ada data!</small>
                        </div>
                    <?php endif; ?>
                    <ul class="list-group">
                        <?php foreach ($datapiutang as $row) : ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('piutang/detail/'.$row['id']) ?>" class="text-decoration-none">
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
                                        <a href="<?= base_url('piutang/update/'.$row['id']) ?>" class="badge text-bg-secondary fw-medium fs-6 p-2"><i class="fa-solid fa-edit"></i></a>
                                        <a href="<?= base_url('piutang/tambah-detail/'.$row['id']) ?>"
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
<script>
    let btnGaji = document.getElementById('btnGaji');
    let txtGaji = document.getElementById('txtGaji');
    let jmlGaji = txtGaji.getAttribute('data-value')
    btnGaji.addEventListener('click', function(){
        if(txtGaji.textContent.length <= 10){
            txtGaji.textContent = 'Rp'+jmlGaji
        }else{
            txtGaji.textContent = 'Rp--------'
        }
    })
</script>

<?= $this->endSection() ?>