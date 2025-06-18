</div> <!-- penutup Main Content -->
</div> <!-- penutup Container Utama -->

<!-- [ Footer ] start -->
<footer class="pc-footer">
    <div class="footer-wrapper container-fluid mx-10">
        <div class="grid grid-cols-12 gap-1.5">
            <div class="col-span-12 sm:col-span-6 my-1">
                <p class="m-0">
                    <a href="https://codedthemes.com/"
                        class="text-theme-bodycolor dark:text-themedark-bodycolor hover:text-primary-500 dark:hover:text-primary-500"
                        target="_blank">CodedThemes</a>, Built with ♥ for a smoother web presence.
                </p>
            </div>
            <div class="col-span-12 sm:col-span-6 my-1 justify-self-end">
                <p class="inline-block max-sm:mr-3 sm:ml-2">
                    Distributed by <a href="https://themewagon.com" target="_blank">Themewagon</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- [ Footer ] end -->

<!-- [ Scripts ] start -->
<!-- Plugin JS -->
<script src="<?= base_url('../template/dist/assets/js/plugins/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('../template/dist/assets/js/plugins/popper.min.js'); ?>"></script>

<!-- Icon JS -->
<script src="<?= base_url('../template/dist/assets/js/icon/custom-icon.js'); ?>"></script>
<script src="<?= base_url('../template/dist/assets/js/plugins/feather.min.js'); ?>"></script>
<script>
    feather.replace(); // Aktifkan feather icons
</script>

<!-- Component & Theme JS -->
<script src="<?= base_url('../template/dist/assets/js/component.js'); ?>"></script>
<script src="<?= base_url('../template/dist/assets/js/theme.js'); ?>"></script>
<script src="<?= base_url('../template/dist/assets/js/script.js'); ?>"></script>

<!-- Floating Button (Kosong) -->
<!-- <div class="floting-button fixed bottom-[50px] right-[30px] z-[1030]"> -->
</div>

<!-- Layout Config Scripts -->
<script>
    layout_change('false');
</script>
<script>
    layout_theme_sidebar_change('dark');
</script>
<script>
    change_box_container('false');
</script>
<script>
    layout_caption_change('true');
</script>
<script>
    layout_rtl_change('false');
</script>
<script>
    preset_change('preset-1');
</script>
<script>
    main_layout_change('vertical');
</script>
<!-- [ Scripts ] end -->

</body>
<!-- [ Body ] end -->