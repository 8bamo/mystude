<?php
defined('ABSPATH') || exit;

define('MYSTU_VERSION', '1.5.0');
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

// Serve the standalone portfolio mockups at their public WordPress page URLs.
// Keeping the routing here means the demos remain available even if the page
// content in WordPress is empty or the permalink rules are regenerated.
add_action('template_redirect', function(){
    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    $standalone_mockups = [
        'mockup-anwalt'      => 'mockup-anwalt.html',
        'mockup-fahrschule'  => 'mockup-fahrschule.html',
        'mockup-zahnarzt'    => 'mockup-zahnarzt.html',
    ];

    if (isset($standalone_mockups[$uri])) {
        $mockup_file = MYSTU_DIR . '/mockups/' . $standalone_mockups[$uri];
        if (is_readable($mockup_file)) {
            status_header(200);
            header('Content-Type: text/html; charset=UTF-8');
            header('Content-Length: ' . filesize($mockup_file));
            readfile($mockup_file);
            exit;
        }
    }

    // Legacy short URLs: mystu.de/mockups/{name}/ -> actual mockup path.
    if(strpos($uri, 'mockups/') === 0){
        $parts = explode('/', $uri);
        $name = $parts[1] ?? '';
        if($name){
            wp_redirect('/wp-content/themes/mystu/mockups/' . sanitize_key($name) . '/', 301);
            exit;
        }
    }
});

define('MYSTU_GA_ID', 'G-TYTYZM3434');

/**
 * Google Consent Mode v2 default (everything denied) + GA loader.
 * gtag.js is NOT loaded until the visitor opts in via the cookie banner.
 * Returning visitors who already accepted get GA loaded immediately.
 */
function mystu_google_analytics() {
    ?>
    <!-- Consent Mode default + GA loader (mystu) -->
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('consent','default',{
        ad_storage:'denied', ad_user_data:'denied', ad_personalization:'denied',
        analytics_storage:'denied', functionality_storage:'granted',
        security_storage:'granted', wait_for_update:500
    });
    window.MYSTU_GA_ID = <?php echo wp_json_encode(MYSTU_GA_ID); ?>;
    window.mystuLoadGA = function(){
        if(window.__mystuGA) return; window.__mystuGA = 1;
        gtag('consent','update',{analytics_storage:'granted'});
        var s = document.createElement('script');
        s.async = true;
        s.src = 'https://www.googletagmanager.com/gtag/js?id=' + window.MYSTU_GA_ID;
        document.head.appendChild(s);
        gtag('js', new Date());
        gtag('config', window.MYSTU_GA_ID, {anonymize_ip:true});
    };
    // Re-apply prior consent (returning visitor who accepted analytics)
    (function(){
        try{
            var m = document.cookie.match(/(?:^|; )mystu_consent=([^;]+)/);
            if(m && decodeURIComponent(m[1]) === 'granted'){ window.mystuLoadGA(); }
        }catch(e){}
    })();
    </script>
    <?php
}
add_action('wp_head', 'mystu_google_analytics', 5);

/**
 * Cookie-Consent-Banner. Self-contained, scoped styles (.mystu-ck-*) so it
 * works on both the dark front page and the light inner pages.
 * Loads Google Analytics only after the visitor clicks "Alle akzeptieren".
 * Re-open anytime via a link with class "mystu-cookie-settings".
 */
