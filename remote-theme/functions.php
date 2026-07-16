<?php
defined('ABSPATH') || exit;

define('MYSTU_VERSION', '1.4.3');
define('MYSTU_DIR', get_template_directory());
define('MYSTU_URI', get_template_directory_uri());

function mystu_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);
    add_theme_support('automatic-feed-links');
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus([
        'primary' => __('Hauptmenü', 'mystu'),
        'footer'  => __('Footer-Menü', 'mystu'),
    ]);

    add_image_size('mystu-hero', 1600, 900, true);
    add_image_size('mystu-card', 800, 500, true);
    add_image_size('mystu-thumb', 400, 250, true);
}
add_action('after_setup_theme', 'mystu_setup');

function mystu_content_width() {
    $GLOBALS['content_width'] = 860;
}
add_action('after_setup_theme', 'mystu_content_width', 0);

function mystu_favicon() {
    $favicon_url = content_url('uploads/mystu-favicon.svg');
    echo '<link rel="icon" type="image/svg+xml" href="' . esc_url($favicon_url) . '">' . "\n";
    echo '<link rel="shortcut icon" href="' . esc_url($favicon_url) . '">' . "\n";
}
add_action('wp_head', 'mystu_favicon', 1);
add_action('admin_head', 'mystu_favicon', 1);

function mystu_google_analytics() {
    ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TYTYZM3434"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-TYTYZM3434');
    </script>
    <?php
}
add_action('wp_head', 'mystu_google_analytics', 5);

function mystu_enqueue() {
    wp_enqueue_style(
        'mystu-fonts',
        'https://fonts.bunny.net/css?family=playfair-display:400&family=inter:400,600,700&family=montserrat:700&family=roboto-mono:400&display=swap',
        [],
        null
    );

    wp_register_script('mystu-tailwind', 'https://cdn.tailwindcss.com?plugins=forms', [], null, false);
    wp_add_inline_script('mystu-tailwind', "tailwind.config = { theme: { extend: { colors: { sand: '#eef1f0', cream: '#ffffff', ink: '#1a211e', muted: '#606562', coral: '#cc2e39', honey: '#4e4e4e', mint: '#cccfcd' }, fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'], display: ['Playfair Display', 'Georgia', 'serif'], cta: ['Montserrat', 'Inter', 'sans-serif'], mono: ['Roboto Mono', 'monospace'] }, boxShadow: { soft: 'none', strong: 'none' } } } };", 'before');
    wp_enqueue_script('mystu-tailwind');

    wp_enqueue_style('mystu-main', MYSTU_URI . '/assets/css/main.css', ['mystu-fonts'], MYSTU_VERSION);
    wp_enqueue_script('mystu-main', MYSTU_URI . '/assets/js/main.js', [], MYSTU_VERSION, true);
}
add_action('wp_enqueue_scripts', 'mystu_enqueue');

function mystu_register_widgets() {
    register_sidebar([
        'name'          => __('Sidebar Artikel', 'mystu'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets für die Artikel-Sidebar', 'mystu'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'mystu_register_widgets');

function mystu_excerpt_length() {
    return 22;
}
add_filter('excerpt_length', 'mystu_excerpt_length');

function mystu_excerpt_more($more) {
    return '…';
}
add_filter('excerpt_more', 'mystu_excerpt_more');

function mystu_category_color($cat_slug) {
    $colors = [
        'stuttgart-ratgeber' => '#ff7a45',
        'geschenkguides'     => '#f2bf5e',
        'kultur-events'      => '#55c9bb',
    ];
    return $colors[$cat_slug] ?? '#ff7a45';
}

function mystu_get_reading_time($post_id = null) {
    $content = get_post_field('post_content', $post_id ?? get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    return max(1, ceil($word_count / 200));
}

function mystu_handle_collab_request() {
    $redirect_url = wp_get_referer() ?: home_url('/collab-partner/#collab-form');
    $redirect_url = remove_query_arg(['collab_sent', 'collab_error'], $redirect_url);

    if (
        empty($_POST['mystu_collab_nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mystu_collab_nonce'])), 'mystu_collab_request')
    ) {
        wp_safe_redirect(add_query_arg('collab_error', '1', $redirect_url) . '#collab-form');
        exit;
    }

    $name = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $instagram = isset($_POST['instagram']) ? sanitize_text_field(wp_unslash($_POST['instagram'])) : '';
    $type = isset($_POST['type']) ? sanitize_text_field(wp_unslash($_POST['type'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if (!$name || !$email || !$message || !is_email($email)) {
        wp_safe_redirect(add_query_arg('collab_error', '1', $redirect_url) . '#collab-form');
        exit;
    }

    $body = "Name: {$name}\n";
    $body .= "E-Mail: {$email}\n";
    $body .= "Instagram/Website: {$instagram}\n";
    $body .= "Art der Anfrage: {$type}\n\n";
    $body .= "Nachricht:\n{$message}\n";

    $headers = [
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    wp_mail('hallo@mystu.de', 'Collab Anfrage', $body, $headers);

    wp_safe_redirect(add_query_arg('collab_sent', '1', $redirect_url) . '#collab-form');
    exit;
}
add_action('admin_post_mystu_collab_request', 'mystu_handle_collab_request');
add_action('admin_post_nopriv_mystu_collab_request', 'mystu_handle_collab_request');
