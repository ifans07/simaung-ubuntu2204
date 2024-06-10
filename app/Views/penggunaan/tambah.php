<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-plus"></i>
                    Tambah barang</h3>
            </div>
            <div class="card p-3">
                <form action="<?= base_url('penggunaan/proses-tambah') ?>" method="post">
                <?= csrf_field() ?>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <label for="barang" class="form-label">Barang</label>
                            <div class="d-flex">
                                <div class="">
                                    <label for="butuhCheck" id="lbl-input" class="fw-medium">Input Barang</label>
                                </div>
                                <div class="">
                                    <input class="form-check-input mx-2" type="checkbox" role="switch" id="butuhCheck" name="check" checked>
                                </div>
                                <div>
                                    <label class="form-check-label text-decoration-line-through" for="butuhCheck" id="lbl-pilih">Pilih Barang</label>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="barang" id="barang"
                            placeholder="Barang dengan batas habis">
                    </div>
                    <div class="mb-3">
                        <label for="barang" class="form-label">Barang dari inventory</label>
                        <select name="barang-exist" id="barang-exist" class="form-select" disabled>
                            <option value="">--- Pilih Barang ---</option>
                            <?php foreach($barang as $row): ?>
                                <option value="<?= $row['nama_barang'] ?>"><?= $row['nama_barang'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">catatan</label>
                        <textarea name="catatan" id="catatan" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal mulai</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal"
                            value="<?= date('Y-m-d') ?>">
                    </div>
                    <div>
                        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-save"></i> Simpan data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function(){
    let butuhCheck = document.querySelector('#butuhCheck')
        let barang = document.getElementById('barang')
        let barangExist = document.getElementById('barang-exist')
        let biaya = document.getElementById('cost')
        let lblInput = document.getElementById('lbl-input')
        let lblPilih = document.getElementById('lbl-pilih')
        
        butuhCheck.addEventListener('click', (e)=>{
            console.log(e.target.checked)
            if(e.target.checked == false){
                barang.setAttribute('disabled','disabled')
                barangExist.removeAttribute('disabled')
                lblPilih.textContent = "Pilih Barang"
                lblPilih.classList.remove('text-decoration-line-through')
                lblPilih.classList.add('fw-medium')
                lblInput.classList.add('text-decoration-line-through')
                lblInput.classList.remove('fw-medium')
                // biaya.setAttribute('disabled', 'disabled')
            }else{
                barang.removeAttribute('disabled')
                barangExist.setAttribute('disabled','disabled')
                // biaya.removeAttribute('disabled')
                lblInput.textContent = "Input Barang"
                lblInput.classList.remove('text-decoration-line-through')
                lblInput.classList.add('fw-medium')
                lblPilih.classList.add('text-decoration-line-through')
                lblPilih.classList.remove('fw-medium')
            }
        })
})
</script>
<?= $this->endSection() ?>