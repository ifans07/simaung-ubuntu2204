<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1"><i class="fa-solid fa-user"></i> Pengguna -
                    <?= $piutang['nama_peminjam'] ?></h3>
            </div>
            <div class="card p-3">
                <form action="/piutang/cicil" method="post">
                    <div class="mb-3">
                        <label for="pilihan" class="form-label">Tipe aksi</label>
                        <select name="pilihan" id="pilihan" class="form-select">
                            <option value="0">Penagihan utang</option>
                            <option value="1">Tingkatkan pinjaman</option>
                        </select>
                        <input type="hidden" name="idpiutang" value="<?= $piutang['id'] ?>">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" class="form-control" name="waktu" id="waktu"
                                value="<?= date('H:i:s') ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jmlcicilan" id="jumlah" placeholder="Rp 0">
                    </div>
                    <div class="mb-3">
                        <label for="dompet" class="form-label">Dompet</label>
                        <select name="dompet" id="dompet" class="form-select">
                            <option value="">Pilih dompet</option>
                            <?php foreach ($dompet as $row) : ?>
                            <option value="<?= $row['id_dompet'] ?> <?= $row['saldo'] ?>">
                                <?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="3"
                            class="form-control">Ketik catatan . . .</textarea>
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-save"></i> Simpan data</button>
                        <button class="btn btn-outline-dark" type="reset"><i class="fa-solid fa-times"></i>
                            Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>