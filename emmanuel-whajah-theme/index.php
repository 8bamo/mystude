<?php
/**
 * Serves portfolio.html on every route, adapted for this WordPress install:
 * - booking nonce + admin-post URL are filled in,
 * - the asset <base> points at this theme's directory,
 * - password gate and noindex are stripped (unless EW_PREVIEW_MODE),
 * - the configured design variant class is set on <html>.
 */
defined('ABSPATH') || exit;

$html = file_get_contents(get_template_directory() . '/portfolio.html');

// Booking form: real nonce + this install's admin-post endpoint.
$html = str_replace('{{EMMANUEL_BOOKING_NONCE}}', esc_attr(wp_create_nonce('emmanuel_booking_request')), $html);
$html = str_replace('action="/wp-admin/admin-post.php"', 'action="' . esc_url(admin_url('admin-post.php')) . '"', $html);

// Assets resolve relative to this theme, not mystu.de.
$html = preg_replace(
    '#<base href="[^"]*">#',
    '<base href="' . esc_url(trailingslashit(get_template_directory_uri())) . '">',
    $html
);

// Design variant (the inline path matcher never fires on a real site).
if (EW_PORTFOLIO_VERSION === 'v2' || EW_PORTFOLIO_VERSION === 'v3') {
    $html = str_replace('<html lang="en">', '<html lang="en" class="portfolio-' . EW_PORTFOLIO_VERSION . '">', $html);
}

if (!EW_PREVIEW_MODE) {
    // Public site: no noindex, no password gate.
    $html = str_replace('<meta name="robots" content="noindex">', '', $html);
    $html = str_replace(
        '</head>',
        "<script>try{sessionStorage.setItem('ew_mockup_auth','1')}catch(e){}</script>\n</head>",
        $html
    );
}

echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted theme template.
