<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | SimaUng</title>
    <meta name="description" content="The small framework with powerful features">

    <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico') ?>">
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- jquery -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.10/index.global.min.js'></script>
    <script src="<?= base_url('node_modules/jquery/dist/jquery.min.js') ?>"></script>

</head>

<body data-bs-theme="">
    <div class="animate-bg"></div>
    <div class="animate-bg1"></div>
    <?= $this->include('templates/header') ?>

    <main id="main">
        <?php if($title != 'Form login | Simaung'): ?>
        <section id="hero" class="hero">
            <div class="container">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <h2>Simaung</h2>
                        <h3>Codeigniter <?= CodeIgniter\CodeIgniter::CI_VERSION ?></h3>
                        <p>Mari kelola uang dengan teratur untuk masa depan yang cemerlang</p>
                    </div>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>
    </main>

    <?php if($title != 'Form login | Simaung'): ?>
        <?= $this->include('templates/footer') ?>
    <?php endif; ?>

    <!-- SCRIPTS -->
    <script src="<?= base_url('js/script.js') ?>"></script>
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }

        // tooltip
        const tooltipTrigger = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTrigger].map(tooltipTriggerEl => new bootstrap.Tooltip(
            tooltipTriggerEl))
    })
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function(){


    let denganRupiah = document.querySelector('.jml-keluar')
    let jmlTf = document.querySelector('.jml-tf')
    let jmlMsk = document.querySelector('.jml-msk')

    const formatRupiah = (angka, prefix)=>{
        let  number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
        
    denganRupiah.addEventListener('keyup', function(e){
        denganRupiah.value = formatRupiah(this.value)
    })

    jmlTf.addEventListener('keyup', function(e){
        jmlTf.value = formatRupiah(this.value)
    })

        const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
            style: "decimal", // format angka biasa atau default
            // style: "currency", // format mata uang seperti RP, $, dll
            // style: "percent" // format persen
            currency: "IDR"
            }).format(number);
        }

    console.log(rupiah(12000))

    $(document).ready(function() {
        let base_url = window.location.origin
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
                    $('#saldo').val(rupiah(data.hasil.saldo))
                }
            })
        })


        // form pemasukan
        $('#dompet-masuk').on('change', function(e) {
            let idDompet = $(this).val()
            $.ajax({
                url: base_url+'/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet
                },
                dataType: 'JSON',
                success: function(data) {
                    $('#saldo-masuk').val(formatRupiah(data.hasil.saldo))
                }
            })
        })

        // transfer dari
        $('#dompet-1-transfer').on('change', function(e) {
            let idDompet1 = $(this).val()
            $.ajax({
                url: base_url+'/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet1
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data)
                    $('#saldo-1-transfer').val(rupiah(data.hasil.saldo))
                }
            })
        })

        // transfer ke
        $('#dompet-2-transfer').on('change', function(e) {
            let idDompet2 = $(this).val()
            $.ajax({
                url: base_url+'/dompet/datajson',
                method: 'POST',
                data: {
                    iddompet: idDompet2
                },
                dataType: 'JSON',
                success: function(data) {
                    console.log(data)
                    $('#saldo-2-transfer').val(formatRupiah(data.hasil.saldo))
                }
            })
        })
    })
})
</script>
</body>

</html>