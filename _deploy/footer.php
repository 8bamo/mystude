<?php if (is_page('handwerker-webseite')): // Standalone-Landingpage: eigener Footer im Template ?>
<?php wp_footer(); ?>
</body>
</html>
<?php return; endif; ?>

<footer class="mx-5 mb-5 mt-10 rounded-[32px] border border-white/40 bg-white/24 shadow-soft backdrop-blur-[24px] sm:mx-8 xl:mx-10 2xl:mx-14">
    <div class="mx-auto grid w-full max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[1.2fr_0.8fr_auto] lg:items-start">
        <div class="space-y-3">
            <a class="site-logo inline-flex items-center" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <img src="<?php echo esc_url(content_url('uploads/mystu-logo.svg')); ?>" alt="<?php bloginfo('name'); ?>" class="h-9 w-auto" width="120" height="40">
                <?php endif; ?>
            </a>
            <p class="max-w-sm text-base text-muted">Webdesign-Studio aus dem Raum Stuttgart &amp; Ludwigsburg. Websites, die Kunden bringen.</p>
        </div>

        <nav aria-label="Footer-Navigation">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class'     => 'footer-nav-list flex flex-col gap-3 text-sm font-medium',
                'container'      => false,
                'depth'          => 1,
                'fallback_cb'    => function() {
                    echo '<ul class="footer-nav-list flex flex-col gap-3 text-sm font-medium">';
                    echo '<li><a href="' . esc_url(home_url('/#leistungen')) . '">Leistungen</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/#vorgehen')) . '">Vorgehen</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/#kontakt')) . '">Kontakt</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/datenschutz/')) . '">Datenschutz</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/agb/')) . '">AGB</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/impressum/')) . '">Impressum</a></li>';
                    echo '</ul>';
                },
            ]);
            ?>
        </nav>

        <div>
            <a href="<?php echo esc_url(home_url('/#kontakt')); ?>" class="inline-flex min-h-[3rem] items-center justify-center rounded-full border border-white/40 bg-white/34 px-5 py-3 text-sm font-bold text-ink shadow-soft backdrop-blur-[18px] transition hover:-translate-y-0.5 hover:text-coral">Projekt starten</a>
        </div>
    </div>

    <div class="border-t border-white/35">
        <div class="mx-auto flex w-full max-w-7xl flex-col gap-2 px-5 py-5 text-sm text-muted sm:px-8 md:flex-row md:items-center md:justify-between">
            <p>&copy; <?php echo date('Y'); ?> mystu · <a href="<?php echo esc_url(home_url('/impressum/')); ?>" class="underline underline-offset-2 hover:text-coral">Impressum</a> · <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>" class="underline underline-offset-2 hover:text-coral">Datenschutz</a> · <a href="<?php echo esc_url(home_url('/agb/')); ?>" class="underline underline-offset-2 hover:text-coral">AGB</a> · <a href="#" class="mystu-cookie-settings underline underline-offset-2 hover:text-coral">Cookie-Einstellungen</a></p>
            <p>Webdesign aus dem Raum Stuttgart &amp; Ludwigsburg</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
