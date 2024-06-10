<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<?php 

    // aturan tb_cicilanpiutang
    // 0 = terima/ ditagih
    // 1 = tingkatkan/ minjam lagi
    // $terima = 0;
    // $tingkatkan = 0;
    // $array = [];
    // $array_t = [];
    // foreach($cicilan as $cicil){
    //     if($cicil['status_cicilan'] == 0){
    //         $terima+=$cicil['jml_cicilan'];
    //     }else{
    //         $tingkatkan += $cicil['jml_cicilan'];
    //     }
    // }

?>

<section>
    <div class="container">
        <div class="mb-4">
            <a class="nav-link text-dark" href="<?= base_url('/') ?>" role="tab"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
        </div>
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-money"></i>
                    Hutang piutang</h3>
            </div>
            <div class="">
                <div class="my-3">
                    <a href="<?= base_url('piutang/tambah') ?>" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah data</a>
                </div>
                <?php if(empty($datapiutang)): ?>
                    <div>
                        <small class="form-text">Data kosong!</small>
                    </div>
                <?php endif; ?>
                <ul class="list-group">
                    <?php foreach ($datapiutang as $row=>$val) : ?>
                    <li class="list-group-item">
                        <input type="hidden" value="<?= $val['id'] ?>" class="idpiutang">
                        <a href="<?= base_url('piutang/detail/'.$val['id']) ?>" class="text-decoration-none">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <div>
                                        <?php
                                            // function inisial($nama)
                                            // {
                                            //     $arr = explode(' ', $nama);
                                            //     $singkatan = '';
                                            //     foreach ($arr as $kata) {
                                            //         $singkatan .= substr($kata, 0, 1);
                                            //     }
                                            //     return $singkatan;
                                            // }
                                            $nama = explode(' ', $val['nama_peminjam']);
                                            $inisial = '';
                                            foreach ($nama as $kata) {
                                                $inisial .= substr($kata, 0, 1);
                                            }
                                            ?>
                                        <span
                                            class="badge text-bg-dark p-3 fs-5 fw-medium"><?= strtoupper($inisial) ?></span>
                                    </div>
                                    <div class="lh-1">
                                        <span class="fw-medium fs-6 text-dark"><?= $val['nama_peminjam'] ?></span>
                                        <div class="mb-2 catatan-piutang">
                                            <small class="form-text" style=""><?= $val['catatan'] ?></small>
                                        </div>
                                        <div>
                                            <span class="cicilDisini"></span> <span class="text-dark">/</span>
                                            <span class="taruhDisini text-danger"></span>
                                            <!-- <sup class="text-dark"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                data-bs-title="Total yang udah dicicil/ Total pinjaman"><i
                                                    class="fa-solid fa-info-circle"></i></sup> -->
                                        </div>
                                        <!-- <span class="text-danger">Rp
                                            <?php // number_format($row['nominal'], 0, ',', '.') ?></span> <sup
                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            data-bs-tittle="informasi pinjaman awal peminjam"><i
                                                class="fa-solid fa-info-circle"></i></sup> -->
                                        <input type="hidden" class="form-control-plaintext tCicil"
                                            value="<?= $val['nominal'] ?>">
                                        <input type="hidden" value="0" class="diterima">
                                    </div>
                                </div>
                                <div class="align-self-center flex-column">
                                    <span class=""><a href="<?= base_url('piutang/update/'.$val['id']) ?>" class="badge text-bg-secondary fw-medium fs-6 p-2 cta-edit"><i class="fa-solid fa-edit"></i></a></span>
                                    <span class="cta-tambah"><a href="<?= base_url('piutang/tambah-detail/'.$val['id']) ?>" class="badge text-bg-primary fw-medium fs-6 p-2"><i class="fa-solid fa-plus"></i></a></span>
                                    <span class="verify-lunas"><a href="<?= base_url('piutang/verify-lunas/'.$val['id']) ?>" class="badge text-bg-success fw-medium fs-6 p-2" onclick="confirm('Lunas?')"><i class="fa-solid fa-check"></i></a></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <div class="p-3 border">
                    <div class="form-text d-flex justify-content-between">
                        <span>Total uang yang di piutang: </span>
                        <span id="piutang" class="fw-medium"></span>
                    </div>
                    <div class="form-text d-flex justify-content-between">
                        <span>Total yang udah diganti: </span>
                        <span id="ganti" class="fw-medium"></span>
                    </div>
                    <div class="form-text d-flex justify-content-between">
                        <span>Sisa: </span>
                        <span id="sisa" class="fw-medium"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
