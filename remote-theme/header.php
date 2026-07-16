<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class('text-ink antialiased'); ?>>
<?php wp_body_open(); ?>

<a class="skip-link sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[9999] focus:rounded focus:bg-black focus:px-4 focus:py-3 focus:text-sm focus:font-bold focus:text-white" href="#main">Zum Inhalt springen</a>

<header class="site-header fixed inset-x-0 top-0 z-50 transition-all duration-200" id="site-header">
    <div class="mx-auto grid w-full max-w-7xl grid-cols-[auto_1fr_auto] items-center gap-4 border-b border-black/15 bg-white px-5 py-4 sm:px-8">
        <div class="flex items-center gap-4">
            <a class="site-logo inline-flex items-center" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php if (has_custom_logo()): ?>
                    <?php the_custom_logo(); ?>
                <?php else: ?>
                    <img src="<?php echo esc_url(content_url('uploads/mystu-logo.svg')); ?>" alt="<?php bloginfo('name'); ?>" class="h-9 w-auto" width="120" height="40">
                <?php endif; ?>
            </a>
        </div>

        <nav class="primary-nav flex justify-center" id="primary-nav" aria-label="Hauptnavigation">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class'     => 'nav-list inline-flex items-center justify-center gap-6 p-0',
                'container'      => false,
                'fallback_cb'    => function() {
                    echo '<ul class="nav-list inline-flex items-center justify-center gap-6 p-0">';
                    echo '<li><a href="' . esc_url(home_url('/')) . '">Start</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/category/geschenkguides/')) . '">Geschenke</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/events/')) . '">Events</a></li>';
                    echo '<li><a href="' . esc_url(home_url('/collab-partner/')) . '">Collab</a></li>';
                    echo '</ul>';
                },
            ]);
            ?>
        </nav>

        <div class="flex items-center justify-end gap-3">
            <a href="https://mystu.shop" target="_blank" rel="noopener" class="hidden min-h-[2.75rem] items-center justify-center rounded border border-black bg-black px-5 py-3 text-sm font-bold text-white transition md:inline-flex">Shop</a>
            <button class="nav-toggle h-11 w-11 items-center justify-center rounded border border-black/20 bg-white md:hidden" id="nav-toggle" aria-label="Menü öffnen" aria-expanded="false" aria-controls="primary-nav">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>
