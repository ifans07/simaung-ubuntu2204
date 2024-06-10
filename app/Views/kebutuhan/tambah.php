<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

    $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];

?>

<section>
    <div class="container">
        <div>
            <div>
                <h1 class="rounded p-3 fw-medium" style="background-color: #f1f2f3;"><i
                        class="fa-brands fa-wpforms"></i>
                    Form tambah kebutuhan</h1>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('kebutuhan/proses-tambah') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="kebutuhan" class="form-label">Nama kebutuhan</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="butuhCheck" name="check" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="barang" id="kebutuhan" placeholder="Barang/ Hal yang dibutuhkan">
                    </div>
                    <div class="mb-3">
                        <label for="barang" class="form-label">Kebutuhan</label>
                        <select name="barang" id="barang" class="form-select" disabled>
                            <option value="">--- Pilih Kebutuhan ---</option>
                            <?php foreach($barang as $row): ?>
                                <option value="<?= $row['nama_barang'] ?>|<?= $row['harga'] ?>"><?= $row['nama_barang'] ?> - Rp<?= number_format($row['harga'],0,',','.') ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="cost" class="form-label">Biaya</label>
                            <div class="input-group">
                                <span class="input-group-text fw-medium">Rp</span>
                                <input type="text" class="form-control jml-keluar" name="cost" id="cost" placeholder="Harga dari kebutuhan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dompet" class="form-label">Dompet</label>
                            <select name="dompet" id="dompet" class="form-select">
                                <option value="">--- Pilih Dompet ---</option>
                                <?php foreach($dompet as $row): ?>
                                    <?php if($row['id_dompet'] != 0): ?>
                                        <option value="<?= $row['id_dompet'] ?>|<?= $row['saldo'] ?>"><?= $row['nama_dompet'] ?> - Rp<?= number_format($row['saldo'],0,',','.') ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>T<?= date('H:i') ?>">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="catatan" class="form-label">Catatan</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="butuhCheck" name="status">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Status Terbeli</label>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Sisipkan catatan untuk diingat!">
                    </div>
                    <div>
                        <button class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah kebutuhan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        let butuhCheck = document.querySelector('#butuhCheck')
        let kebutuhan = document.getElementById('kebutuhan')
        let barang = document.getElementById('barang')
        let biaya = document.getElementById('cost')
        
        butuhCheck.addEventListener('click', (e)=>{
            console.log(e.target.checked)
            if(e.target.checked == false){
                kebutuhan.setAttribute('disabled','disabled')
                barang.removeAttribute('disabled')
                biaya.setAttribute('disabled', 'disabled')
            }else{
                kebutuhan.removeAttribute('disabled')
                barang.setAttribute('disabled','disabled')
                biaya.removeAttribute('disabled')
            }
        })

        barang.addEventListener('change', (e)=>{
            console.log(e.target[2].value)
        })
    })
</script>

<?= $this->endSection() ?>