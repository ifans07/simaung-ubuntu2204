<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <section>
        <div class="container">
            <div>
                <div>
                    <div class="header-coba d-flex justify-content-between">
                        <h1><i class="fa-solid fa-plus"></i> Ubah Kategori</h1>
                        <div class="align-self-center">
                            <a href="<?= base_url('kategori/proses-delete/'.$kategori['slug']) ?>" class="text-danger fs-5 icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" onclick="return confirm('hapus?')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card p-3">
                    <form action="<?= base_url('kategori/proses-update') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="idkategori" value="<?= $kategori['id'] ?>">
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" placeholder="Masukkan nama kategori" value="<?= $kategori['kategori'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="Icon" class="form-label">Icon</label>
                            <select name="icon" id="Icon" class="form-select">
                                <option value="">--- Pilih Icon ---</option>
                                <option value="fa-solid fa-bowl-food"><i class="fa-solid fa-plus"></i>fa-solid fa-bowl-food</option>
                                <option value="fa-solid fa-bolt"><i class="fa-solid fa-bolt"></i>fa-solid fa-bolt</option>
                                <option value="fa-solid fa-list"><i class="fa-solid fa-list"></i>fa-solid fa-list</option>
                                <option value="fa-solid fa-bag-shopping">fa-solid fa-bag-shopping</option>
                                <option value="fa-solid fa-gift">fa-solid fa-gift</option>
                                <option value="fa-solid fa-dice">fa-solid fa-dice</option>
                            </select>
                            <div class="form-text">
                                <small>Icon sebelumnya: <i class="<?= $kategori['icon'] ?>"></i> <?= $kategori['icon'] ?></small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-dark" type="submit"><i class="fa-solid fa-save"></i> Simpan data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>