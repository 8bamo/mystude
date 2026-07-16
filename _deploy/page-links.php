<?php
/*
 * Template Name: Links
 * Template Post Type: page
 */
defined('ABSPATH') || exit;

$links = [
    [
        'label'       => "We are Cannstatt",
        'description' => 'Das neue Stuttgart Shirt – Regular Fit in vier Farben',
        'url'         => 'https://mystu.shop/products/stuttgart-shirt-we-are-cannstatt-regular',
        'accent'      => 'red',
        'external'    => true,
        'featured'    => true,
        'icon'        => 'shirt',
    ],
    [
        'label'       => 'mystu.shop entdecken',
        'description' => 'Stuttgart zum Anziehen & Verschenken',
        'url'         => 'https://mystu.shop',
        'accent'      => 'coral',
        'external'    => true,
        'icon'        => 'bag',
    ],
    [
        'label'       => 'Stuttgart entdecken',
        'description' => 'Lieblingsorte, Geschichten und Tipps für deine Stadt',
        'url'         => home_url('/ueber-stuttgart/'),
        'accent'      => 'mint',
        'icon'        => 'spark',
    ],
    [
        'label'       => 'Events entdecken',
        'description' => 'Kultur, Konzerte und besondere Orte',
        'url'         => home_url('/events/'),
        'accent'      => 'honey',
        'icon'        => 'calendar',
    ],
    [
        'label'       => 'Geschenkideen aus Stuttgart',
        'description' => 'Kuratiert statt lange gesucht',
        'url'         => home_url('/category/geschenkguides/'),
        'accent'      => 'lilac',
        'icon'        => 'gift',
    ],
    [
        'label'       => 'Collab & Partner',
        'description' => 'Gemeinsam etwas Gutes für Stuttgart machen',
        'url'         => home_url('/collab-partner/'),
        'accent'      => 'blue',
        'icon'        => 'people',
    ],
    [
        'label'       => 'Website oder Shop mit mystu',
        'description' => 'Design, Entwicklung und laufende Betreuung',
        'url'         => home_url('/preise/'),
        'accent'      => 'ink',
        'icon'        => 'screen',
    ],
];

