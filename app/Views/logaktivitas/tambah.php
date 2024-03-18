<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="mb-3">
        <div class="container">
            <div>
                <ul class="nav nav-underline">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="/" role="tab"><i class="fa-solid fa-arrow-left"></i>
                            Kembali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark active" data-bs-toggle="list" href="#pengeluaran" role="tab">Pengeluaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" data-bs-toggle="list" href="#pemasukan" role="tab">Pemasukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" data-bs-toggle="list" href="#transfer" role="tab">Transfer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Soon</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container tab-content">
        <!-- pengeluaran -->
        <div class="tab-pane fade show active" id="pengeluaran">
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i class="fa-solid fa-plus"></i>
                    Form transaksi pengeluaran
                </h1>
            </div>
            <div class="card p-3">
                <form action="/riwayat/proses-tambah" method="post">
                    <div class="mb-3">
                        <label for="log" class="form-label">Aktivitas</label>
                        <input type="text" class="form-control" id="log" name="log">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Nominal yang keluar">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="ex:" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="row mb-3 g-3">
                        <div class="col-12 col-md-6">
                            <label for="dompet-keluar" class="form-label">Dompet</label>
                            <select name="dompet" id="dompet-keluar" class="form-control">
                                <option value="">--- Pilih dompet ---</option>
                                <?php foreach ($dompet as $row) : ?>
                                    <option value="<?= $row['id_dompet'] ?>">
                                        <?= $row['nama_dompet'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="col-12 col-md-6">
                            <label for="saldo" class="form-label">Saldo</label>
                            <input type="text" class="form-control" id="saldo" name="saldo" readonly placeholder="Saldo dompet">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" id="catatan" name="catatan" placeholder="ketik sesuatu untuk diingat">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark" type="submit" name="pengeluaran"><i class="fa-solid fa-plus"></i>
                            Tambah
                            Aktivitas</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- pemasukan -->
        <div class="tab-pane fade" id="pemasukan">
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i class="fa-solid fa-plus"></i>
                    Form transaksi pemasukan
                </h1>
            </div>
            <div class="card p-3">
                <form action="/riwayat/proses-pemasukan" method="post">
                    <div class="mb-3">
                        <label for="log" class="form-label">Aktivitas</label>
                        <input type="text" class="form-control" id="log" name="log">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Nominal yang masuk">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="ex:" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="mb-3 row g-3">
                        <div class="col-12 col-md-6">
                            <label for="dompet-masuk" class="form-label">Dompet</label>
                            <select name="dompet" id="dompet-masuk" class="form-control">
                                <option value="">--- Pilih dompet ---</option>
                                <?php foreach ($dompet as $row) : ?>
                                    <option value="<?= $row['id_dompet'] ?>">
                                        <?= $row['nama_dompet'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="saldo-masuk" class="form-label">Saldo</label>
                            <input type="text" class="form-control" id="saldo-masuk" name="saldo" readonly placeholder="Saldo dompet">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" id="catatan" name="catatan" placeholder="ketik sesuatu untuk diingat">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark" type="submit" name="pemasukan"><i class="fa-solid fa-plus"></i>
                            Tambah
                            Aktivitas</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- transfer -->
        <div class="tab-pane fade" id="transfer">
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i class="fa-solid fa-plus"></i>
                    Form transfer
                </h1>
            </div>
            <div class="card p-3">
                <form action="/riwayat/proses-transfer" method="post">
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Nominal yang di transfer">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="ex:" value="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="mb-3 row g-3">
                        <div class="col-12 col-md-6">
                            <label for="dompet-1-transfer" class="form-label">Dari</label>
                            <select name="dompet-1" id="dompet-1-transfer" class="form-select">
                                <option value="">--- Pilih dompet ---</option>
                                <?php foreach ($dompet as $row) : ?>
                                    <option value="<?= $row['id_dompet'] ?>">
                                        <?= $row['nama_dompet'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="saldo-1-transfer" class="form-label">Saldo</label>
                            <input type="text" class="form-control" id="saldo-1-transfer" name="saldo-1" readonly placeholder="Saldo dompet">
                        </div>
                    </div>
                    <div class="mb-3 row g-3">
                        <div class="col-12 col-md-6">
                            <label for="dompet-2-transfer" class="form-label">Ke</label>
                            <select name="dompet-2" id="dompet-2-transfer" class="form-select">
                                <option value="">--- Pilih dompet ---</option>
                                <?php foreach ($dompet as $row) : ?>
                                    <option value="<?= $row['id_dompet'] ?>">
                                        <?= $row['nama_dompet'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dompet-2-transfer" class="form-label">Saldo</label>
                            <input type="text" class="form-control" id="saldo-2-transfer" name="saldo-2" readonly placeholder="Saldo dompet">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Biaya transfer</label>
                        <input type="text" class="form-control" id="catatan" name="biaya-tf" placeholder="ketik sesuatu untuk diingat" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" id="catatan" name="catatan" placeholder="ketik sesuatu untuk diingat">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-dark" type="submit" name="transfer"><i class="fa-solid fa-plus"></i>
                            Transfer</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</section>

<script>
    $(document).ready(function() {
        // form pengeluaran
        $('#dompet-keluar').on('change', function(e) {
            let idDompet = $(this).val()
            $.ajax({
                url: '/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#saldo').val(data.hasil.saldo)
                }
            })
        })

        // form pemasukan
        $('#dompet-masuk').on('change', function(e) {
            let idDompet = $(this).val()
            $.ajax({
                url: '/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#saldo-masuk').val(data.hasil.saldo)
                }
            })
        })

        // transfer dari
        $('#dompet-1-transfer').on('change', function(e) {
            let idDompet1 = $(this).val()
            $.ajax({
                url: '/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet1
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data)
                    $('#saldo-1-transfer').val(data.hasil.saldo)
                }
            })
        })

        // transfer ke
        $('#dompet-2-transfer').on('change', function(e) {
            let idDompet2 = $(this).val()
            $.ajax({
                url: '/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet2
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data)
                    $('#saldo-2-transfer').val(data.hasil.saldo)
                }
            })
        })
    })
</script>

<?= $this->endSection() ?>