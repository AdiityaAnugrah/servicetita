<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <!-- Header Logo -->
        <div class="m-header flex items-center py-4 px-6 h-header-height">
            <a href="<?= base_url('dashboard'); ?>" class="b-brand flex items-center gap-3">
                <!-- Ganti logo di sini -->
                <img src="<?= base_url('template/dist/assets/images/logo-white.svg'); ?>" class="img-fluid logo logo-lg" alt="logo" />
                <img src="<?= base_url('template/dist/assets/images/favicon.svg'); ?>" class="img-fluid logo logo-sm" alt="logo" />
            </a>
        </div>

        <!-- Sidebar Menu Content -->
        <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
            <ul class="pc-navbar">
                <!-- Navigation Section -->
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('/'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">DASHBOARD</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_antri'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">WAITING REPAIR</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_bongkar'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">BONGKAR</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_dempul'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">DEMPUL</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_cat'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">CAT</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_poles'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">POLES</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_finish'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">FINISHING</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_siapkeluar'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">SIAP KELUAR</span>
                    </a>
                </li>

                <li class="pc-item">
                    <a href="<?= base_url('proses/view_keluar'); ?>" class="pc-link">
                        <span class="pc-micon"><i data-feather="home"></i></span>
                        <span class="pc-mtext">KELUAR</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ Sidebar Menu ] end -->