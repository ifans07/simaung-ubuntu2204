<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1"><i class="fa-solid fa-edit"></i> Form edit to-do</h3>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('todolist/proses-update') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= $todo['id'] ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">List</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?= $todo['title'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="3"
                            class="form-control"><?= $todo['deskripsi'] ?></textarea>
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-edit"></i> Simpan
                            perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>