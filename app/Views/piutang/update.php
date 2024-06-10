<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <div class="header-coba">
                    <h1>Edit</h1>
                    <p>Form edit data piutang - <?= $data['nama_peminjam'] ?></p>
                </div>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('piutang/proses-update') ?>" method="post">
                <?= csrf_field() ?>
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <input type="hidden" name="dompetlama" value="<?= $data['id_dompet'] ?>">
                    <div class="mb-3">
                        <label for="peminjam" class="form-label">Peminjam</label>
                        <input type="text" class="form-control" id="peminjam" name="peminjam"
                            placeholder="Kepada siapa anda meminjamkan? (nama depan & nama belakang"
                            value="<?= $data['nama_peminjam'] ?>">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <div class="input-group">
                                <span class="input-group-text fw-medium">Rp</span>
                                <input type="text" class="form-control jml-keluar" name="jumlah" id="jumlah" placeholder="Masukkan angka!"
                                    value="<?= number_format($data['nominal'],0,',','.') ?>">
                            </div>
                            <input type="hidden" name="jml-lama" value="<?= $data['nominal'] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="dompet" class="form-label">Dompet</label>
                            <select name="dompet" id="dompet" class="form-select" aria-label="Default select example">
                                <!-- <option value="">Pilih dompet</option> -->

                                <?php foreach ($datadompet as $row) : ?>
                                <?php if($data['id_dompet'] == $row['id_dompet']): ?>
                                <option value="<?= $row['id_dompet'] ?> <?= $row['saldo'] ?>" selected>
                                    <?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?>
                                </option>
                                <?php else: ?>
                                <option value="<?= $row['id_dompet'] ?> <?= $row['saldo'] ?>">
                                    <?= $row['nama_dompet'] ?> - Rp <?= number_format($row['saldo'],0,',','.') ?>
                                </option>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <?php 
                        $tglwkt = explode(' ', $data['tanggal_pinjam']);
                    ?>
                        <div class="col-md-6">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal"
                                value="<?= $tglwkt[0] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" class="form-control" name="waktu" id="waktu" value="<?= $tglwkt[1] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Untuk apa itu?"
                            value="<?= $data['catatan'] ?>">
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-save"></i> Simpan
                            perubahan</button>
                        <button class="btn btn-outline-dark" type="reset"><i class="fa-solid fa-times"></i>
                            Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>