function mystu_link_icon($name) {
    $icons = [
        'shirt'    => '<path d="m8 4-5 2.5L5 11l2-1v10h10V10l2 1 2-4.5L16 4c-.7 1.2-2.1 2-4 2S8.7 5.2 8 4Z"/>',
        'bag'      => '<path d="M8 9V7a4 4 0 0 1 8 0v2"/><path d="M5.5 9h13l-1 11h-11l-1-11Z"/>',
        'spark'    => '<path d="m12 2 1.55 5.45L19 9l-5.45 1.55L12 16l-1.55-5.45L5 9l5.45-1.55L12 2Z"/><path d="m18.5 15 .7 2.3 2.3.7-2.3.7-.7 2.3-.7-2.3-2.3-.7 2.3-.7.7-2.3Z"/>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="3"/><path d="M16 3v4M8 3v4M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01"/>',
        'gift'     => '<path d="M20 12v9H4v-9M2 7h20v5H2zM12 7v14"/><path d="M12 7H7.5a2.5 2.5 0 1 1 2.1-3.85L12 7Zm0 0h4.5a2.5 2.5 0 1 0-2.1-3.85L12 7Z"/>',
        'people'   => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'screen'   => '<rect x="2" y="3" width="20" height="14" rx="3"/><path d="M8 21h8M12 17v4"/>',
    ];

    return '<svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">' . ($icons[$name] ?? $icons['spark']) . '</svg>';
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        body.page-template-page-links { margin: 0; background: #f8f1e7; color: #1f2d2f; }
        .linkhub { position: relative; min-height: 100svh; overflow: hidden; isolation: isolate; padding: 28px 18px 36px; font-family: Outfit, system-ui, sans-serif; }
        .linkhub::before, .linkhub::after { content: ""; position: fixed; z-index: -2; width: 42rem; height: 42rem; border-radius: 50%; filter: blur(1px); opacity: .62; animation: hub-drift 12s ease-in-out infinite alternate; pointer-events: none; }
        .linkhub::before { top: -27rem; left: -17rem; background: #ffb996; }
        .linkhub::after { right: -25rem; bottom: -28rem; background: #aee6dd; animation-delay: -5s; }
        .linkhub__grain { position: fixed; inset: 0; z-index: -1; opacity: .22; pointer-events: none; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='.13'/%3E%3C/svg%3E"); }
        .linkhub__wrap { width: min(100%, 620px); margin: 0 auto; }
        .linkhub__top { display: flex; align-items: center; justify-content: space-between; min-height: 48px; opacity: 0; animation: hub-rise .55s ease forwards; }
        .linkhub__home, .linkhub__share { display: inline-flex; align-items: center; justify-content: center; border: 1px solid rgba(31,45,47,.12); background: rgba(255,255,255,.46); box-shadow: 0 12px 36px rgba(83,61,44,.08); backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px); }
        .linkhub__home { min-height: 44px; border-radius: 999px; padding: 0 17px; color: inherit; font-size: .78rem; font-weight: 700; text-decoration: none; }
        .linkhub__share { width: 44px; height: 44px; padding: 0; border-radius: 50%; color: inherit; cursor: pointer; }
        .linkhub__share svg { width: 18px; }
        .linkhub__profile { padding: 30px 12px 26px; text-align: center; opacity: 0; animation: hub-rise .65s .08s ease forwards; }
        .linkhub__mark { display: grid; place-items: center; width: 92px; height: 92px; margin: 0 auto 22px; border-radius: 30px; border: 1px solid rgba(255,255,255,.7); background: rgba(255,255,255,.6); box-shadow: 0 24px 60px rgba(121,75,43,.13); transform: rotate(-3deg); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); }
        .linkhub__mark img { max-width: 72px; max-height: 44px; width: auto; height: auto; }
        .linkhub__fallback { font: 700 1.45rem/1 Fraunces, Georgia, serif; letter-spacing: -.04em; }
        .linkhub h1 { margin: 0; font: 600 clamp(2.8rem, 10vw, 4.3rem)/.9 Fraunces, Georgia, serif; letter-spacing: -.055em; }
        .linkhub__intro { max-width: 430px; margin: 14px auto 0; color: #667270; font-size: .98rem; line-height: 1.55; }
        .linkhub__kicker { display: inline-flex; align-items: center; gap: 8px; margin-top: 17px; color: #e85f2d; font-size: .68rem; font-weight: 800; letter-spacing: .16em; text-transform: uppercase; }
        .linkhub__kicker::before { content: ""; width: 7px; height: 7px; border-radius: 50%; background: #55c9bb; box-shadow: 0 0 0 5px rgba(85,201,187,.13); }
        .linkhub__list { display: grid; gap: 12px; margin-top: 4px; }
        .linkhub__link { --accent: #ff7a45; display: grid; grid-template-columns: 50px minmax(0,1fr) 30px; align-items: center; gap: 14px; min-height: 82px; padding: 13px 17px 13px 13px; border: 1px solid rgba(255,255,255,.72); border-radius: 26px; color: #1f2d2f; background: rgba(255,255,255,.56); box-shadow: 0 16px 45px rgba(109,76,51,.08); text-decoration: none; backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); opacity: 0; transform: translateY(14px); animation: hub-rise .55s ease forwards; transition: transform .22s ease, background .22s ease, box-shadow .22s ease; }
        .linkhub__link:nth-child(1) { animation-delay: .16s; } .linkhub__link:nth-child(2) { animation-delay: .22s; } .linkhub__link:nth-child(3) { animation-delay: .28s; } .linkhub__link:nth-child(4) { animation-delay: .34s; } .linkhub__link:nth-child(5) { animation-delay: .4s; } .linkhub__link:nth-child(6) { animation-delay: .46s; } .linkhub__link:nth-child(7) { animation-delay: .52s; }
        .linkhub__link[data-accent="red"] { --accent: #d92f37; } .linkhub__link[data-accent="mint"] { --accent: #55c9bb; } .linkhub__link[data-accent="honey"] { --accent: #f2b94b; } .linkhub__link[data-accent="lilac"] { --accent: #ad8ad4; } .linkhub__link[data-accent="blue"] { --accent: #659bc7; } .linkhub__link[data-accent="ink"] { --accent: #1f2d2f; }
        .linkhub__link[data-featured="true"] { border-color: rgba(217,47,55,.25); background: linear-gradient(125deg, rgba(255,255,255,.88), rgba(255,232,225,.78)); box-shadow: 0 20px 55px rgba(183,54,44,.15); }
        .linkhub__badge { display: inline-flex; margin: 0 0 5px; border-radius: 999px; padding: 3px 7px; color: white; background: #d92f37; font-size: .58rem; font-weight: 800; letter-spacing: .12em; line-height: 1; text-transform: uppercase; }
        .linkhub__icon { display: grid; place-items: center; width: 50px; height: 50px; border-radius: 17px; color: white; background: var(--accent); box-shadow: 0 10px 24px color-mix(in srgb, var(--accent) 28%, transparent); transition: transform .22s ease; }
        .linkhub__icon svg { width: 23px; height: 23px; }
        .linkhub__copy strong, .linkhub__copy small { display: block; }
        .linkhub__copy strong { font-size: .98rem; line-height: 1.2; }
        .linkhub__copy small { margin-top: 5px; color: #6e7a7a; font-size: .75rem; line-height: 1.3; }
        .linkhub__arrow { font-size: 1.25rem; transition: transform .22s ease; }
        .linkhub__link:hover, .linkhub__link:focus-visible { transform: translateY(-3px); background: rgba(255,255,255,.82); box-shadow: 0 22px 50px rgba(109,76,51,.13); outline: none; }
        .linkhub__link:hover .linkhub__icon, .linkhub__link:focus-visible .linkhub__icon { transform: rotate(-5deg) scale(1.04); }
        .linkhub__link:hover .linkhub__arrow, .linkhub__link:focus-visible .linkhub__arrow { transform: translateX(4px); }
        .linkhub__footer { padding: 30px 12px 0; text-align: center; color: #78817f; font-size: .72rem; opacity: 0; animation: hub-rise .55s .54s ease forwards; }
        .linkhub__footer a { color: inherit; text-underline-offset: 4px; }
        .linkhub__toast { position: fixed; left: 50%; bottom: 24px; z-index: 10; transform: translate(-50%,18px); padding: 10px 16px; border-radius: 999px; color: white; background: #1f2d2f; font-size: .75rem; font-weight: 700; opacity: 0; pointer-events: none; transition: .25s ease; }
        .linkhub__toast.is-visible { transform: translate(-50%,0); opacity: 1; }
        @keyframes hub-rise { to { opacity: 1; transform: translateY(0); } }
        @keyframes hub-drift { to { transform: translate3d(5vw,4vh,0) scale(1.08); } }
        @media (max-width: 480px) { .linkhub { padding-inline: 12px; } .linkhub__profile { padding-top: 22px; } .linkhub__copy small { font-size: .71rem; } }
        @media (prefers-reduced-motion: reduce) {
            .linkhub::before, .linkhub::after,
            .linkhub__top, .linkhub__profile, .linkhub__link, .linkhub__footer { animation: none !important; }
            .linkhub__top, .linkhub__profile, .linkhub__link, .linkhub__footer { opacity: 1 !important; transform: none !important; }
            .linkhub__link, .linkhub__icon, .linkhub__arrow, .linkhub__toast { transition: none !important; }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main class="linkhub" id="main">
    <div class="linkhub__grain" aria-hidden="true"></div>
    <div class="linkhub__wrap">
        <nav class="linkhub__top" aria-label="Seitennavigation">
            <a class="linkhub__home" href="<?php echo esc_url(home_url('/')); ?>">← mystu.de</a>
            <button class="linkhub__share" type="button" id="linkhub-share" aria-label="Diese Seite teilen">
                <svg viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.6 10.5 6.8-4M8.6 13.5l6.8 4"/></svg>
            </button>
        </nav>

        <header class="linkhub__profile">
            <a class="linkhub__mark" href="<?php echo esc_url(home_url('/')); ?>" aria-label="mystu Startseite">
                <?php
                $logo_id = get_theme_mod('custom_logo');
                if ($logo_id) {
                    echo wp_get_attachment_image($logo_id, 'full', false, ['alt' => get_bloginfo('name')]);
                } else {
                    echo '<span class="linkhub__fallback">mystu</span>';
                }
                ?>
            </a>
            <h1>Stuttgart.<br>Alles hier.</h1>
            <p class="linkhub__intro">Events, Geschenkideen, Lieblingsstücke und alles, was Stuttgart ein bisschen besser macht.</p>
            <span class="linkhub__kicker">Kuratiert von mystu</span>
        </header>

        <div class="linkhub__list" aria-label="mystu Links">
            <?php foreach ($links as $link): ?>
                <a class="linkhub__link" data-accent="<?php echo esc_attr($link['accent']); ?>" <?php echo !empty($link['featured']) ? 'data-featured="true"' : ''; ?> href="<?php echo esc_url($link['url']); ?>" <?php echo !empty($link['external']) ? 'target="_blank" rel="noopener"' : ''; ?>>
                    <span class="linkhub__icon"><?php echo mystu_link_icon($link['icon']); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <span class="linkhub__copy"><?php if (!empty($link['featured'])): ?><span class="linkhub__badge">Neu</span><?php endif; ?><strong><?php echo esc_html($link['label']); ?></strong><small><?php echo esc_html($link['description']); ?></small></span>
                    <span class="linkhub__arrow" aria-hidden="true">→</span>
                </a>
            <?php endforeach; ?>
        </div>

        <footer class="linkhub__footer">
            <p>© <?php echo esc_html(wp_date('Y')); ?> mystu · <a href="mailto:hi@mystu.de">hi@mystu.de</a></p>
            <p><a href="<?php echo esc_url(home_url('/impressum/')); ?>">Impressum</a> · <a href="<?php echo esc_url(home_url('/agb/')); ?>">AGB</a> · <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>">Datenschutz</a> · <a href="<?php echo esc_url(home_url('/widerruf/')); ?>">Widerruf</a></p>
        </footer>
    </div>
    <div class="linkhub__toast" id="linkhub-toast" role="status" aria-live="polite">Link kopiert</div>
</main>
<script>
    (() => {
        const button = document.getElementById('linkhub-share');
        const toast = document.getElementById('linkhub-toast');
        if (!button) return;
        button.addEventListener('click', async () => {
            try {
                if (navigator.share) {
                    await navigator.share({ title: document.title, url: window.location.href });
                    return;
                }
                await navigator.clipboard.writeText(window.location.href);
                toast.classList.add('is-visible');
                window.setTimeout(() => toast.classList.remove('is-visible'), 1800);
            } catch (error) {
                if (error.name !== 'AbortError') window.prompt('Link kopieren:', window.location.href);
            }
        });
    })();
</script>
<?php wp_footer(); ?>
</body>
</html>
