<?php
defined('ABSPATH') || exit;

/**
 * Which portfolio design to serve: '' (editorial dark/red), 'v2' or 'v3' (bright studio).
 * The client-approved version is v3.
 */
define('EW_PORTFOLIO_VERSION', 'v3');

/** Where booking inquiries are sent. */
define('EW_BOOKING_EMAIL', 'info@emmanuelwhajah.com');

/**
 * Set to true while the site is not public yet: keeps the password gate
 * and the noindex meta tag from portfolio.html active.
 */
define('EW_PREVIEW_MODE', false);

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});

/**
 * Booking form handler (admin-post.php, action "emmanuel_booking").
 */
function ew_handle_booking() {
    $redirect_url = home_url('/');
    $captcha_a = isset($_POST['captcha_a']) ? absint($_POST['captcha_a']) : 0;
    $captcha_b = isset($_POST['captcha_b']) ? absint($_POST['captcha_b']) : 0;
    $captcha_answer = isset($_POST['captcha_answer']) ? absint($_POST['captcha_answer']) : -1;
    $captcha_token = isset($_POST['captcha_token']) ? sanitize_text_field(wp_unslash($_POST['captcha_token'])) : '';
    $captcha_expected_token = wp_hash($captcha_a . '|' . $captcha_b . '|emmanuel_booking_captcha');
    $captcha_valid = $captcha_a >= 2 && $captcha_a <= 9 && $captcha_b >= 2 && $captcha_b <= 9
        && hash_equals($captcha_expected_token, $captcha_token)
        && $captcha_answer === $captcha_a + $captcha_b;

    if (
        empty($_POST['emmanuel_booking_nonce']) ||
        !wp_verify_nonce(
            sanitize_text_field(wp_unslash($_POST['emmanuel_booking_nonce'])),
            'emmanuel_booking_request'
        ) ||
        !empty($_POST['company_website']) || // honeypot
        !$captcha_valid
    ) {
        wp_safe_redirect(add_query_arg('booking', 'error', $redirect_url) . '#contact');
        exit;
    }

    $name     = isset($_POST['name']) ? sanitize_text_field(wp_unslash($_POST['name'])) : '';
    $email    = isset($_POST['email']) ? sanitize_email(wp_unslash($_POST['email'])) : '';
    $phone    = isset($_POST['phone']) ? sanitize_text_field(wp_unslash($_POST['phone'])) : '';
    $type     = isset($_POST['project_type']) ? sanitize_text_field(wp_unslash($_POST['project_type'])) : '';
    $date     = isset($_POST['project_date']) ? sanitize_text_field(wp_unslash($_POST['project_date'])) : '';
    $location = isset($_POST['location']) ? sanitize_text_field(wp_unslash($_POST['location'])) : '';
    $budget   = isset($_POST['budget']) ? sanitize_text_field(wp_unslash($_POST['budget'])) : '';
    $message  = isset($_POST['message']) ? sanitize_textarea_field(wp_unslash($_POST['message'])) : '';

    if (!$name || !$email || !$type || !$message || !is_email($email) || empty($_POST['privacy'])) {
        wp_safe_redirect(add_query_arg('booking', 'error', $redirect_url) . '#contact');
        exit;
    }

    $body  = "New booking inquiry via " . home_url('/') . "\n\n";
    $body .= "Name: {$name}\n";
    $body .= "Email: {$email}\n";
    $body .= "Phone: {$phone}\n";
    $body .= "Project: {$type}\n";
    $body .= "Preferred date: {$date}\n";
    $body .= "Location: {$location}\n";
    $body .= "Budget: {$budget}\n\n";
    $body .= "Brief:\n{$message}\n";

    $sent = wp_mail(
        EW_BOOKING_EMAIL,
        'New booking inquiry from ' . $name,
        $body,
        ['Reply-To: ' . $name . ' <' . $email . '>']
    );

    wp_safe_redirect(add_query_arg('booking', $sent ? 'success' : 'error', $redirect_url) . '#contact');
    exit;
}
add_action('admin_post_emmanuel_booking', 'ew_handle_booking');
add_action('admin_post_nopriv_emmanuel_booking', 'ew_handle_booking');
