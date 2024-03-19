<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | SimaUng</title>
    <meta name="description" content="The small framework with powerful features">

    <link rel="shortcut icon" type="image/png" href="<?= base_url('favicon.ico') ?>">
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

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
</body>

</html>