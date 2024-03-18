<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>
<?php date_default_timezone_set('Asia/Kuala_Lumpur') ?>
<?php
$hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
$h = date('w');
?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i class="fa-solid fa-edit"></i>
                    Form ubah target</h1>
            </div>
            <div class="card p-3">
                <form action="/target/proses-update" method="POST">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <input type="hidden" name="status" value="<?= $row['status'] ?>">
                    <div class="mb-3">
                        <label for="target" class="form-label">Nama target</label>
                        <input type="text" class="form-control" name="target" id="target"
                            placeholder="Ketik target yang bermanfaat" value="<?= $row['target'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Biaya</label>
                        <input type="number" class="form-control" name="cost" id="cost"
                            placeholder="Biaya yang diperlukan" value="<?= $row['cost'] ?>">
                    </div>
                    <div class="row g-3 mb-3">
                        <?php if ($row['status'] == 1) : ?>
                        <?php
                            $tanggalmulai = $row['tanggal_mulai'];
                            $day = explode(', ', $tanggalmulai); //['Minggu', 'tanggal/ jam']
                            $tanggal = explode(' ', $day[1]);
                            $waktu = $tanggal[1];

                            ?>
                        <div class="col-md-4">
                            <label for="hari" class="form-label">Hari</label>
                            <select name="hari" id="hari" class="form-control">
                                <!-- <option value="">--- Pilih hari ---</option> -->
                                <?php for ($i = 0; $i < count($hari); $i++) : ?>
                                <?php if ($hari[$i] == $day[0]) : ?>
                                <option value="<?= $day[0] ?>"><?= $day[0] ?></option>
                                <?php else : ?>
                                <option value="<?= $hari[$i] ?>"><?= $hari[$i] ?></option>
                                <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?= $tanggal[0] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="time" class="form-label">Waktu/ Jam</label>
                            <input type="time" class="form-control" id="time" name="time" value="<?= $waktu ?>">
                        </div>
                        <?php else : ?>
                        <?php
                            $tanggalselesai = $row['tanggal_selesai'];
                            $day = explode(', ', $tanggalselesai); //['Minggu', 'tanggal/ jam']
                            $tanggal = explode(' ', $day[1]);
                            $waktu = $tanggal[1];

                            ?>
                        <div class="col-md-4">
                            <label for="hari" class="form-label">Hari</label>
                            <select name="hari" id="hari" class="form-control">
                                <!-- <option value="">--- Pilih hari ---</option> -->
                                <?php for ($i = 0; $i < count($hari); $i++) : ?>
                                <?php if ($day[0] == $hari[$i]) : ?>
                                <option value="<?= $day[0] ?>"><?= $day[0] ?></option>
                                <?php else : ?>
                                <option value="<?= $hari[$i] ?>"><?= $hari[$i] ?></option>
                                <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?= $tanggal[0] ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="time" class="form-label">Waktu/ Jam</label>
                            <input type="time" class="form-control" id="time" name="time" value="<?= $waktu ?>">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <input type="text" class="form-control" name="catatan" id="catatan"
                            placeholder="Sisipkan catatan untuk diingat!" value="<?= $row['catatan'] ?>">
                    </div>
                    <div>
                        <button class="btn btn-dark"><i class="fa-solid fa-pen"></i> update target</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>