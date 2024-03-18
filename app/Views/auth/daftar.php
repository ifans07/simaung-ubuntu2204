<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section style="height: 100vh">
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div>
            <div class="login-header mb-3">
                <div class="text-center">
                    <h3 class="fw-bolder"><i class="fa-solid fa-money-bill"></i> Simaung | <?=lang('Auth.register')?></h3>
                </div>
            </div>
            <hr>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form action="<?= url_to('register') ?>" method="post" class="p-5 rounded" style="background-color: #ecedef;width:21rem">
                <?= csrf_field() ?>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text <?php if (session('errors.email')) : ?>border border-danger<?php endif ?>" id="basic-addon1" style="background: #fff; border-right:none;"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" class="form-control p-2 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" aria-label="Username" aria-describedby="basic-addon1" style="border-left:none;">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text <?php if (session('errors.username')) : ?>border border-danger<?php endif ?>" id="basic-addon1" style="background: #fff; border-right:none;"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control p-2 <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>" aria-label="Username" aria-describedby="basic-addon1" style="border-left:none;">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text lock-toggle <?php if (session('errors.password')) : ?>border border-danger<?php endif ?>" id="basic-addon1" style="background: #fff; border-right:none;cursor:pointer"><i class="fa-solid fa-lock" id="icon-pass"></i></span>
                    <input type="password" class="form-control lock-input p-2 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" style="border-left:none;">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text lock-toggle <?php if (session('errors.pass_confirm')) : ?>border border-danger<?php endif ?>" id="basic-addon1" style="background: #fff; border-right:none;cursor:pointer"><i class="fa-solid fa-lock" id="icon-pass"></i></span>
                    <input type="password" class="form-control lock-input p-2 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" style="border-left:none;">
                </div>

                <div class="input-group flex-nowrap">
                    <button class="btn btn-dark w-50 fw-bold"><i class="fa-solid fa-sign-in"></i> <?=lang('Auth.register')?></button>
                    <button class="btn btn-outline-dark w-50 fw-bold"><i class="fa-solid fa-times"></i> Cancel</button>
                </div>
            </form>
                <hr>
            <div class="d-flex justify-content-center align-items-center gap-4">
                <a href="" class="btn btn-outline-dark fw-bold"><i class="fa-brands fa-google fs-5"></i></a>
                <a href="" class="btn btn-outline-dark fw-bold"><i class="fa-brands fa-github fs-5"></i></a>
            </div>
            <div class="mt-5 form-text text-center">
                <span>Sudah punya akun? <a href="/login">Login</a></span>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded',()=>{
        let lockToggle = document.querySelector('.lock-toggle');
        let lockInput = document.querySelector('.lock-input');
        let iconLock = document.querySelector('#icon-pass')

        lockToggle.addEventListener('click', ()=>{
            if(lockInput.getAttribute('type') == 'password'){
                lockInput.setAttribute('type', 'text')
                iconLock.classList.remove('fa-lock')
                iconLock.classList.add('fa-lock-open')
            }else{
                lockInput.setAttribute('type','password')
                iconLock.classList.remove('fa-lock-open')
                iconLock.classList.add('fa-lock')
            }
        })
    })
</script>

<?= $this->endSection() ?>