<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

    <section>
        <div class="container">
            <div>
                <div>
                    <div class="header-coba">
                        <h1><i class="fa-solid fa-plus"></i> Tambah Kategori</h1>
                    </div>
                </div>
                <div class="card p-3">
                    <form action="<?= base_url('kategori/proses-tambah') ?>" method="post">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori" placeholder="Masukkan nama kategori">
                        </div>
                        <div class="mb-3">
                            <label for="Icon" class="form-label">Icon</label>
                            <select name="icon" id="Icon" class="form-select">
                                <option value="">--- Pilih Icon ---</option>
                                <option value="fa-solid fa-bowl-food"><i class="fa-solid fa-bowl-food"></i>fa-solid fa-bowl-food</option>
                                <option value="fa-solid fa-bolt"><i class="fa-solid fa-bolt"></i>fa-solid fa-bolt</option>
                                <option value="fa-solid fa-list"><i class="fa-solid fa-list"></i>fa-solid fa-list</option>
                                <option value="fa-solid fa-bag-shopping">fa-solid fa-bag-shopping</option>
                                <option value="fa-solid fa-gift">fa-solid fa-gift</option>
                                <option value="fa-solid fa-dice">fa-solid fa-dice</option>
                            </select>
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