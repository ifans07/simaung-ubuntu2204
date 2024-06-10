<?= $this->extend('templates/template') ?>
<?= $this->section('content') ?>

<section style="height: 100vh">
    <div class="container d-flex justify-content-center align-items-center h-100">
        <div>
            <div class="login-header mb-3">
                <div class="text-center">
                    <h3 class="fw-bolder"><i class="fa-solid fa-money-bill"></i> Simaung <?= lang('Auth.loginTitle') ?></h3>
                </div>
            </div>
            <hr>
            <?= view('Myth\Auth\Views\_message_block') ?>
            <form action="<?= url_to('login') ?>" method="post" class="p-5 rounded" style="background-color: #ecedef; box-shadow: 0 2px 5px rgba(0,0,0,0.1);width:21rem">
                <?= csrf_field() ?>

                <?php if ($config->validFields === ['email']): ?>
                <div class="input-group flex-nowrap mb-3">
                    <label for="username" class="input-group-text <?php if (session('errors.login')) : ?>border border-danger<?php endif ?>" id="basic-addon1" style="background: #fff; border-right:none;"><i class="fa-solid fa-user"></i></label>
                    <input type="email" class="form-control p-2 <?php if (session('errors.login')) : ?>is-invalid<?php endif; ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>" aria-label="Username" aria-describedby="basic-addon1" style="border-left:none;" id="username">
                    <!-- <div class="invalid-feedback">
						<?= session('errors.password') ?>
					</div> -->
                </div>
                <?php else: ?>
                <div class="input-group flex-nowrap mb-3">
                    <label for="username" class="input-group-text <?php if (session('errors.login')) : ?>border border-danger<?php endif ?>" id="basic-addon1" style="background: #fff; border-right:none;"><i class="fa-solid fa-user"></i></label>
                    <input type="text" class="form-control p-2 <?php if (session('errors.login')) : ?>is-invalid<?php endif; ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>" aria-label="Username" aria-describedby="basic-addon1" style="border-left:none;" id="username">
                    <!-- <div class="invalid-feedback">
						<?= session('errors.password') ?>
					</div> -->
                </div>
                <?php endif; ?>

                <div class="input-group flex-nowrap mb-1">
                    <label class="input-group-text lock-toggle <?php if (session('errors.password')) : ?>border border-danger<?php endif ?>" id="basic-addon1" style="background: #fff; border-right:none;cursor:pointer"><i class="fa-solid fa-lock" id="icon-pass"></i></label>
                    <input type="password" class="form-control lock-input p-2 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?=lang('Auth.password')?>" aria-label="Username" aria-describedby="basic-addon1" style="border-left:none;">
                    <!-- <div class="invalid-feedback">
						<?= session('errors.password') ?>
					</div> -->
                </div>

                <?php if ($config->allowRemembering): ?>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" value="" id="flexCheckChecked" <?php if (old('remember')) : ?> checked <?php endif ?>>
                    <label class="form-check-label" for="flexCheckChecked">
                        <?=lang('Auth.rememberMe')?>
                    </label>
                </div>
                <?php endif; ?>
                <div class="input-group flex-nowrap">
                    <button type="submit" class="btn btn-dark w-50 fw-bold"><i class="fa-solid fa-sign-in"></i> <?=lang('Auth.loginAction')?></button>
                    <button class="btn btn-outline-dark w-50 fw-bold"><i class="fa-solid fa-times"></i> Cancel</button>
                </div>
            </form>
                <hr>
            <!-- <div class="d-flex justify-content-center align-items-center gap-4">
                <a href="" class="btn btn-outline-dark fw-bold"><i class="fa-brands fa-google fs-5"></i></a>
                <a href="" class="btn btn-outline-dark fw-bold"><i class="fa-brands fa-github fs-5"></i></a>
            </div> -->
            <div class="mt-5 form-text text-center">
                <span>Belum punya akun? <a href="/register">Daftar disini</a></span>
                <?php if ($config->activeResetter): ?>
					<p><a href="<?= url_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
                <?php endif; ?>
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