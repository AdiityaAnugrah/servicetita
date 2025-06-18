<!doctype html>
<html lang="en" data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" dir="ltr" data-pc-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able is a trending dashboard template made using Bootstrap 5 design framework. It is available in Bootstrap, React, CodeIgniter, Angular, and .NET Technologies." />
    <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
    <meta name="author" content="CodedThemes" />

    <title>Home | Datta Able Dashboard Template</title>

    <!-- [Favicon] -->
    <link rel="icon" href="<?= base_url('../template/dist/assets/images/favicon.svg'); ?>" type="image/x-icon" />

    <!-- [Google Font: Open Sans] -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />

    <!-- [Icons] -->
    <link rel="stylesheet" href="<?= base_url('../template/dist/assets/fonts/phosphor/duotone/style.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('../template/dist/assets/fonts/tabler-icons.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('../template/dist/assets/fonts/feather.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('../template/dist/assets/fonts/fontawesome.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('../template/dist/assets/fonts/material.css'); ?>" />

    <!-- [Main CSS] -->
    <link rel="stylesheet" href="<?= base_url('../template/dist/assets/css/style.css'); ?>" id="main-style-link" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <!-- [Header] -->
    <?= $this->include('layout/header'); ?>

    <!-- [Sidebar] -->
    <?= $this->include('layout/sidebar'); ?>

    <!-- [Main Container] -->
    <div class="pc-container">
        <!-- [Dynamic Content] -->
        <?= $this->renderSection('content'); ?>

        <!-- [Loader] -->
        <div class="loader-bg fixed inset-0 bg-white dark:bg-themedark-cardbg z-[1034]">
            <div class="loader-track h-[5px] w-full inline-block absolute overflow-hidden top-0">
                <div class="loader-fill w-[300px] h-[5px] bg-primary-500 absolute top-0 left-0 animate-[hitZak_0.6s_ease-in-out_infinite_alternate]"></div>
            </div>
        </div>

    </div>

    <!-- [Footer] -->
    <?= $this->include('layout/footer'); ?>

</body>

</html>x