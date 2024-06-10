<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

    $tingkatkan=0;
    $terbayar=0;
    foreach($cicilan as $cicil){
        if($cicil['status_cicilan'] == 1){
            $tingkatkan+= $cicil['jml_cicilan'];
        }else{
            $terbayar+=$cicil['jml_cicilan'];
        }
    }

?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3"><i class="fa-solid fa-user"></i> Pengguna -
                    <?= $piutang['nama_peminjam'] ?></h3>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('piutang/cicil') ?>" method="post">
                <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="pilihan" class="form-label">Tipe aksi</label>
                        <select name="pilihan" id="pilihan" class="form-select">
                            <option value="0">Penagihan utang</option>
                            <option value="1">Tingkatkan pinjaman</option>
                        </select>
                        <input type="hidden" name="idpiutang" value="<?= $piutang['id'] ?>">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-3">
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
                        <div class="input-group">
                            <span class="input-group-text fw-medium">Rp</span>
                            <input type="text" class="form-control jml-keluar" name="jmlcicilan" id="jumlah" placeholder="Nominal pinjam/cicil" max="<?= ($piutang['nominal']+$tingkatkan)-$terbayar ?>">
                        </div>
                        <div id="notif-max">

                        </div>
                        <div class="form-text d-flex flex-column">
                            <small class="p-0 m-0">
                                Total hutang : <span class="fw-medium text-end">Rp <?= number_format(($piutang['nominal']+$tingkatkan), 0,',','.') ?></span>
                            </small>
                            <small class="p-0 m-0">
                                Terbayar : <span class="fw-medium text-end">Rp <?= number_format($terbayar, 0,',','.') ?></span>
                            </small>
                            <small class="p-0 m-0">
                                Sisa : <span class="fw-medium">Rp <?= number_format(($piutang['nominal']+$tingkatkan)-$terbayar, 0,',','.') ?></span>
                            </small>
                        </div>
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
                    <div class="form-check form-switch mb-3 ms-2">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status-hutang" style="transform: scale(1.5)">
                        <label class="form-check-label fw-medium ms-2" for="flexSwitchCheckChecked">Lunas?</label>
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

<script>
    let jumlah = document.querySelector('#jumlah');
    let notif = document.querySelector('#notif-max')
    let max = jumlah.getAttribute('max')
    console.log(max)
    jumlah.addEventListener('keyup', function(){
        let jml = jumlah.value.split('.')
        let j = jml.join('')
        
        if(parseInt(j)>parseInt(max)){
            jumlah.value = ''
            notif.innerHTML = `<small class='text-danger'>Nominal yang diinput melebihi dari sisa hutang! (${max})</small>`
        }else{
            notif.innerHTML = ''
        }
    })
</script>

<?= $this->endSection() ?>