function mystu_consent_banner() {
    $ds = esc_url(home_url('/datenschutz/'));
    ?>
    <style>
    #mystu-ck{position:fixed;top:16px;left:50%;transform:translateX(-50%);z-index:99999;display:none;
        width:min(780px,calc(100% - 24px));padding:18px 22px;
        background:#101110;color:#F4F5F1;border:1px solid rgba(201,255,46,.45);border-radius:14px;
        font-family:'Barlow','Inter',system-ui,sans-serif;box-shadow:0 18px 55px rgba(0,0,0,.6)}
    #mystu-ck.show{display:block}
    .mystu-ck-in{display:flex;flex-wrap:wrap;align-items:center;gap:14px 22px;justify-content:space-between}
    .mystu-ck-txt{flex:1 1 340px;font-size:.86rem;line-height:1.6;color:rgba(244,245,241,.82);margin:0}
    .mystu-ck-txt a{color:#C9FF2E;text-decoration:underline;text-underline-offset:2px}
    .mystu-ck-btns{display:flex;flex-wrap:wrap;gap:10px;flex:0 0 auto}
    .mystu-ck-btn{font-family:'Barlow','Inter',sans-serif;font-weight:600;font-size:.82rem;letter-spacing:.02em;
        cursor:pointer;border-radius:0;padding:11px 22px;border:1px solid rgba(244,245,241,.30);
        background:transparent;color:#F4F5F1;transition:background .25s,color .25s,border-color .25s;line-height:1}
    .mystu-ck-btn:hover{border-color:#F4F5F1}
    .mystu-ck-btn.acc{background:#C9FF2E;color:#0A0A0A;border-color:#C9FF2E}
    .mystu-ck-btn.acc:hover{background:#a8e000;border-color:#a8e000}
    @media(max-width:680px){.mystu-ck-in{flex-direction:column;align-items:stretch}.mystu-ck-btns{justify-content:stretch}.mystu-ck-btn{flex:1}}
    </style>
    <div id="mystu-ck" role="dialog" aria-live="polite" aria-label="Cookie-Hinweis">
      <div class="mystu-ck-in">
        <p class="mystu-ck-txt">Wir verwenden nur technisch notwendige Cookies sowie &ndash; mit deiner Einwilligung &ndash; Google&nbsp;Analytics, um unsere Website zu verbessern. Mehr dazu in der <a href="<?php echo $ds; ?>">Datenschutzerkl&auml;rung</a>.</p>
        <div class="mystu-ck-btns">
          <button type="button" class="mystu-ck-btn" id="mystu-ck-deny">Nur notwendige</button>
          <button type="button" class="mystu-ck-btn acc" id="mystu-ck-acc">Alle akzeptieren</button>
        </div>
      </div>
    </div>
    <script>
    (function(){
      var BAR=document.getElementById('mystu-ck');
      if(!BAR) return;
      function setC(v){var d=new Date();d.setTime(d.getTime()+180*864e5);
        document.cookie='mystu_consent='+v+';expires='+d.toUTCString()+';path=/;SameSite=Lax';}
      function getC(){var m=document.cookie.match(/(?:^|; )mystu_consent=([^;]+)/);return m?decodeURIComponent(m[1]):'';}
      function show(){BAR.classList.add('show');}
      function hide(){BAR.classList.remove('show');}
      var acc=document.getElementById('mystu-ck-acc'),deny=document.getElementById('mystu-ck-deny');
      acc.addEventListener('click',function(){setC('granted');hide();if(window.mystuLoadGA)window.mystuLoadGA();});
      deny.addEventListener('click',function(){setC('denied');hide();});
      if(!getC()) show();
      // Re-open via any "Cookie-Einstellungen" link
      document.querySelectorAll('.mystu-cookie-settings').forEach(function(el){
        el.addEventListener('click',function(e){e.preventDefault();show();});
      });
    })();
    </script>
    <?php
}
add_action('wp_footer', 'mystu_consent_banner', 20);

function mystu_preconnect() {
    echo '<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>' . "\n";
}
add_action('wp_head', 'mystu_preconnect', 0);

function mystu_enqueue() {
    if (is_page('handwerker-webseite')) {
        // Standalone-Landingpage: eigene Fonts + statisch gebautes Tailwind-CSS
        wp_enqueue_style(
            'mystu-fonts',
            'https://fonts.bunny.net/css?family=fraunces:400,500,600,700&family=outfit:400,500,600,700,800&display=swap',
            [],
            null
        );
        wp_enqueue_style('mystu-handwerker', MYSTU_URI . '/assets/css/handwerker.css', ['mystu-fonts'], MYSTU_VERSION);
        wp_enqueue_style('mystu-main', MYSTU_URI . '/assets/css/main.css', ['mystu-fonts'], MYSTU_VERSION);
        wp_enqueue_script('mystu-main', MYSTU_URI . '/assets/js/main.js', [], MYSTU_VERSION, true);
        return;
    }

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

/**
 * Front page ships its own self-contained dark/neon styles.
 * Drop the shared light theme assets (Tailwind, main.css, fonts) there
 * so they cannot clash. Other pages keep them untouched.
 */
function mystu_frontpage_assets() {
    if (is_front_page() || is_page('preise') || is_page_template('page-preise.php') || is_page('impressum') || is_page_template('page-impressum.php') || is_page('datenschutz') || is_page('agb')) {
        wp_dequeue_style('mystu-main');
        wp_dequeue_style('mystu-fonts');
        wp_dequeue_script('mystu-tailwind');
        wp_dequeue_script('mystu-main');
        // Remove WP block/editor scripts not needed on front page
        wp_dequeue_script('wp-embed');
        wp_deregister_script('wp-embed');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }
}
add_action('wp_enqueue_scripts', 'mystu_frontpage_assets', 100);

// Defer all scripts on front page
function mystu_defer_scripts($tag, $handle, $src) {
    if (!is_front_page()) return $tag;
    $no_defer = ['mystu-inline', 'wp-i18n', 'wp-hooks', 'wp-polyfill', 'contact-form-7', 'wpcf7'];
    if (in_array($handle, $no_defer)) return $tag;
    return str_replace(' src=', ' defer src=', $tag);
}
add_filter('script_loader_tag', 'mystu_defer_scripts', 10, 3);

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

    wp_mail('hi@mystu.de', 'Collab Anfrage', $body, $headers);

    wp_safe_redirect(add_query_arg('collab_sent', '1', $redirect_url) . '#collab-form');
    exit;
}
add_action('admin_post_mystu_collab_request', 'mystu_handle_collab_request');
add_action('admin_post_nopriv_mystu_collab_request', 'mystu_handle_collab_request');

/**
 * Lead form on the front page (Webdesign-Anfrage).
 * Sends an email to hi@mystu.de and redirects back to /#kontakt.
 */
function mystu_handle_lead_request() {
    $redirect_url = home_url('/');

    if (
        empty($_POST['mystu_lead_nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mystu_lead_nonce'])), 'mystu_lead_request')
    ) {
        wp_safe_redirect(add_query_arg('lead_error', '1', $redirect_url) . '#kontakt');
        exit;
    }

    $name      = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email     = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $projekt   = isset($_POST['projekt']) ? sanitize_text_field(wp_unslash($_POST['projekt'])) : '';
    $nachricht = isset($_POST['nachricht']) ? sanitize_textarea_field(wp_unslash($_POST['nachricht'])) : '';

    if (!$name || !$email || !$nachricht || !is_email($email)) {
        wp_safe_redirect(add_query_arg('lead_error', '1', $redirect_url) . '#kontakt');
        exit;
    }

    // Datenschutz checkbox
    if (empty($_POST['datenschutz'])) {
        wp_safe_redirect(add_query_arg('lead_error', '1', $redirect_url) . '#kontakt');
        exit;
    }

    // Math CAPTCHA validation
    $cap_answer = isset($_POST['captcha_answer']) ? intval($_POST['captcha_answer']) : -1;
    $cap_token  = isset($_POST['captcha_token']) ? sanitize_text_field(wp_unslash($_POST['captcha_token'])) : '';
    if (!hash_equals(hash_hmac('sha256', $cap_answer, wp_salt('auth')), $cap_token)) {
        wp_safe_redirect(add_query_arg('lead_error', '1', $redirect_url) . '#kontakt');
        exit;
    }

    $body  = "Neue Anfrage über mystu.de\n\n";
    $body .= "Name: {$name}\n";
    $body .= "E-Mail: {$email}\n";
    $body .= "Projekt: {$projekt}\n\n";
    $body .= "Nachricht:\n{$nachricht}\n";

    $headers = [
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    wp_mail('hi@mystu.de', 'Webdesign-Anfrage über mystu.de', $body, $headers);

    wp_safe_redirect(add_query_arg('lead_sent', '1', $redirect_url) . '#kontakt');
    exit;
}
add_action('admin_post_mystu_lead_request', 'mystu_handle_lead_request');
add_action('admin_post_nopriv_mystu_lead_request', 'mystu_handle_lead_request');

// Cache-Header fuer statische Assets via PHP
function mystu_cache_headers() {
    if (is_front_page()) {
        header('Cache-Control: public, max-age=3600, s-maxage=86400');
    }
}
add_action('send_headers', 'mystu_cache_headers');

// Gzip HTML output if client supports it
if (!ob_start('ob_gzhandler')) ob_start();
/* ---------------------------------------------------------------------------
 * GEO / KI-Sichtbarkeit: AI-Crawler explizit erlauben + /llms.txt ausliefern
 * ------------------------------------------------------------------------- */

function mystu_robots_txt_ai($output) {
    $ai_bots = [
        'GPTBot', 'OAI-SearchBot', 'ChatGPT-User',
        'ClaudeBot', 'Claude-Web', 'anthropic-ai',
        'PerplexityBot', 'Perplexity-User',
        'Google-Extended', 'Applebot-Extended', 'CCBot',
        'meta-externalagent', 'Amazonbot', 'DuckAssistBot',
    ];
    $output .= "\n# KI-Crawler ausdruecklich erlaubt (GEO)\n";
    foreach ($ai_bots as $bot) {
        $output .= "User-agent: {$bot}\nAllow: /\n\n";
    }
    $output .= "# Kompakte Firmen-Infos fuer LLMs\n";
    $output .= '# llms.txt: ' . home_url('/llms.txt') . "\n";
    return $output;
}
add_filter('robots_txt', 'mystu_robots_txt_ai');

function mystu_serve_llms_txt() {
    $path = wp_parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH);
    if ($path !== '/llms.txt') {
        return;
    }
    header('Content-Type: text/plain; charset=utf-8');
    header('X-Robots-Tag: llms-txt');
    ?>
# mystu – Webdesign, Onlineshops & Landingpages aus der Region Stuttgart

> mystu baut individuelle Websites, Landingpages und Onlineshops für kleine
> Unternehmen und Handwerksbetriebe in Stuttgart, Ludwigsburg, Heilbronn,
> Heidelberg und Umgebung. Festpreise, laufende Betreuung, lokales SEO.

## Leistungen

- Landingpage: ab 1.490 € einmalig + 149 €/Monat Betreuung (Hosting, Wartung, Updates, Änderungen)
- Business-Website (bis 7 Seiten, CMS): ab 3.900 € einmalig + 349 €/Monat
- Onlineshop (Shopify oder WooCommerce): ab 6.900 € einmalig + 599 €/Monat
- Individuelle Projekte (Portale, Logins, Schnittstellen): auf Anfrage

Immer inklusive: individuelles Design, Texte, lokales SEO, Google-Business-Profil,
DSGVO-Setup, Hosting, Wartung und ein fester Ansprechpartner.

## Spezialisierung: Webseiten für Handwerker

Details: <?php echo esc_url(home_url('/handwerker-webseite/')); ?>

Zielgruppe: Handwerksbetriebe aller Gewerke (Elektrik, SHK, Maler, Schreiner,
Dachdecker, Fliesen, Zimmerei, GaLaBau u. a.) in Baden-Württemberg –
Stuttgart, Ludwigsburg, Heilbronn, Heidelberg, Esslingen, Waiblingen.
Typische Umsetzung: 2–4 Wochen bis zum Launch. Antwort auf Anfragen binnen 24 h.

## Weitere Seiten

- Preise & Pakete: <?php echo esc_url(home_url('/preise/')); ?>

- Startseite (Stuttgart-Magazin): <?php echo esc_url(home_url('/')); ?>

## Kontakt

- E-Mail: hi@mystu.de
- Region: Stuttgart · Ludwigsburg · Heilbronn · Heidelberg (Projekte deutschlandweit möglich)
    <?php
    exit;
}
add_action('init', 'mystu_serve_llms_txt', 0);

/* ---------------------------------------------------------------------------
 * Handwerker-Landingpage (/handwerker-webseite/): SEO-Meta, Schema & Formular
 * ------------------------------------------------------------------------- */

function mystu_is_handwerker_page() {
    return is_page('handwerker-webseite');
}

function mystu_handwerker_document_title($title) {
    if (mystu_is_handwerker_page()) {
        return 'Webseite für Handwerker – Stuttgart, Ludwigsburg, Heilbronn & Heidelberg | mystu';
    }
    return $title;
}
add_filter('pre_get_document_title', 'mystu_handwerker_document_title');

function mystu_handwerker_seo_meta() {
    if (!mystu_is_handwerker_page()) {
        return;
    }

    $description = 'Professionelle Webseiten für Handwerker in Stuttgart, Ludwigsburg, Heilbronn & Heidelberg. Individuelles Design, lokales Google-Ranking, Festpreis ab 1.490 € – inkl. Hosting & Wartung. Jetzt kostenloses Erstgespräch sichern.';
    $url         = get_permalink();
    $image       = MYSTU_URI . '/assets/img/reference-heroes/handwerk-hero-1280.webp';

    $img_768 = MYSTU_URI . '/assets/img/reference-heroes/handwerk-hero-768.webp';
    echo '<link rel="preload" as="image" href="' . esc_url($image) . '" imagesrcset="' . esc_url($img_768) . ' 768w, ' . esc_url($image) . ' 1280w" imagesizes="(min-width: 1024px) 45vw, 92vw" fetchpriority="high">' . "\n";
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:locale" content="de_DE">' . "\n";
    echo '<meta property="og:title" content="Webseite für Handwerker – Region Stuttgart | mystu">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";

    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [
            [
                '@type'       => 'ProfessionalService',
                '@id'         => trailingslashit($url) . '#service',
                'name'        => 'mystu – Webdesign für Handwerker',
                'description' => $description,
                'url'         => $url,
                'image'       => $image,
                'email'       => 'hi@mystu.de',
                'priceRange'  => 'ab 1.490 €',
                'areaServed'  => array_map(static function ($city) {
                    return ['@type' => 'City', 'name' => $city];
                }, ['Stuttgart', 'Ludwigsburg', 'Heilbronn', 'Heidelberg', 'Esslingen', 'Waiblingen']),
                'makesOffer'  => [
                    '@type'       => 'Offer',
                    'name'        => 'Handwerker-Landingpage',
                    'description' => 'Individuelle Webseite für Handwerksbetriebe inkl. lokalem SEO, Hosting und Wartung.',
                    'priceCurrency' => 'EUR',
                    'price'       => '1490',
                ],
            ],
            [
                '@type'           => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Start', 'item' => home_url('/')],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Webseite für Handwerker', 'item' => $url],
                ],
            ],
        ],
    ];
    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}