$(document).ready(function() {
    let id = document.querySelectorAll('.idpiutang')
    let tCicil = document.querySelectorAll('.tCicil')
    let taruhSini = document.querySelectorAll('.taruhDisini')
    let cicilDisini = document.querySelectorAll('.cicilDisini')
    let diterima = document.querySelectorAll('.diterima')
    let lunasVerify = document.querySelectorAll('.verify-lunas')
    let ctaTambah = document.querySelectorAll('.cta-tambah')
    let ctaEdit = document.querySelectorAll('.cta-edit')

    let piutang = document.getElementById('piutang')
    let ganti = document.getElementById('ganti')
    let sisa = document.getElementById('sisa')
    let nilaiAwalPiutang = 0;
    let nilaiPiutang = 0
    let nilaiGanti = 0
    let nilaiSisa = 0

    let base_url = window.location.href
    // let tingkat = 0
    // let valueCheck = 0;
    // let array = []
    id.forEach((i, index) => {
        $.getJSON(base_url+"/orang-utang/" + i.value, function(data) {
            taruhSini[index].innerHTML = (parseInt(data.piutang.nominal)).toLocaleString(
                'id-ID')
            // cicilDisini[index].innerHTML = ('0').toLocaleString('id-ID')
            nilaiAwalPiutang += parseInt(data.piutang.nominal)
        });

        $.getJSON(base_url+"/cicilan/" + i.value, function(data) {
            // let newDiv = document.createElement('div')
            // newDiv.classList.add('text-danger')
            if(data.cicilan.length == 0){
                cicilDisini[index].innerHTML = ('0').toLocaleString('id-ID')
            }            

            data.cicilan.filter((d) => {
                if (i.value == d.id_piutang) {
                    if (d.status_cicilan == 1) {
                        // ini hasil taruh di element
                        taruhSini[index].textContent = (parseInt(
                                tCicil[index].value) + parseInt(d.jml_cicilan)).toLocaleString('id-ID')
                        // taruhSini[index].appendChild(newDiv)

                        // ini penjumlahan
                        tCicil[index].value = parseInt(tCicil[index].value) + parseInt(d.jml_cicilan)

                        nilaiPiutang += parseInt(d.jml_cicilan)
                    } else {
                        // tingkat += parseInt(d.jml_cicilan)
                        cicilDisini[index].textContent = (parseInt(diterima[index]
                            .value) + parseInt(d.jml_cicilan)).toLocaleString(
                            'id-ID')

                        // ini penjumlahan
                        diterima[index].value = parseInt(diterima[index].value) +
                            parseInt(d.jml_cicilan)

                        nilaiGanti += parseInt(d.jml_cicilan)
                    }
                    // console.log(diterima[index].value)
                    // console.log(taruhSini[index].textContent)
                    // console.log(cicilDisini[index].textContent)

                }

            })

        });
    })

setTimeout(() => {
    console.log(nilaiPiutang)
    console.log(nilaiGanti)
    piutang.innerHTML = "Rp "+(nilaiAwalPiutang+nilaiPiutang).toLocaleString('id-ID')
    ganti.innerHTML = "Rp "+(nilaiGanti).toLocaleString('id-ID')
    sisa.innerHTML = "Rp "+((nilaiAwalPiutang+nilaiPiutang)-nilaiGanti).toLocaleString('id-ID')
    taruhSini.forEach((i, index) => {
        let tingkatkan = i.textContent.split(".")
        let tingkat = tingkatkan.join("")
        let diterima = cicilDisini[index].textContent.split(".")
        let terima = diterima.join("")
        if(tingkat == terima){
            console.log('verify')
            ctaEdit[index].outerHTML = ''
            ctaTambah[index].innerHTML = ''
        }else{
            lunasVerify[index].innerHTML = ''
        }
    });
}, 6000);


})
</script>
<?= $this->endSection() ?>