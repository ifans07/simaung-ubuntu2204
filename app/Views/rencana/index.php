<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;">Rencana</h3>
            </div>
            <div class="card p-3">
                <div class="d-flex justify-content-between flex-wrap mb-3">
                    <div>
                        <a href="<?= base_url('rencana/tambah') ?>" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah data</a>
                    </div>
                    <div class="fw-medium form-text align-self-center">
                        <span id="hari"><?= date('l') ?></span>, <span id="tanggal"><?= date('Y-m-d') ?></span> <span
                            id="jam"><?= date('H:i:s') ?></span>
                    </div>
                </div>
                <?php foreach ($datarencana as $row) : ?>
                <div class="d-flex gap-3 mb-3">
                    <div class="align-self-center">
                        <i class="fa-solid fa-times"></i>
                    </div>
                    <div>
                        <div class="lh-1">
                            <span class="fw-medium"><?= $row['rencana'] ?></span>
                            <div class="">
                                <small class="form-text"><?= $row['catatan'] ?></small>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="<?= base_url('rencana/update/'.$row['id']) ?>" class="badge text-bg-primary"><i
                                    class="fa-solid fa-pen"></i></a> <a href="<?= base_url('rencana/hapus/'.$row['id']) ?>"
                                class="badge text-bg-danger" onclick="return confirm('Yakin?')"><i
                                    class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="d-flex gap-3">
                    <div class="align-self-center">
                        <i class="fa-solid fa-times"></i>
                    </div>
                    <div>
                        <div class="lh-1">
                            <span class="fw-medium">Buat Casing CPU</span>
                            <div class="">
                                <small class="form-text">Buat dengan bahan kayu seminimalis mungkin</small>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="badge text-bg-primary"><i class="fa-solid fa-pen"></i></a> <a href=""
                                class="badge text-bg-danger"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
setInterval(() => {
    let jam = document.getElementById('jam')
    let day = document.getElementById('hari')
    let date = document.getElementById('tanggal')
    let waktu = new Date()
    let h = waktu.getHours()
    let m = (waktu.getMinutes() < 10) ? '0' + waktu.getMinutes() : waktu.getMinutes()
    let s = (waktu.getSeconds() < 10) ? '0' + waktu.getSeconds() : waktu.getSeconds()
    let hari = waktu.getDay()
    let tanggal = waktu.getDate()
    let bulan = waktu.getMonth()
    let tahun = waktu.getFullYear()

    days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
        'November', 'Desember'
    ]

    day.innerHTML = days[hari]
    date.innerHTML = tanggal + ' ' + months[bulan] + ' ' + tahun
    jam.innerHTML = h + ':' + m + ':' + s

}, 1000)
</script>

<?= $this->endSection() ?>