add_action('wp_head', 'mystu_handwerker_seo_meta', 4);

function mystu_handle_handwerker_request() {
    $redirect_url = wp_get_referer() ?: home_url('/handwerker-webseite/');
    $redirect_url = remove_query_arg(['handwerker_sent', 'handwerker_error'], $redirect_url);

    if (
        empty($_POST['mystu_handwerker_nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mystu_handwerker_nonce'])), 'mystu_handwerker_request')
    ) {
        wp_safe_redirect(add_query_arg('handwerker_error', '1', $redirect_url) . '#anfrage');
        exit;
    }

    $name    = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email   = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone   = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $gewerk  = isset($_POST['gewerk']) ? sanitize_text_field(wp_unslash($_POST['gewerk'])) : '';
    $message = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if (!$name || !$email || !$gewerk || !$message || !is_email($email)) {
        wp_safe_redirect(add_query_arg('handwerker_error', '1', $redirect_url) . '#anfrage');
        exit;
    }

    $body  = "Name/Betrieb: {$name}\n";
    $body .= "E-Mail: {$email}\n";
    $body .= "Telefon: {$phone}\n";
    $body .= "Gewerk: {$gewerk}\n\n";
    $body .= "Nachricht:\n{$message}\n";

    $headers = [
        'Reply-To: ' . $name . ' <' . $email . '>',
    ];

    wp_mail('hi@mystu.de', 'Handwerker-Webseite Anfrage', $body, $headers);

    wp_safe_redirect(add_query_arg('handwerker_sent', '1', $redirect_url) . '#anfrage');
    exit;
}
add_action('admin_post_mystu_handwerker_request', 'mystu_handle_handwerker_request');
add_action('admin_post_nopriv_mystu_handwerker_request', 'mystu_handle_handwerker_request');
