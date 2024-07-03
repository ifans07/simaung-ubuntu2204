<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <div class="header-coba">
                    <h1><i class="fa-solid fa-list"></i> Kategori</h1>
                </div>
            </div>
            <div class="card p-3">
                <div class="d-flex flex-nowrap justify-content-between mb-3">
                    <p>Data kategori</p>
                    <small class=""><?= date('l, d-m-Y') ?></small>
                </div>
                <div class="mb-3">
                    <a href="<?= base_url('kategori/tambah') ?>" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah Kategori</a>
                </div>
                <div class="d-flex flex-wrap row gap-1 justify-content-center">
                    <?php foreach($datakategori as $row): ?>
                        <a href="#" class="shadow-sm col-md-2 p-2 rounded-3">
                            <div class="d-flex align-items-center h-100">
                                <div class="text-bg-dark p-2 rounded-2 text-white">
                                    <i class="<?= $row['icon'] ?> fs-5"></i>
                                </div>
                                <div class="p-2">
                                    <span><?= $row['kategori'] ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                    <div class="shadow-sm col-md-2 p-2 rounded-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="bg-dark p-2 rounded-2 text-white fw-medium">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div class="p-2">
                                <span>Makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm col-md-2 p-2 rounded-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="bg-dark h-100 p-2 rounded-2 text-white">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div class="h-100 p-2">
                                <span>Makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm col-md-2 p-2 rounded-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="bg-dark h-100 p-2 rounded-2 text-white">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div class="h-100 p-2">
                                <span>Makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm col-md-2 p-2 rounded-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="bg-dark h-100 p-2 rounded-2 text-white">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div class="h-100 p-2">
                                <span>Belanja</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm col-md-2 p-2 rounded-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="bg-dark h-100 p-2 rounded-2 text-white">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div class="h-100 p-2">
                                <span>Kendaraan</span>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-sm col-md-2 p-2 rounded-3">
                        <div class="d-flex align-items-center h-100">
                            <div class="bg-dark h-100 p-2 rounded-2 text-white">
                                <i class="fa-solid fa-code"></i>
                            </div>
                            <div class="h-100 p-2"><span>Lain - lain</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>