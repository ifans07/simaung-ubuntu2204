<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-edit"></i>
                    Form update rencana</h3>
            </div>
            <div class="card p-3">
                <form action="/rencana/proses-update" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <div class="mb-3">
                        <label for="rencana" class="form-label">Rencana</label>
                        <input type="text" class="form-control" id="rencana" name="rencana"
                            placeholder="Ketikkan impian yang ingin di capai!" value="<?= $row['rencana'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="3"
                            class="form-control"><?= $row['catatan'] ?></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark"><i class="fa-solid fa-save"></i> Simpan data</button>
                        <button type="reset" class="btn btn-outline-dark"><i class="fa-solid fa-times"></i>
                            Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>