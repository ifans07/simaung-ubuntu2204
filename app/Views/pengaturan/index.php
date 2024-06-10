<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section>
    <div class="container-xl">
    <h2 class="mb-4 text-secondary"><i class="fas fa-cog"></i> Pengaturan Akun</h2>
    <div>
        <div class="mb-2">
            <h3 class="p-2 bg-primary" style="color: rgba(0, 0, 0, 0.4)">Akun Saya</h4>
                <div class="d-flex flex-column">
                    <a href="" class="d-flex justify-content-between p-2 text-dark">Keamanan & Akun <i class="fas fa-chevron-right"></i></a>
                    <a href="/pengguna/alamatsaya" class="d-flex justify-content-between p-2 position-relative text-dark">
                        Alamat Saya <i class="fas fa-chevron-right"></i>
                        <?php if (!session()->get('provinsi') && !session()->get('kabupaten')) { ?>
                            <span class="position-absolute bg-warning d-flex justify-content-center align-items-center" style="height: 15px; width: 15px; border-radius: 50%; top: 0; left:0; line-height: 15px; color: #000;">!</span>
                        <?php } ?>
                    </a>
                    <a href="<?= base_url('user/gaji/input-gaji') ?>" class="d-flex justify-content-between p-2 text-dark">Pengaturan Gaji <i class="fas fa-chevron-right"></i></a>
                </div>
        </div>
        <div class="mb-3">
            <h3 class="p-2 bg-primary" style="color: rgba(0, 0, 0, 0.4)">Pengaturan</h3>
            <div class="d-flex flex-column">
                <a href="" class="d-flex justify-content-between p-2 text-dark">Inventory <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Kebutuhan <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Target <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Piutang <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Kalender <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="mb-2">
            <h3 class="p-2 bg-primary" style="color: rgba(0, 0, 0, 0.4)">Bantuan</h3>
            <div class="d-flex flex-column">
                <a href="" class="d-flex justify-content-between p-2 text-dark">Pusat Bantuan <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Peraturan Komunitas <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">kebijakan <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Suka? Nilai Kami <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Informasi <i class="fas fa-chevron-right"></i></a>
                <a href="" class="d-flex justify-content-between p-2 text-dark">Ajukan Penghapusan Akun <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="mb-2">
            <a href="/home/logout" class="btn btn-block" id="logout" style="background-color: transparent; border: 2px solid rgba(0, 0, 0, .4); font-weight: bold; font-size: 16px;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</div>
</section>

<?= $this->endSection() ?>