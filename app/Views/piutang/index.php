<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container">
        <div>
            <div>
                <h3 class="rounded p-3 fw-medium fs-1" style="background-color: #f1f2f3;"><i
                        class="fa-solid fa-money"></i>
                    Hutang piutang</h3>
            </div>
            <div class="">
                <div class="my-3">
                    <a href="/piutang/tambah" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah data</a>
                </div>
                <ul class="list-group">
                    <?php foreach ($datapiutang as $row) : ?>
                    <li class="list-group-item">
                        <input type="hidden" value="<?= $row['id'] ?>" class="idpiutang">
                        <a href="/piutang/detail/<?= $row['id'] ?>" class="text-decoration-none">
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
                                            $nama = explode(' ', $row['nama_peminjam']);
                                            $inisial = '';
                                            foreach ($nama as $kata) {
                                                $inisial .= substr($kata, 0, 1);
                                            }
                                            ?>
                                        <span
                                            class="badge text-bg-dark p-3 fs-5 fw-medium"><?= strtoupper($inisial) ?></span>
                                    </div>
                                    <div class="lh-1">
                                        <span class="fw-medium fs-6 text-dark"><?= $row['nama_peminjam'] ?></span>
                                        <div class="mb-2">
                                            <small class="form-text"><?= $row['catatan'] ?></small>
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
                                            value="<?= $row['nominal'] ?>">
                                        <input type="hidden" value="0" class="diterima">
                                    </div>
                                </div>
                                <div class="align-self-center">
                                    <a href="/piutang/update/<?= $row['id'] ?>"
                                        class="badge text-bg-secondary fw-medium fs-6 p-2"><i
                                            class="fa-solid fa-edit"></i></a>
                                    <a href="/piutang/tambah-detail/<?= $row['id'] ?>"
                                        class="badge text-bg-primary fw-medium fs-6 p-2"><i
                                            class="fa-solid fa-plus"></i></a>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
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
    // let tingkat = 0
    // let valueCheck = 0;
    // let array = []
    id.forEach((i, index) => {
        $.getJSON("/piutang/orang-utang/" + i.value, function(data) {
            taruhSini[index].innerHTML = (parseInt(data.piutang.nominal)).toLocaleString(
                'id-ID')
            cicilDisini[index].innerHTML = ('0').toLocaleString('id-ID')
        });

        $.getJSON("/piutang/cicilan/" + i.value, function(data) {
            // let newDiv = document.createElement('div')
            // newDiv.classList.add('text-danger')

            data.cicilan.filter((d) => {
                if (i.value == d.id_piutang) {
                    if (d.status_cicilan == 1) {
                        // ini hasil taruh di element
                        taruhSini[index].textContent = (parseInt(
                                tCicil[index].value) +
                            parseInt(d
                                .jml_cicilan)).toLocaleString('id-ID')
                        // taruhSini[index].appendChild(newDiv)

                        // ini penjumlahan
                        tCicil[index].value = parseInt(
                                tCicil[index].value) +
                            parseInt(d
                                .jml_cicilan)
                    } else {
                        // tingkat += parseInt(d.jml_cicilan)
                        cicilDisini[index].textContent = (parseInt(diterima[index]
                            .value) + parseInt(d.jml_cicilan)).toLocaleString(
                            'id-ID')

                        // ini penjumlahan
                        diterima[index].value = parseInt(diterima[index].value) +
                            parseInt(d.jml_cicilan)
                    }

                }

            })

        });
    })

})
</script>
<?= $this->endSection() ?>