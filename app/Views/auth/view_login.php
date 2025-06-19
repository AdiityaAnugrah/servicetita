<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?= base_url('template/dist/assets/images/favicon.svg') ?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url('template/dist/assets/css/style.css') ?>" />
</head>

<body>
    <div class="auth-main">
        <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
            <div class="auth-form flex items-center justify-center grow flex-col min-h-screen p-6">
                <div class="w-full max-w-[350px]">
                    <div class="card sm:my-12 w-full">
                        <div class="card-body p-10">
                            <div class="text-center mb-8">
                                <img src="<?= base_url('template/dist/assets/images/logo-dark.svg') ?>" alt="Logo"
                                    class="mx-auto auth-logo" />
                            </div>
                            <h4 class="text-center font-medium mb-4">Login</h4>

                            <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif; ?>

                            <form action="/login" method="post">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        required />
                                </div>
                                <div class="mb-4 text-center">
                                    <button type="submit" class="btn btn-primary w-full">Login</button>
                                </div>
                                <div class="text-center">
                                    <a href="/register" class="text-primary-500">Belum punya akun? Daftar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('template/dist/assets/js/script.js') ?>"></script>
</body>

</html>