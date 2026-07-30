<?php
/**
 * Front Page — mystu Webdesign-Agentur
 * Self-contained template: ships its own nav, styles and footer.
 * Does NOT load header.php / footer.php so the shared (light) layout
 * used by the other pages stays untouched.
 */
defined('ABSPATH') || exit;
$lead_sent  = isset($_GET['lead_sent']);
$lead_error = isset($_GET['lead_error']);
// Stateless math CAPTCHA token
$cap_n1    = wp_rand(2, 9);
$cap_n2    = wp_rand(1, $cap_n1 - 1);
$cap_token = hash_hmac('sha256', ($cap_n1 - $cap_n2), wp_salt('auth'));

/**
 * Language: an explicit ?lang=de|en switch wins and is remembered in a
 * cookie for a year. Failing that, a previously-set cookie wins. Failing
 * that, we go by the browser's Accept-Language header (its top-priority
 * tag) — no GeoIP/IP lookup involved. No signal at all defaults to German.
 */
if (isset($_GET['lang']) && in_array($_GET['lang'], ['de', 'en'], true)) {
    $lang = $_GET['lang'];
    if (!headers_sent()) {
        setcookie('mystu_lang', $lang, time() + YEAR_IN_SECONDS, '/');
    }
} elseif (isset($_COOKIE['mystu_lang']) && in_array($_COOKIE['mystu_lang'], ['de', 'en'], true)) {
    $lang = $_COOKIE['mystu_lang'];
} else {
    $accept = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    $lang   = 'de';
    if ($accept !== '' && preg_match('/^\s*([a-zA-Z]{2})/', $accept, $accept_m) && strtolower($accept_m[1]) !== 'de') {
        $lang = 'en';
    }
}

$L = [
    'de' => [
        'meta_desc'   => 'mystu – Webdesign-Agentur aus Stuttgart & Ludwigsburg. Moderne Websites, Onlineshops & Landingpages mit lokaler SEO. Festpreis, schnelle Umsetzung, persönlicher Kontakt.',
        'og_title'    => 'mystu. – Websites, die Kunden bringen',
        'og_desc'     => 'Webdesign-Agentur aus Stuttgart & Ludwigsburg. Wir bauen Websites, Onlineshops & Landingpages die online gefunden werden und Anfragen bringen.',
        'nav_leist'   => 'Leistungen',
        'nav_ref'     => 'Referenzen',
        'nav_warum'   => 'Warum',
        'nav_preise'  => 'Preise',
        'nav_cta'     => 'Projekt starten',
        'hero_eyebrow'=> 'Webdesign-Agentur &middot; Raum Stuttgart &amp; Ludwigsburg',
        'hero_h1a'    => 'Mehr',
        'hero_h1b'    => 'Kunden.',
        'hero_h1b_words' => ['Kunden.', 'Umsatz.', 'Reichweite.'],
        'hero_sub'    => 'Websites, die nicht nur gut aussehen &mdash; sondern <b>Anfragen bringen, Vertrauen aufbauen</b> und deinen Umsatz wachsen lassen.',
        'hero_cta1'   => 'Projekt starten',
        'hero_cta2'   => 'Preise ansehen',
        'sl_label'    => 'Leistungen',
        'sl_title1'   => 'Was wir',
        'sl_title2'   => 'bauen.',
        'sl_meta'     => 'Design · Entwicklung<br/>SEO · Betreuung',
        'sl1_title'   => 'Websites',
        'sl1_tag'     => 'Unternehmen',
        'sl1_desc'    => 'Moderne Auftritte für KMU, Handwerk &amp; Dienstleister — klar strukturiert, schnell und so gebaut, dass aus Besuchern Anfragen werden.',
        'sl1_meta'    => 'Design<br/>Dev<br/>CMS',
        'sl2_title'   => 'Onlineshops',
        'sl2_tag'     => 'E-Commerce',
        'sl2_desc'    => 'Verkaufen rund um die Uhr — sauber umgesetzt mit Shopify &amp; Co. Vom Design bis zur Zahlungsanbindung.',
        'sl2_meta'    => 'Shopify<br/>Zahlung<br/>Design',
        'sl3_title'   => 'Landingpages',
        'sl3_tag'     => 'Kampagne',
        'sl3_desc'    => 'Fokussierte Seiten für Ads &amp; Aktionen, die gezielt Anfragen generieren — ohne Ablenkung, direkt zur Conversion.',
        'sl3_meta'    => 'Copy<br/>Tracking<br/>Ads',
        'sl4_title'   => 'Lokale SEO',
        'sl4_tag'     => 'Sichtbarkeit',
        'sl4_desc'    => 'Damit dich Kunden im Raum Stuttgart &amp; Ludwigsburg bei Google finden — und nicht die Konkurrenz. Technik, Inhalte und Google-Profil aus einer Hand.',
        'sl4_meta'    => 'Google<br/>Maps<br/>Technik',
        'ref_label'   => 'Referenzen',
        'ref_title1'  => 'Unsere',
        'ref_title2'  => 'Arbeit.',
        'ref_meta'    => 'Live &amp; in Betrieb',
        'ref1_tag'    => 'Shopify · E-Commerce',
        'ref1_desc'   => 'Exklusive Stuttgart Fanartikel — designed in Stuttgart, produziert auf Bestellung. Von Shirts über Hoodies bis zu Caps, alles mit Seele für den Kessel.',
        'ref1_link'   => 'Zum Shop',
        'ref2_tag'    => 'Webdesign · Gastronomie',
        'ref2_desc'   => 'Cocktailbar in Stuttgart-Mitte — Events, Live-Musik und DJ-Sets. Website mit Eventkalender, Buchungsformular und mobilem Design.',
        'ref2_chip1'  => 'Webdesign',
        'ref2_chip2'  => 'Gastronomie',
        'ref2_link'   => 'Zur Website',
        'ref3_tag'    => 'Portfolio · Film &amp; Fotografie',
        'ref3_desc'   => 'Portfolioseite für einen Creative Director und Filmemacher mit über 18 Jahren Erfahrung — Arbeiten für Nike, Puma, Hennessy und GQ. Bewegtbild im Fokus, dunkles Layout, alles auf die Reels ausgerichtet.',
        'ref3_chip1'  => 'Webdesign',
        'ref3_chip2'  => 'Portfolio',
        'ref3_chip3'  => 'International',
        'ref3_link'   => 'Zur Website',
        'ref4_tag'    => 'Webdesign · Kanzlei &amp; Sport',
        'ref4_desc'   => 'Drei Geschäftsfelder unter einem Dach: Rechtsberatung, Spielervermittlung und Training. Website mit klarer Sparten-Struktur, Terminbuchung und zweisprachiger Ansprache.',
        'ref4_chip1'  => 'Webdesign',
        'ref4_chip2'  => 'Recht &amp; Sport',
        'ref4_chip3'  => 'Oberhausen',
        'ref4_link'   => 'Zur Website',
        'ref_divider' => 'Mockup-Referenzen',
        'refm1_tag'   => 'WordPress · Handwerk',
        'refm1_aria'  => 'Handwerker-Webseite in neuem Tab ansehen',
        'refm1_link'  => 'Live ansehen →',
        'refm2_tag'   => 'Landingpage · Fahrschule',
        'refm2_aria'  => 'Fahrschul-Mockup in neuem Tab ansehen',
        'refm2_link'  => 'Live ansehen →',
        'refm3_tag'   => 'Landingpage · Kanzlei',
        'refm3_aria'  => 'Kanzlei-Mockup in neuem Tab ansehen',
        'refm3_link'  => 'Live ansehen →',
        'refm4_tag'   => 'WordPress · Zahnarzt',
        'refm4_aria'  => 'Zahnarzt-Mockup in neuem Tab ansehen',
        'refm4_link'  => 'Live ansehen →',
        'warum_label' => 'Warum mystu',
        'warum_title1'=> 'Kein Bla,',
        'warum_title2'=> 'nur Ergebnis.',
        'warum_meta'  => 'Klein, schnell<br/>&amp; persönlich',
        'w1_h1'       => 'Direkt mit',
        'w1_h2'       => 'dem Macher',
        'w1_p'        => 'Kein Account-Manager, keine Warteschleife. Du sprichst mit den Leuten, die deine Seite wirklich bauen — ohne Umwege, ohne Bullshit.',
        'w2_h1'       => 'Antwort',
        'w2_h2'       => 'in 24h',
        'w2_p'        => 'Kurze Wege, schnelle Rückmeldung und eine ehrliche Einschätzung — bevor du dich auf irgendetwas festlegst.',
        'w3_h1'       => 'Fair &amp;',
        'w3_h2'       => 'transparent',
        'w3_p'        => 'Festpreis statt böser Überraschungen. Du weißt vorher genau, was es kostet und was du dafür bekommst.',
        'team_label'  => 'Das Team',
        'team_intro'  => 'Yusuf und Michele sind wie <b>Yin und Yang</b> — einer denkt in Pixeln, der andere in Code. Was rauskommt, wenn Design auf Entwicklung trifft? Websites, die aussehen wie Kunst und funktionieren wie eine Maschine.',
        'mi_role'     => 'Designer',
        'mi_bio'      => 'Über 10 Jahre Erfahrung — von Websites bis Apps, von Flyern bis Branding. Und VfB-Fan seit Kindheit.',
        'yu_role'     => 'Entwickler',
        'yu_bio'      => 'Über 10 Jahre Erfahrung — Typo3, Shopify, WordPress, KI. Egal was es ist, er fuchst sich rein und liefert.',
        'yu_tag_ai'   => 'KI',
        'kt_label'    => 'Kontakt',
        'kt_title1'   => 'Lass uns',
        'kt_title2'   => 'reden.',
        'kt_text'     => 'Erzähl uns kurz von deinem Vorhaben — wir melden uns innerhalb von 48 Stunden mit einer ehrlichen Einschätzung.',
        'kt_ok'       => 'Danke! Deine Anfrage ist angekommen — wir melden uns innerhalb von 48 Stunden.',
        'kt_err'      => 'Da ist etwas schiefgelaufen. Bitte prüfe deine Eingaben oder schreib uns direkt an hi@mystu.de.',
        'kt_lbl_name' => 'Name',
        'kt_ph_name'  => 'Dein Name',
        'kt_lbl_company' => 'Firma',
        'kt_ph_company'  => 'Firmenname',
        'kt_lbl_mail' => 'E-Mail',
        'kt_ph_mail'  => 'dein@email.de',
        'kt_lbl_phone'=> 'Telefon',
        'kt_ph_phone' => '+49 151 2345 6789',
        'kt_lbl_city' => 'Ort',
        'kt_ph_city'  => 'Stuttgart',
        'kt_lbl_type' => 'Was brauchst du?',
        'kt_opt1'     => 'Website',
        'kt_opt2'     => 'Onlineshop',
        'kt_opt3'     => 'Landingpage',
        'kt_opt4'     => 'SEO / Sichtbarkeit',
        'kt_opt5'     => 'Bin mir noch unsicher',
        'kt_lbl_budget' => 'Budget',
        'kt_budget1' => 'unter 2.000 €',
        'kt_budget2' => '2.000–5.000 €',
        'kt_budget3' => '5.000–10.000 €',
        'kt_budget4' => '10.000–20.000 €',
        'kt_budget5' => '20.000 €+',
        'kt_budget6' => 'Noch offen',
        'kt_lbl_msg'  => 'Nachricht',
        'kt_ph_msg'   => 'Erzähl uns kurz von deinem Projekt …',
        'kt_cap_q'    => 'Sicherheitsfrage: Was ist %d − %d?',
        'kt_ph_answer'=> 'Deine Antwort',
        'kt_privacy'  => 'Ich habe die %s gelesen und stimme der Verarbeitung meiner Daten zu.',
        'privacy_link_text' => 'Datenschutzerklärung',
        'kt_submit'   => 'Anfrage senden',
        'kt_note'     => 'Mit dem Absenden stimmst du der Verarbeitung deiner Daten zu. Siehe %s / %s.',
        'note_datenschutz' => 'Datenschutz',
        'note_impressum'   => 'Impressum',
        'cal_label'   => 'Oder direkt Termin buchen',
        'cal_title'   => 'Schnell &amp; unkompliziert.',
        'cal_sub'     => 'Wähle einen freien Slot — wir sind %s verfügbar.',
        'cal_sub_strong' => 'Mo–Fr ab 18 Uhr',
        'foot_desc'   => 'Webdesign-Agentur aus dem Raum Stuttgart &amp; Ludwigsburg. Websites, die Kunden bringen.',
        'foot_copy'   => '— Alle Rechte vorbehalten.',
        'foot_impressum'  => 'Impressum',
        'foot_datenschutz'=> 'Datenschutz',
        'foot_agb'        => 'AGB',
        'foot_cookie'     => 'Cookie-Einstellungen',
        'foot_made'   => 'Made in Stuttgart von',
    ],
    'en' => [
        'meta_desc'   => 'mystu – web design agency from Stuttgart &amp; Ludwigsburg, Germany. Modern websites, online shops &amp; landing pages with local SEO. Fixed pricing, fast delivery, personal contact.',
        'og_title'    => 'mystu. – Websites that bring customers',
        'og_desc'     => 'Web design agency from Stuttgart &amp; Ludwigsburg, Germany. We build websites, online shops &amp; landing pages that get found online and bring in leads.',
        'nav_leist'   => 'Services',
        'nav_ref'     => 'Work',
        'nav_warum'   => 'Why us',
        'nav_preise'  => 'Pricing',
        'nav_cta'     => 'Start a project',
        'hero_eyebrow'=> 'Web Design Agency &middot; Stuttgart &amp; Ludwigsburg, Germany',
        'hero_h1a'    => 'More',
        'hero_h1b'    => 'Customers.',
        'hero_h1b_words' => ['Customers.', 'Revenue.', 'Reach.'],
        'hero_sub'    => 'Websites that don&rsquo;t just look good &mdash; they <b>bring in leads, build trust</b> and help your revenue grow.',
        'hero_cta1'   => 'Start a project',
        'hero_cta2'   => 'See pricing',
        'sl_label'    => 'Services',
        'sl_title1'   => 'What we',
        'sl_title2'   => 'build.',
        'sl_meta'     => 'Design · Development<br/>SEO · Support',
        'sl1_title'   => 'Websites',
        'sl1_tag'     => 'Business',
        'sl1_desc'    => 'Modern sites for SMEs, trades &amp; service businesses — clearly structured, fast, and built to turn visitors into leads.',
        'sl1_meta'    => 'Design<br/>Dev<br/>CMS',
        'sl2_title'   => 'Online Shops',
        'sl2_tag'     => 'E-Commerce',
        'sl2_desc'    => 'Sell around the clock — cleanly built with Shopify &amp; co. From design all the way to payment integration.',
        'sl2_meta'    => 'Shopify<br/>Payments<br/>Design',
        'sl3_title'   => 'Landing Pages',
        'sl3_tag'     => 'Campaign',
        'sl3_desc'    => 'Focused pages for ads &amp; campaigns that generate leads on purpose — no distractions, straight to conversion.',
        'sl3_meta'    => 'Copy<br/>Tracking<br/>Ads',
        'sl4_title'   => 'Local SEO',
        'sl4_tag'     => 'Visibility',
        'sl4_desc'    => 'So customers around Stuttgart &amp; Ludwigsburg find you on Google — not your competitors. Technical SEO, content and your Google Business Profile, all from one hand.',
        'sl4_meta'    => 'Google<br/>Maps<br/>Technical',
        'ref_label'   => 'Work',
        'ref_title1'  => 'Our',
        'ref_title2'  => 'Work.',
        'ref_meta'    => 'Live &amp; in production',
        'ref1_tag'    => 'Shopify · E-Commerce',
        'ref1_desc'   => 'Exclusive Stuttgart fan merchandise — designed in Stuttgart, made to order. From shirts to hoodies to caps, all made with heart for the Kessel.',
        'ref1_link'   => 'Visit shop',
        'ref2_tag'    => 'Web Design · Hospitality',
        'ref2_desc'   => 'Cocktail bar in central Stuttgart — events, live music and DJ sets. Website with event calendar, booking form and mobile-first design.',
        'ref2_chip1'  => 'Web Design',
        'ref2_chip2'  => 'Hospitality',
        'ref2_link'   => 'Visit website',
        'ref3_tag'    => 'Portfolio · Film &amp; Photography',
        'ref3_desc'   => 'Portfolio site for a creative director and filmmaker with 18+ years of experience — work for Nike, Puma, Hennessy and GQ. Built around moving image, dark layout, everything geared towards the reels.',
        'ref3_chip1'  => 'Web Design',
        'ref3_chip2'  => 'Portfolio',
        'ref3_chip3'  => 'International',
        'ref3_link'   => 'Visit website',
        'ref4_tag'    => 'Web Design · Law &amp; Sports',
        'ref4_desc'   => 'Three business areas under one roof: legal advice, player representation and training. Website with a clear division structure, appointment booking and bilingual copy.',
        'ref4_chip1'  => 'Web Design',
        'ref4_chip2'  => 'Law &amp; Sports',
        'ref4_chip3'  => 'Oberhausen',
        'ref4_link'   => 'Visit website',
        'ref_divider' => 'Mockup Projects',
        'refm1_tag'   => 'WordPress · Trades',
        'refm1_aria'  => 'View trades-business website in a new tab',
        'refm1_link'  => 'View live →',
        'refm2_tag'   => 'Landing Page · Driving School',
        'refm2_aria'  => 'View driving-school mockup in a new tab',
        'refm2_link'  => 'View live →',
        'refm3_tag'   => 'Landing Page · Law Firm',
        'refm3_aria'  => 'View law-firm mockup in a new tab',
        'refm3_link'  => 'View live →',
        'refm4_tag'   => 'WordPress · Dental',
        'refm4_aria'  => 'View dental mockup in a new tab',
        'refm4_link'  => 'View live →',
        'warum_label' => 'Why mystu',
        'warum_title1'=> 'No fluff,',
        'warum_title2'=> 'just results.',
        'warum_meta'  => 'Small, fast<br/>&amp; personal',
        'w1_h1'       => 'Straight to',
        'w1_h2'       => 'the maker',
        'w1_p'        => 'No account manager, no hold music. You talk directly to the people actually building your site — no detours, no BS.',
        'w2_h1'       => 'Reply',
        'w2_h2'       => 'within 24h',
        'w2_p'        => 'Short paths, fast replies, and an honest assessment — before you commit to anything.',
        'w3_h1'       => 'Fair &amp;',
        'w3_h2'       => 'transparent',
        'w3_p'        => 'Fixed pricing instead of nasty surprises. You know exactly what it costs and what you get, upfront.',
        'team_label'  => 'The Team',
        'team_intro'  => 'Yusuf and Michele are like <b>Yin and Yang</b> — one thinks in pixels, the other in code. What happens when design meets development? Websites that look like art and run like a machine.',
        'mi_role'     => 'Designer',
        'mi_bio'      => 'Over 10 years of experience — from websites to apps, flyers to branding. And a VfB Stuttgart fan since childhood.',
        'yu_role'     => 'Developer',
        'yu_bio'      => 'Over 10 years of experience — Typo3, Shopify, WordPress, AI. Whatever it is, he digs in and delivers.',
        'yu_tag_ai'   => 'AI',
        'kt_label'    => 'Contact',
        'kt_title1'   => 'Let&rsquo;s',
        'kt_title2'   => 'talk.',
        'kt_text'     => 'Tell us a bit about your project — we&rsquo;ll get back to you within 48 hours with an honest assessment.',
        'kt_ok'       => 'Thanks! Your request has arrived — we&rsquo;ll get back to you within 48 hours.',
        'kt_err'      => 'Something went wrong. Please check your input or email us directly at hi@mystu.de.',
        'kt_lbl_name' => 'Name',
        'kt_ph_name'  => 'Your name',
        'kt_lbl_company' => 'Company',
        'kt_ph_company'  => 'Company name',
        'kt_lbl_mail' => 'Email',
        'kt_ph_mail'  => 'you@email.com',
        'kt_lbl_phone'=> 'Phone',
        'kt_ph_phone' => '+49 151 2345 6789',
        'kt_lbl_city' => 'Location',
        'kt_ph_city'  => 'Stuttgart',
        'kt_lbl_type' => 'What do you need?',
        'kt_opt1'     => 'Website',
        'kt_opt2'     => 'Online shop',
        'kt_opt3'     => 'Landing page',
        'kt_opt4'     => 'SEO / Visibility',
        'kt_opt5'     => 'Not sure yet',
        'kt_lbl_budget' => 'Budget',
        'kt_budget1' => 'under €2,000',
        'kt_budget2' => '€2,000–5,000',
        'kt_budget3' => '€5,000–10,000',
        'kt_budget4' => '€10,000–20,000',
        'kt_budget5' => '€20,000+',
        'kt_budget6' => 'Not sure yet',
        'kt_lbl_msg'  => 'Message',
        'kt_ph_msg'   => 'Tell us briefly about your project …',
        'kt_cap_q'    => 'Security check: what is %d − %d?',
        'kt_ph_answer'=> 'Your answer',
        'kt_privacy'  => 'I have read the %s and agree to the processing of my data.',
        'privacy_link_text' => 'privacy policy',
        'kt_submit'   => 'Send request',
        'kt_note'     => 'By submitting, you agree to the processing of your data. See %s / %s.',
        'note_datenschutz' => 'Privacy Policy',
        'note_impressum'   => 'Legal Notice',
        'cal_label'   => 'Or book a call directly',
        'cal_title'   => 'Fast &amp; easy.',
        'cal_sub'     => 'Pick an open slot — we&rsquo;re available %s.',
        'cal_sub_strong' => 'Mon–Fri from 6&nbsp;PM CET',
        'foot_desc'   => 'Web design agency from the Stuttgart &amp; Ludwigsburg area, Germany. Websites that bring customers.',
        'foot_copy'   => '— All rights reserved.',
        'foot_impressum'  => 'Legal Notice',
        'foot_datenschutz'=> 'Privacy Policy',
        'foot_agb'        => 'Terms',
        'foot_cookie'     => 'Cookie Settings',
        'foot_made'   => 'Made in Stuttgart by',
    ],
];
$t = $L[$lang];
$og_locale = $lang === 'de' ? 'de_DE' : 'en_US';
?><!DOCTYPE html>
<html lang="<?php echo esc_attr($lang); ?>">
<head>
<meta charset="<?php bloginfo('charset'); ?>"/>
<meta name="description" content="<?php echo esc_attr(wp_strip_all_tags($t['meta_desc'])); ?>"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="https://mystu.de/"/>
<meta property="og:title" content="<?php echo esc_attr(wp_strip_all_tags($t['og_title'])); ?>"/>
<meta property="og:description" content="<?php echo esc_attr(wp_strip_all_tags($t['og_desc'])); ?>"/>
<meta property="og:image" content="https://mystu.de/wp-content/themes/mystu/assets/og-image.png"/>
<meta property="og:image:width" content="1200"/>
<meta property="og:image:height" content="630"/>
<meta property="og:locale" content="<?php echo esc_attr($og_locale); ?>"/>
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:title" content="<?php echo esc_attr(wp_strip_all_tags($t['og_title'])); ?>"/>
<meta name="twitter:description" content="<?php echo esc_attr(wp_strip_all_tags($t['og_desc'])); ?>"/>
<meta name="twitter:image" content="https://mystu.de/wp-content/themes/mystu/assets/og-image.png"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<link rel="canonical" href="<?php echo esc_url(home_url('/')); ?>"/>
<link rel="alternate" hreflang="de" href="<?php echo esc_url(home_url('/')); ?>"/>
<link rel="alternate" hreflang="en" href="<?php echo esc_url(add_query_arg('lang', 'en', home_url('/'))); ?>"/>
<link rel="alternate" hreflang="x-default" href="<?php echo esc_url(home_url('/')); ?>"/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700;800;900&family=Barlow:wght@300;400;500;600&display=swap"/>
<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700;800;900&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet" media="print" onload="this.media='all'"/>
<noscript><link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@400;700;800;900&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet"/></noscript>
<?php wp_head(); ?>
<?php echo mystu_local_business_schema_json(); ?>

<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
:root{
  --ac:#C9FF2E;--ac-d:#a8e000;--w:#F4F5F1;--b:#0A0A0A;--g1:#101110;--g2:#161816;
  --mu:rgba(244,245,241,1);--mu2:rgba(244,245,241,.75);--ln:rgba(244,245,241,.10);
  --fD:'Big Shoulders Display',sans-serif;--fB:'Barlow',sans-serif;--pad:clamp(20px,5vw,72px);
  --hand:url("data:image/svg+xml,%3Csvg%20xmlns='http://www.w3.org/2000/svg'%20width='34'%20height='34'%20viewBox='0%200%2024%2024'%3E%3Cpath%20fill='%23C9FF2E'%20stroke='%230A0A0A'%20stroke-width='0.8'%20stroke-linejoin='round'%20d='M9%2011V4.5a1.5%201.5%200%200%201%203%200V10h.5V6a1.5%201.5%200%200%201%203%200v4.5h.5V8a1.5%201.5%200%200%201%203%200v7c0%203-2%205.5-5.5%205.5h-2c-2%200-3-1-4.5-3l-2.5-3.5a1.4%201.4%200%200%201%202.2-1.7L9%2014z'/%3E%3C/svg%3E") 13 4,auto;
}
html{font-size:18px;scroll-behavior:smooth;overflow-x:hidden}
body.mystu-front{background:var(--b);color:var(--w);font-family:var(--fB);font-weight:400;overflow-x:hidden;-webkit-font-smoothing:antialiased;cursor:var(--hand)}
body.mystu-front a,body.mystu-front button{cursor:var(--hand)}
body.mystu-front a{color:inherit;text-decoration:none}
body.mystu-front img{display:block;width:100%}
body.mystu-front button{background:none;border:none;color:inherit}
body.mystu-front ::selection{background:var(--ac);color:var(--b)}

#prog{position:fixed;top:0;left:0;height:2px;background:var(--ac);z-index:600;width:0}

#loader{position:fixed;inset:0;background:var(--b);z-index:9000;display:flex;align-items:center;justify-content:center;transition:opacity 1.1s ease,visibility 1.1s ease}
#loader.out{opacity:0;visibility:hidden}
.ldr svg,.ldr img{height:clamp(42px,6vw,74px);width:auto;max-width:min(74vw,360px);opacity:0;animation:ldrIn .6s cubic-bezier(.16,1,.3,1) .2s forwards}
.ldr-line{width:0;height:2px;background:var(--ac);margin-top:18px;animation:ldrLine .9s ease .55s forwards}
@keyframes ldrIn{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:none}}
@keyframes ldrLine{to{width:min(58vw,280px)}}

.mnav{position:fixed;top:0;left:0;right:0;z-index:500;display:flex;align-items:center;justify-content:space-between;padding:24px var(--pad);transition:padding .4s,background .4s,border-color .4s;border-bottom:1px solid transparent}
.mnav.stuck{padding:14px var(--pad);background:rgba(10,10,10,.82);backdrop-filter:blur(14px);border-color:var(--ln)}
.mnav-logo svg,.mnav-logo img{height:18px;width:auto;display:block}
.mnav-r{display:flex;align-items:center;gap:34px}
.mnav-r a{font-size:.72rem;font-weight:500;letter-spacing:.14em;text-transform:uppercase;color:var(--mu);transition:color .3s}
.mnav-r a:hover{color:var(--w)}
.mnav-cta{color:var(--b)!important;background:var(--ac);padding:9px 22px;font-family:var(--fD);font-weight:700;letter-spacing:.08em;transition:background .3s,transform .3s}
.mnav-cta:hover{background:var(--w);transform:translateY(-1px)}
.mnav-lang{display:flex;align-items:center;gap:6px;font-size:.7rem;font-weight:600;letter-spacing:.1em;color:var(--mu2)}
.mnav-lang a{color:var(--mu2);transition:color .3s}
.mnav-lang a.active{color:var(--ac)}
.mnav-lang a:hover{color:var(--w)}
.mnav-lang span{color:var(--ln)}
.mnav-burger{display:none;flex-direction:column;gap:5px;cursor:pointer;z-index:601;position:relative}
.mnav-burger span{display:block;width:22px;height:2px;background:var(--w);transition:transform .35s,opacity .35s}
.mnav-burger.open span:nth-child(1){transform:translateY(7px) rotate(45deg)}
.mnav-burger.open span:nth-child(2){opacity:0;transform:scaleX(0)}
.mnav-burger.open span:nth-child(3){transform:translateY(-7px) rotate(-45deg)}
.mob-menu{position:fixed;inset:0;background:var(--b);z-index:600;display:flex;flex-direction:column;justify-content:center;align-items:center;gap:clamp(24px,5vw,40px);opacity:0;visibility:hidden;transition:opacity .4s,visibility .4s}
.mob-menu.open{opacity:1;visibility:visible}
.mob-menu a{font-family:var(--fD);font-size:clamp(2.5rem,10vw,5rem);font-weight:900;letter-spacing:-.02em;text-transform:uppercase;color:var(--w);text-decoration:none;transition:color .3s}
.mob-menu a:hover{color:var(--ac)}
.mob-menu a.mob-cta{color:var(--ac)}
.mob-menu-foot{position:absolute;bottom:32px;font-size:.68rem;letter-spacing:.1em;text-transform:uppercase;color:var(--mu2);display:flex;align-items:center;gap:12px}
.mob-lang{display:flex;align-items:center;gap:6px}
.mob-lang a{font-family:var(--fB);font-size:.68rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--mu2)}
.mob-lang a.active{color:var(--ac)}
.mob-lang span{color:var(--ln)}

#hero{position:relative;min-height:100svh;display:flex;flex-direction:column;justify-content:center;padding:120px var(--pad) 48px;overflow:hidden}
#hero::before{content:'';position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,.06) 1px,transparent 1.5px);background-size:30px 30px;pointer-events:none}
.hero-glow{position:absolute;width:60vw;height:60vw;max-width:760px;max-height:760px;border-radius:50%;filter:blur(150px);background:radial-gradient(circle,rgba(201,255,46,.10) 0%,transparent 70%);top:-12%;right:-10%;pointer-events:none;animation:glow 9s ease-in-out infinite}
@keyframes glow{0%,100%{opacity:.6;transform:scale(1)}50%{opacity:1;transform:scale(1.1)}}
.hero-spot{position:absolute;width:640px;height:640px;left:0;top:0;border-radius:50%;background:radial-gradient(circle,rgba(201,255,46,.20) 0%,rgba(201,255,46,.07) 38%,transparent 68%);filter:blur(20px);mix-blend-mode:screen;pointer-events:none;will-change:transform;opacity:0;transition:opacity .4s ease}
.hero-spot.on{opacity:1}
@media(prefers-reduced-motion:reduce),(pointer:coarse){.hero-spot{display:none}}
.hero-eyebrow{display:flex;align-items:center;gap:14px;font-size:.68rem;font-weight:600;letter-spacing:.32em;text-transform:uppercase;color:var(--ac);margin-bottom:clamp(24px,4vw,40px)}
.hero-eyebrow::before{content:'';width:34px;height:1px;background:var(--ac)}
.hero-h{font-family:var(--fD);font-weight:900;line-height:.86;letter-spacing:-.02em;font-size:clamp(56px,12vw,196px);text-transform:uppercase;max-width:14ch}
.hero-h .line{display:block;overflow:hidden;white-space:nowrap}
.hero-h .line>span{display:block;transform:translateY(106%);animation:lineUp 1s cubic-bezier(.16,1,.3,1) forwards}
.hero-h .line:nth-child(1) span{animation-delay:.5s}
.hero-h .line:nth-child(2) span{animation-delay:.62s}
.hero-h .ac{color:var(--ac)}
.hero-cursor{display:inline-block;width:.06em;height:.78em;background:var(--ac);margin-left:.05em;vertical-align:-.05em;animation:caretBlink .9s step-end infinite}
@keyframes caretBlink{0%,100%{opacity:1}50%{opacity:0}}
@keyframes lineUp{to{transform:none}}
.hero-bottom{display:flex;align-items:flex-end;justify-content:space-between;gap:40px;margin-top:clamp(36px,6vw,64px);opacity:0;animation:fadeUp .9s ease 1.05s forwards}
.hero-sub{font-size:clamp(.95rem,1.4vw,1.15rem);font-weight:300;line-height:1.7;color:var(--mu);max-width:34ch}
.hero-ctas{display:flex;flex-wrap:wrap;align-items:center;gap:14px;flex-shrink:0}
.hero-sub b{color:var(--w);font-weight:600}
.hero-cta{display:inline-flex;align-items:center;gap:12px;font-family:var(--fD);font-size:1.05rem;font-weight:800;letter-spacing:.06em;text-transform:uppercase;color:var(--b)!important;background:var(--ac);padding:16px 34px;flex-shrink:0;transition:background .3s,transform .3s}
.hero-cta:hover{background:var(--w)}
.hero-cta.ghost{background:transparent!important;color:var(--w)!important;border:1px solid rgba(244,245,241,.40)}
.hero-cta.ghost:hover{background:transparent!important;color:var(--ac)!important;border-color:var(--ac)}
.hero-cta svg{transition:transform .3s}
.hero-cta:hover svg{transform:translateX(5px)}
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:none}}


.rv{opacity:0;transform:translateY(38px);transition:opacity .9s cubic-bezier(.16,1,.3,1),transform .9s cubic-bezier(.16,1,.3,1)}
.rv.vis{opacity:1;transform:none}
.d1{transition-delay:.1s}.d2{transition-delay:.2s}.d3{transition-delay:.3s}

.sec{padding:clamp(80px,13vw,180px) var(--pad)}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:30px;margin-bottom:clamp(40px,6vw,72px)}
.slabel{display:flex;align-items:center;gap:12px;font-size:.66rem;font-weight:600;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:18px}
.slabel::before{content:'';width:24px;height:1px;background:var(--ac)}
.sec-title{font-family:var(--fD);font-weight:900;line-height:.9;letter-spacing:-.02em;font-size:clamp(40px,6.5vw,96px);text-transform:uppercase}
.sec-title .ac{color:var(--ac)}
.sec-meta{font-size:.72rem;font-weight:500;letter-spacing:.18em;text-transform:uppercase;color:var(--mu2);text-align:right;white-space:nowrap}

/* Leistungen bento */
.sl-list{border-top:1px solid var(--ln)}
.sl-item{border-bottom:1px solid var(--ln);overflow:hidden;cursor:pointer}
.sl-item a{display:block;text-decoration:none;color:inherit}
.sl-head{display:flex;align-items:center;gap:clamp(20px,4vw,60px);padding:clamp(20px,3vw,32px) 0;transition:padding .6s cubic-bezier(.16,1,.3,1)}
.sl-item:hover .sl-head{padding:clamp(24px,3.5vw,40px) 0}
.sl-num{font-family:var(--fD);font-size:.78rem;font-weight:700;letter-spacing:.18em;color:var(--mu2);flex-shrink:0;width:48px;transition:color .35s}
.sl-item:hover .sl-num{color:var(--ac)}
.sl-title{font-family:var(--fD);font-size:clamp(2.8rem,7vw,8rem);font-weight:900;text-transform:uppercase;letter-spacing:-.03em;line-height:.88;flex:1;transition:transform .6s cubic-bezier(.16,1,.3,1),color .35s}
.sl-item:hover .sl-title{transform:translateX(12px);color:var(--ac)}
.sl-tag{font-size:.56rem;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--ac);border:1px solid rgba(201,255,46,.3);padding:6px 14px;border-radius:100px;flex-shrink:0;opacity:0;transform:translateY(6px);transition:opacity .4s,transform .4s}
.sl-item:hover .sl-tag{opacity:1;transform:translateY(0)}
.sl-arr{width:52px;height:52px;border-radius:50%;border:1px solid var(--ln);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--w);transition:background .35s,border-color .35s,transform .5s cubic-bezier(.16,1,.3,1)}
.sl-item:hover .sl-arr{background:var(--ac);border-color:var(--ac);color:var(--b);transform:rotate(45deg)}
.sl-body{display:grid;grid-template-rows:0fr;transition:grid-template-rows .55s cubic-bezier(.16,1,.3,1)}
.sl-item:hover .sl-body{grid-template-rows:1fr}
.sl-inner{overflow:hidden}
.sl-detail{display:flex;align-items:flex-end;justify-content:space-between;gap:40px;padding:0 0 clamp(24px,3vw,40px) 0;padding-left:calc(48px + clamp(20px,4vw,60px))}
.sl-desc{font-size:clamp(.9rem,1.1vw,1.05rem);font-weight:300;line-height:1.8;color:var(--mu);max-width:48ch}
.sl-meta{font-size:.62rem;font-weight:500;letter-spacing:.2em;text-transform:uppercase;color:var(--mu2);text-align:right;white-space:nowrap;flex-shrink:0}
@media(max-width:760px){.sl-title{font-size:clamp(2.2rem,11vw,4rem)}.sl-detail{flex-direction:column;gap:16px;padding-left:0}.sl-tag{display:none}}

/* Warum */
#warum{border-top:1px solid var(--ln);padding:0}
#warum .sec-head{padding:clamp(48px,7vw,80px) var(--pad) 0}
.why-stack{}
.why-row{position:relative;overflow:hidden;border-bottom:1px solid var(--ln);padding:clamp(48px,7vw,80px) var(--pad);display:grid;grid-template-columns:1fr 1fr;align-items:center;gap:clamp(32px,5vw,80px);transition:background .5s}
.why-row:hover{background:var(--g1)}
.why-ghost{position:absolute;right:-0.05em;top:50%;transform:translateY(-50%);font-family:var(--fD);font-size:clamp(140px,22vw,280px);font-weight:900;line-height:1;color:transparent;-webkit-text-stroke:1px rgba(201,255,46,.10);pointer-events:none;user-select:none;transition:-webkit-text-stroke .5s,transform .7s cubic-bezier(.16,1,.3,1);letter-spacing:-.04em}
.why-row:hover .why-ghost{-webkit-text-stroke:1px rgba(201,255,46,.28);transform:translateY(-50%) translateX(-8px)}
.why-left{position:relative;z-index:1}
.why-index{font-family:var(--fD);font-size:.7rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:20px;display:flex;align-items:center;gap:12px}
.why-index::before{content:'';width:32px;height:1px;background:var(--ac)}
.why-h{font-family:var(--fD);font-size:clamp(2rem,3.8vw,4rem);font-weight:900;text-transform:uppercase;letter-spacing:-.02em;line-height:.9;transition:transform .5s cubic-bezier(.16,1,.3,1)}
.why-row:hover .why-h{transform:translateX(8px)}
.why-right{position:relative;z-index:1;border-left:1px solid var(--ln);padding-left:clamp(24px,4vw,60px)}
.why-p{font-size:clamp(.9rem,1.1vw,1.05rem);font-weight:300;line-height:1.9;color:var(--mu)}
@media(max-width:760px){.why-row{grid-template-columns:1fr}.why-right{border-left:none;border-top:1px solid var(--ln);padding-left:0;padding-top:24px}.why-ghost{font-size:28vw}}

/* Referenzen */
#referenzen{border-top:1px solid var(--ln)}
.ref-item{display:grid;grid-template-columns:1.2fr .8fr;gap:clamp(40px,6vw,90px);align-items:center;padding:clamp(48px,6vw,80px) 0;border-bottom:1px solid var(--ln)}
.ref-item:last-child{border-bottom:none}
.ref-screen{position:relative;overflow:hidden;background:var(--g1);border:1px solid var(--ln);aspect-ratio:16/10}
.ref-screen img{width:100%;height:100%;object-fit:cover;object-position:top;transition:transform 6s ease,filter .4s}
.ref-screen:hover img{transform:translateY(-30%)}
.ref-screen::after{content:'';position:absolute;inset:0;background:linear-gradient(135deg,rgba(201,255,46,.05),transparent 60%);pointer-events:none}
.ref-tag{font-family:var(--fD);font-size:.6rem;font-weight:700;letter-spacing:.28em;text-transform:uppercase;color:var(--ac);margin-bottom:18px;display:flex;align-items:center;gap:10px}
.ref-tag::before{content:'';width:24px;height:1px;background:var(--ac)}
.ref-name{font-family:var(--fD);font-size:clamp(2.4rem,4.5vw,5rem);font-weight:900;text-transform:uppercase;letter-spacing:-.03em;line-height:.88;margin-bottom:20px}
.ref-desc{font-size:.95rem;font-weight:300;line-height:1.8;color:var(--mu);margin-bottom:28px;max-width:38ch}
.ref-chips{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:32px}
.ref-chip{font-size:.58rem;font-weight:600;letter-spacing:.2em;text-transform:uppercase;color:var(--mu2);border:1px solid var(--ln);padding:5px 12px}
.ref-link{display:inline-flex;align-items:center;gap:10px;font-family:var(--fD);font-size:.72rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--w);border-bottom:1px solid var(--ac);padding-bottom:4px;transition:color .3s,gap .3s}
.ref-link:hover{color:var(--ac);gap:16px}
@media(max-width:760px){.ref-item{grid-template-columns:1fr;gap:24px;padding:36px 0}}
.ref-divider{margin:clamp(40px,5vw,60px) 0 clamp(24px,3vw,36px);display:flex;align-items:center;gap:16px;font-size:.6rem;font-weight:600;letter-spacing:.28em;text-transform:uppercase;color:var(--mu2)}
.ref-divider::before,.ref-divider::after{content:'';flex:1;height:1px;background:var(--ln)}
.ref-mockups{display:grid;grid-template-columns:1fr 1fr;gap:clamp(16px,2.5vw,28px)}
.ref-mock{position:relative;overflow:hidden;background:var(--g1);border:1px solid var(--ln);transition:border-color .4s,transform .4s}
.ref-mock:hover{border-color:rgba(201,255,46,.3);transform:translateY(-4px)}
.ref-mock-frame{width:100%;aspect-ratio:16/10;overflow:hidden;position:relative}

.ref-mock-over{position:absolute;inset:0;background:linear-gradient(to top,rgba(10,10,10,.92) 0%,transparent 50%);display:flex;flex-direction:column;justify-content:flex-end;padding:clamp(16px,2vw,24px);opacity:0;transition:opacity .4s}
.ref-mock:hover .ref-mock-over{opacity:1}
.ref-mock-info{padding:clamp(14px,2vw,20px);border-top:1px solid var(--ln)}
.ref-mock-tag{font-size:.54rem;font-weight:600;letter-spacing:.22em;text-transform:uppercase;color:var(--ac);margin-bottom:6px}
.ref-mock-name{font-family:var(--fD);font-size:clamp(1rem,1.8vw,1.4rem);font-weight:800;text-transform:uppercase;letter-spacing:-.01em}
.ref-mock-link{display:inline-flex;align-items:center;gap:8px;font-size:.6rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--w);margin-top:8px;text-decoration:none;border-bottom:1px solid var(--ac);padding-bottom:2px;transition:color .3s}
.ref-mock-link:hover{color:var(--ac)}
@media(max-width:640px){
  .ref-mockups{grid-template-columns:1fr}
  .ref-mock-over{opacity:1;background:linear-gradient(to top,rgba(10,10,10,.88) 0%,transparent 55%)}
  .ref-mock:hover{transform:none}
  .ref-mock-name{font-size:1rem}
  .ref-mock-info{padding:12px 14px}
  .ref-mock-tag{font-size:.5rem}
}


/* Team */
#team{border-top:1px solid var(--ln)}
.team-intro{text-align:center;max-width:52ch;margin:0 auto clamp(60px,8vw,100px);padding-top:clamp(8px,2vw,16px)}
.team-intro-label{font-family:var(--fD);font-size:.7rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:20px;display:flex;align-items:center;justify-content:center;gap:12px}
.team-intro-label::before,.team-intro-label::after{content:'';width:24px;height:1px;background:var(--ac)}
.team-intro-text{font-size:clamp(1.1rem,1.8vw,1.4rem);font-weight:300;line-height:1.7;color:var(--mu)}
.team-intro-text b{color:var(--w);font-weight:600}
.team-duo{display:grid;grid-template-columns:1fr 1fr;gap:clamp(16px,2.5vw,32px)}
.team-card{position:relative;overflow:hidden;height:600px}
.team-card picture{position:absolute;inset:0;display:block}
.team-img{width:100%;height:100%;object-fit:cover;object-position:top;filter:grayscale(30%);transition:filter .6s,transform .6s cubic-bezier(.16,1,.3,1);display:block}
.team-img-yusuf{object-position:center 62%}
.team-card:hover .team-img{filter:grayscale(0%);transform:scale(1.03)}
.team-card-over{position:absolute;inset:0;background:linear-gradient(to top,rgba(10,10,10,.92) 0%,rgba(10,10,10,.2) 45%,transparent 70%);display:flex;flex-direction:column;justify-content:flex-end;padding:clamp(20px,3vw,36px)}
.team-card-role{font-family:var(--fD);font-size:.6rem;font-weight:700;letter-spacing:.3em;text-transform:uppercase;color:var(--ac);margin-bottom:10px}
.team-card-name{font-family:var(--fD);font-size:clamp(2.4rem,5vw,5.5rem);font-weight:900;text-transform:uppercase;letter-spacing:-.03em;line-height:.88;margin-bottom:14px;transition:transform .5s cubic-bezier(.16,1,.3,1)}
.team-card:hover .team-card-name{transform:translateY(-4px)}
.team-card-bio{font-size:.85rem;font-weight:300;line-height:1.7;color:rgba(244,245,241,.75);max-width:30ch;margin-bottom:18px;opacity:0;transform:translateY(12px);transition:opacity .5s,transform .5s cubic-bezier(.16,1,.3,1)}
.team-card:hover .team-card-bio{opacity:1;transform:translateY(0)}
.team-card-tags{display:flex;flex-wrap:wrap;gap:6px;opacity:0;transform:translateY(8px);transition:opacity .45s .05s,transform .45s .05s cubic-bezier(.16,1,.3,1)}
.team-card:hover .team-card-tags{opacity:1;transform:translateY(0)}
.team-tag{font-size:.52rem;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:var(--ac);border:1px solid rgba(201,255,46,.3);padding:4px 10px}
@media(max-width:640px){.team-duo{grid-template-columns:1fr}.team-card{height:auto;aspect-ratio:3/4}.team-card-bio{opacity:1;transform:none}.team-card-tags{opacity:1;transform:none}}

#kontakt{position:relative;overflow:hidden;border-top:1px solid var(--ln)}
.kt-glow{position:absolute;bottom:-30%;left:-10%;width:60vw;height:60vw;max-width:700px;border-radius:50%;filter:blur(150px);background:radial-gradient(circle,rgba(201,255,46,.09),transparent 70%);pointer-events:none}
.kt-grid{position:relative;z-index:1;display:grid;grid-template-columns:.7fr 1fr 1fr;gap:clamp(28px,4vw,56px);align-items:start}.kt-form{grid-column:2/-1}
.kt-title{font-family:var(--fD);font-weight:900;line-height:.88;letter-spacing:-.02em;font-size:clamp(52px,9vw,140px);text-transform:uppercase;margin-bottom:clamp(28px,4vw,44px)}
.kt-title .ac{color:var(--ac)}
.kt-text{font-size:1rem;font-weight:300;line-height:1.8;color:var(--mu);max-width:40ch;margin-bottom:40px}
.kt-links{display:flex;flex-direction:column;gap:16px}
.kt-link{display:inline-flex;align-items:center;gap:14px;font-size:1.05rem;font-weight:500;color:var(--w);width:fit-content;transition:color .3s}
.kt-link svg{color:var(--ac);flex-shrink:0}
.kt-link:hover{color:var(--ac)}
.kt-form{display:flex;flex-direction:column;gap:16px;background:var(--g1);border:1px solid var(--ln);padding:clamp(26px,4vw,40px)}
.kt-field{display:flex;flex-direction:column;gap:8px}
.kt-field label{font-size:.6rem;font-weight:600;letter-spacing:.24em;text-transform:uppercase;color:var(--mu)}
.kt-field input,.kt-field select,.kt-field textarea{font-family:var(--fB);font-size:.95rem;font-weight:300;color:var(--w);background:var(--g2);border:1px solid var(--ln);padding:13px 15px;transition:border-color .3s}
.kt-field input:focus,.kt-field select:focus,.kt-field textarea:focus{outline:none;border-color:var(--ac)}
.kt-field textarea{resize:vertical;min-height:110px}
.kt-field select{appearance:none;-webkit-appearance:none}
.kt-form button{font-family:var(--fD);font-size:1rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:#0A0A0A!important;background:#C9FF2E!important;border:none;cursor:pointer;padding:15px;margin-top:4px;transition:background .3s,transform .3s}
.kt-form button:hover{background:#a8e000!important;transform:translateY(-2px)}
.kt-note{font-size:.66rem;font-weight:300;color:var(--mu2);line-height:1.6}
.kt-note a{color:var(--mu);text-decoration:underline;text-underline-offset:2px}
.kt-captcha input[type="number"]{-moz-appearance:textfield}
.kt-captcha input[type="number"]::-webkit-inner-spin-button{-webkit-appearance:none}
.kt-check{display:flex;align-items:flex-start;justify-content:flex-start;gap:12px;font-size:.78rem;font-weight:300;color:var(--mu);line-height:1.55;text-align:left;cursor:pointer}
.kt-check input[type="checkbox"]{width:16px;height:16px;min-width:16px;accent-color:var(--ac);margin-top:2px;cursor:pointer}
.kt-check span{display:inline;min-width:0;max-width:none;text-align:left;white-space:normal}
.kt-check a{color:var(--mu);text-decoration:underline;text-underline-offset:2px;white-space:normal}
.kt-msg{padding:13px 16px;font-size:.85rem;font-weight:500;border:1px solid}
.kt-msg.ok{border-color:var(--ac);color:var(--ac);background:rgba(201,255,46,.06)}
.kt-msg.err{border-color:#ff6b5e;color:#ff8e84;background:rgba(255,107,94,.06)}
@media(max-width:1024px){.kt-grid{grid-template-columns:1fr 1fr;gap:36px}.kt-grid .rv:first-child{grid-column:1/-1}}@media(max-width:640px){.kt-grid{grid-template-columns:minmax(0,1fr);gap:40px}.kt-form{grid-column:auto;width:100%;min-width:0}.kt-field input,.kt-field select,.kt-field textarea{width:100%;min-width:0}.kt-check{max-width:100%}}

.mfoot{background:#060606;border-top:1px solid var(--ln);padding:clamp(48px,7vw,72px) var(--pad) 36px}
.mfoot-top{display:flex;justify-content:space-between;align-items:flex-end;gap:40px;flex-wrap:wrap;padding-bottom:36px;border-bottom:1px solid var(--ln);margin-bottom:28px}
.mfoot-logo svg,.mfoot-logo img{height:30px;width:auto;margin-bottom:14px}
.mfoot-desc{font-size:.8rem;font-weight:300;color:var(--mu);line-height:1.7;max-width:30ch}
.mfoot-bot{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap}
.mfoot-copy,.mfoot-made{font-size:.68rem;color:var(--mu2);letter-spacing:.04em}
.mfoot-made span{color:var(--ac)}

@media(max-width:760px){
  .mnav-r a:not(.mnav-cta){display:none}
  .mnav-burger{display:flex}
  .hero-bottom{flex-direction:column;align-items:flex-start;gap:28px}
  .sec-head{flex-direction:column;align-items:flex-start;gap:10px}
  .sec-meta{text-align:left}
}
.ref-item,.ref-mock{cursor:pointer}.ref-mock-link{position:absolute;inset:0;z-index:5;display:flex;align-items:flex-end;padding:clamp(16px,2vw,24px);border:0!important}.ref-mock-link::after{content:"↗";margin-left:auto;font-size:1.2rem;color:var(--ac)}.ref-item:focus-within,.ref-mock:focus-within{outline:1px solid var(--ac);outline-offset:6px}
.calendly-wrap{display:flex;flex-direction:column;gap:clamp(20px,3vw,32px)}
.calendly-head{padding:0}
.calendly-title{font-family:var(--fD);font-size:clamp(1.8rem,3.5vw,3rem);font-weight:900;text-transform:uppercase;letter-spacing:-.02em;line-height:.9;margin:10px 0}
.calendly-sub{font-size:.88rem;line-height:1.75;color:var(--mu2)}
.calendly-sub strong{color:var(--ac)}
.calendly-inline-widget{border:1px solid var(--ln);background:var(--g1)}

.dpad{position:fixed;right:clamp(14px,2.5vw,28px);top:50%;transform:translateY(-50%);z-index:400;display:flex;flex-direction:column;align-items:center;gap:10px;opacity:0;animation:dpadIn .6s cubic-bezier(.16,1,.3,1) .3s forwards}
@keyframes dpadIn{to{opacity:1}}
.dpad-btn{width:54px;height:54px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:var(--mu2);background:rgba(16,17,16,.55);backdrop-filter:blur(8px);border:1px solid var(--ln);cursor:pointer;transition:color .25s ease,transform .2s ease,border-color .25s ease,background .25s ease}
.dpad-btn:hover:not(:disabled){color:var(--ac);border-color:rgba(201,255,46,.4);background:rgba(201,255,46,.08);transform:scale(1.08)}
.dpad-btn:disabled{opacity:.3;cursor:default}
@media(pointer:coarse),(max-width:900px){.dpad{display:none}}
@media(prefers-reduced-motion:reduce){.dpad{animation:none;opacity:1}}
</style>
</head>
<body <?php body_class('mystu-front'); ?>>
<?php wp_body_open(); ?>

<?php
$logo_svg = '<img src="' . esc_url(MYSTU_URI . '/assets/logo-mystu.svg') . '" alt="mystu" decoding="async">';
$home = esc_url(home_url('/'));
$arrow = '<svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M4 12L12 4M12 4H5M12 4v7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>';
$lang_url_de = esc_url(add_query_arg('lang', 'de', $home));
$lang_url_en = esc_url(add_query_arg('lang', 'en', $home));
$pricing_url = esc_url(add_query_arg('lang', $lang, home_url('/preise/')));
?>

<div id="prog"></div>

<div id="loader">
  <div class="ldr" style="display:flex;flex-direction:column;align-items:center"><?php echo $logo_svg; ?><div class="ldr-line"></div></div>
</div>

<nav class="mnav" id="mnav">
  <a href="<?php echo $home; ?>" class="mnav-logo" aria-label="mystu"><?php echo $logo_svg; ?></a>
  <div class="mnav-r">
    <a href="#leistungen"><?php echo $t['nav_leist']; ?></a>
    <a href="#referenzen"><?php echo $t['nav_ref']; ?></a>
    <a href="#warum"><?php echo $t['nav_warum']; ?></a><a href="<?php echo $pricing_url; ?>"><?php echo $t['nav_preise']; ?></a>
    <div class="mnav-lang"><a href="<?php echo $lang_url_de; ?>" class="<?php echo $lang === 'de' ? 'active' : ''; ?>">DE</a><span>/</span><a href="<?php echo $lang_url_en; ?>" class="<?php echo $lang === 'en' ? 'active' : ''; ?>">EN</a></div>
    <a href="#kontakt" class="mnav-cta"><?php echo $t['nav_cta']; ?></a>
  </div>
  <div class="mnav-burger"><span></span><span></span><span></span></div>
</nav>

<div class="mob-menu" id="mob-menu" aria-hidden="true">
  <a href="#leistungen" class="mob-link"><?php echo $t['nav_leist']; ?></a>
  <a href="#referenzen" class="mob-link"><?php echo $t['nav_ref']; ?></a>
  <a href="#warum" class="mob-link"><?php echo $t['nav_warum']; ?></a>
  <a href="<?php echo $pricing_url; ?>" class="mob-link"><?php echo $t['nav_preise']; ?></a>
  <a href="#kontakt" class="mob-cta mob-link"><?php echo $t['nav_cta']; ?></a>
  <div class="mob-menu-foot">
    <span>hi@mystu.de</span>
    <div class="mob-lang"><a href="<?php echo $lang_url_de; ?>" class="<?php echo $lang === 'de' ? 'active' : ''; ?>">DE</a><span>/</span><a href="<?php echo $lang_url_en; ?>" class="<?php echo $lang === 'en' ? 'active' : ''; ?>">EN</a></div>
  </div>
</div>

<div class="dpad" id="dpad" aria-label="<?php echo $lang === 'en' ? 'Section navigation' : 'Seitennavigation'; ?>">
  <button type="button" class="dpad-btn dpad-up" id="dpadUp" aria-label="<?php echo $lang === 'en' ? 'Previous section' : 'Vorherige Sektion'; ?>"><svg width="24" height="24" viewBox="0 0 16 16" fill="none"><path d="M3 10l5-5 5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
  <button type="button" class="dpad-btn dpad-down" id="dpadDown" aria-label="<?php echo $lang === 'en' ? 'Next section' : 'N&auml;chste Sektion'; ?>"><svg width="24" height="24" viewBox="0 0 16 16" fill="none"><path d="M3 6l5 5 5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
</div>

<main>
<section id="hero">
  <div class="hero-glow"></div>
  <div class="hero-spot" id="heroSpot" aria-hidden="true"></div>
  <p class="hero-eyebrow"><?php echo $t['hero_eyebrow']; ?></p>
  <h1 class="hero-h" id="heroH">
    <span class="line"><span><?php echo $t['hero_h1a']; ?></span></span>
    <span class="line"><span><span class="ac" id="heroType"><?php echo $t['hero_h1b']; ?></span><span class="hero-cursor" aria-hidden="true"></span></span></span>
  </h1>
  <div class="hero-bottom">
    <p class="hero-sub"><?php echo $t['hero_sub']; ?></p>
    <div class="hero-ctas">
      <a href="#kontakt" class="hero-cta"><?php echo $t['hero_cta1']; ?> <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a><a href="<?php echo $pricing_url; ?>" class="hero-cta ghost"><?php echo $t['hero_cta2']; ?></a>
    </div>
  </div>
</section>



<section id="leistungen" class="sec">
  <div class="sec-head rv">
    <div><p class="slabel"><?php echo $t['sl_label']; ?></p><h2 class="sec-title"><?php echo $t['sl_title1']; ?><br/><span class="ac"><?php echo $t['sl_title2']; ?></span></h2></div>
    <span class="sec-meta"><?php echo $t['sl_meta']; ?></span>
  </div>
  <div class="sl-list">
    <div class="sl-item rv">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">01</span>
          <h3 class="sl-title"><?php echo $t['sl1_title']; ?></h3>
          <span class="sl-tag"><?php echo $t['sl1_tag']; ?></span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc"><?php echo $t['sl1_desc']; ?></p>
          <span class="sl-meta"><?php echo $t['sl1_meta']; ?></span>
        </div></div></div>
      </a>
    </div>
    <div class="sl-item rv d1">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">02</span>
          <h3 class="sl-title"><?php echo $t['sl2_title']; ?></h3>
          <span class="sl-tag"><?php echo $t['sl2_tag']; ?></span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc"><?php echo $t['sl2_desc']; ?></p>
          <span class="sl-meta"><?php echo $t['sl2_meta']; ?></span>
        </div></div></div>
      </a>
    </div>
    <div class="sl-item rv">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">03</span>
          <h3 class="sl-title"><?php echo $t['sl3_title']; ?></h3>
          <span class="sl-tag"><?php echo $t['sl3_tag']; ?></span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc"><?php echo $t['sl3_desc']; ?></p>
          <span class="sl-meta"><?php echo $t['sl3_meta']; ?></span>
        </div></div></div>
      </a>
    </div>
    <div class="sl-item rv d1">
      <a href="#kontakt">
        <div class="sl-head">
          <span class="sl-num">04</span>
          <h3 class="sl-title"><?php echo $t['sl4_title']; ?></h3>
          <span class="sl-tag"><?php echo $t['sl4_tag']; ?></span>
          <span class="sl-arr"><?php echo $arrow; ?></span>
        </div>
        <div class="sl-body"><div class="sl-inner"><div class="sl-detail">
          <p class="sl-desc"><?php echo $t['sl4_desc']; ?></p>
          <span class="sl-meta"><?php echo $t['sl4_meta']; ?></span>
        </div></div></div>
      </a>
    </div>
  </div>
</section>

<section id="referenzen" class="sec">
  <div class="sec-head rv">
    <div><p class="slabel"><?php echo $t['ref_label']; ?></p><h2 class="sec-title"><?php echo $t['ref_title1']; ?><br/><span class="ac"><?php echo $t['ref_title2']; ?></span></h2></div>
    <span class="sec-meta"><?php echo $t['ref_meta']; ?></span>
  </div>
  <div class="ref-list">
    <div class="ref-item rv">
      <div class="ref-screen">
        <picture><source srcset="/wp-content/themes/mystu/assets/mystuShop.webp" type="image/webp"/><img src="/wp-content/themes/mystu/assets/mystuShop.jpg" alt="mystu.shop Referenz" width="1440" height="900" loading="lazy"/></picture>
      </div>
      <div>
        <p class="ref-tag"><?php echo $t['ref1_tag']; ?></p>
        <h3 class="ref-name">mystu<br/>Shop</h3>
        <p class="ref-desc"><?php echo $t['ref1_desc']; ?></p>
        <div class="ref-chips">
          <span class="ref-chip">Shopify</span>
          <span class="ref-chip">Custom Theme</span>

          <span class="ref-chip">Stuttgart</span>
        </div>
        <a href="https://mystu.shop" target="_blank" rel="noopener" class="ref-link"><?php echo $t['ref1_link']; ?> <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
    </div>
    <div class="ref-item rv">
      <div class="ref-screen">
        <picture><source srcset="/wp-content/themes/mystu/assets/anderthalbbar.webp" type="image/webp"/><img src="/wp-content/themes/mystu/assets/anderthalbbar.jpg" alt="anderthalb Bar Referenz" width="1440" height="900" loading="lazy"/></picture>
      </div>
      <div>
        <p class="ref-tag"><?php echo $t['ref2_tag']; ?></p>
        <h3 class="ref-name">anderthalb<br/>Bar</h3>
        <p class="ref-desc"><?php echo $t['ref2_desc']; ?></p>
        <div class="ref-chips">
          <span class="ref-chip"><?php echo $t['ref2_chip1']; ?></span>
          <span class="ref-chip"><?php echo $t['ref2_chip2']; ?></span>
          <span class="ref-chip">Stuttgart</span>
        </div>
        <a href="https://anderthalb-bar.de" target="_blank" rel="noopener" class="ref-link"><?php echo $t['ref2_link']; ?> <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
    </div>
    <div class="ref-item rv">
      <div class="ref-screen">
        <picture><source srcset="/wp-content/themes/mystu/assets/emmanuelwhajah.webp" type="image/webp"/><img src="/wp-content/themes/mystu/assets/emmanuelwhajah.jpg" alt="Emmanuel Whajah Referenz" width="1440" height="900" loading="lazy"/></picture>
      </div>
      <div>
        <p class="ref-tag"><?php echo $t['ref3_tag']; ?></p>
        <h3 class="ref-name">Emmanuel<br/>Whajah</h3>
        <p class="ref-desc"><?php echo $t['ref3_desc']; ?></p>
        <div class="ref-chips">
          <span class="ref-chip"><?php echo $t['ref3_chip1']; ?></span>
          <span class="ref-chip"><?php echo $t['ref3_chip2']; ?></span>
          <span class="ref-chip"><?php echo $t['ref3_chip3']; ?></span>
        </div>
        <a href="https://emmanuelwhajah.com" target="_blank" rel="noopener" class="ref-link"><?php echo $t['ref3_link']; ?> <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
    </div>
    <div class="ref-item rv">
      <div class="ref-screen">
        <picture><source srcset="/wp-content/themes/mystu/assets/gbridge.webp" type="image/webp"/><img src="/wp-content/themes/mystu/assets/gbridge.jpg" alt="GoldenBridge Referenz" width="1440" height="900" loading="lazy"/></picture>
      </div>
      <div>
        <p class="ref-tag"><?php echo $t['ref4_tag']; ?></p>
        <h3 class="ref-name">Golden<br/>Bridge</h3>
        <p class="ref-desc"><?php echo $t['ref4_desc']; ?></p>
        <div class="ref-chips">
          <span class="ref-chip"><?php echo $t['ref4_chip1']; ?></span>
          <span class="ref-chip"><?php echo $t['ref4_chip2']; ?></span>
          <span class="ref-chip"><?php echo $t['ref4_chip3']; ?></span>
        </div>
        <a href="https://gbridge.de" target="_blank" rel="noopener" class="ref-link"><?php echo $t['ref4_link']; ?> <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
      </div>
    </div>
  </div>

  <div class="ref-divider"><?php echo $t['ref_divider']; ?></div>

  <div class="ref-mockups">
    <div class="ref-mock rv">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/handwerk-preview.png" alt="Vorschau der Handwerker-Webseite" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag"><?php echo $t['refm1_tag']; ?></p>
        <div class="ref-mock-name">Müller Bau</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/handwerker-webseite/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="<?php echo esc_attr($t['refm1_aria']); ?>"><?php echo $t['refm1_link']; ?></a>
      </div>
    </div>
    <div class="ref-mock rv">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/fahrschule-preview.png" alt="Vorschau des Fahrschul-Mockups" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag"><?php echo $t['refm2_tag']; ?></p>
        <div class="ref-mock-name">DriveNow</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/mockup-fahrschule/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="<?php echo esc_attr($t['refm2_aria']); ?>"><?php echo $t['refm2_link']; ?></a>
      </div>
    </div>
    <div class="ref-mock rv d1">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/anwalt-preview.png" alt="Vorschau des Kanzlei-Mockups" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag"><?php echo $t['refm3_tag']; ?></p>
        <div class="ref-mock-name">Kanzlei Westend</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/mockup-anwalt/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="<?php echo esc_attr($t['refm3_aria']); ?>"><?php echo $t['refm3_link']; ?></a>
      </div>
    </div>
    <div class="ref-mock rv">
      <div class="ref-mock-frame">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/zahnarzt-preview.png" alt="Vorschau des Zahnarzt-Mockups" loading="lazy" style="width:100%;height:100%;object-fit:cover;object-position:top;display:block"/>
      </div>
      <div class="ref-mock-info">
        <p class="ref-mock-tag"><?php echo $t['refm4_tag']; ?></p>
        <div class="ref-mock-name">Dr. Klein</div>
      </div>
      <div class="ref-mock-over">
        <a href="<?php echo esc_url(home_url('/mockup-zahnarzt/')); ?>" target="_blank" rel="noopener" class="ref-mock-link" aria-label="<?php echo esc_attr($t['refm4_aria']); ?>"><?php echo $t['refm4_link']; ?></a>
      </div>
    </div>
  </div>
</section>


<section id="warum" class="sec">
  <div class="sec-head rv">
    <div><p class="slabel"><?php echo $t['warum_label']; ?></p><h2 class="sec-title"><?php echo $t['warum_title1']; ?><br/><span class="ac"><?php echo $t['warum_title2']; ?></span></h2></div>
    <span class="sec-meta"><?php echo $t['warum_meta']; ?></span>
  </div>
  <div class="why-stack">
    <div class="why-row rv">
      <span class="why-ghost">01</span>
      <div class="why-left">
        <p class="why-index">01</p>
        <h3 class="why-h"><?php echo $t['w1_h1']; ?><br/><?php echo $t['w1_h2']; ?></h3>
      </div>
      <div class="why-right">
        <p class="why-p"><?php echo $t['w1_p']; ?></p>
      </div>
    </div>
    <div class="why-row rv d1">
      <span class="why-ghost">02</span>
      <div class="why-left">
        <p class="why-index">02</p>
        <h3 class="why-h"><?php echo $t['w2_h1']; ?><br/><?php echo $t['w2_h2']; ?></h3>
      </div>
      <div class="why-right">
        <p class="why-p"><?php echo $t['w2_p']; ?></p>
      </div>
    </div>
    <div class="why-row rv d2">
      <span class="why-ghost">03</span>
      <div class="why-left">
        <p class="why-index">03</p>
        <h3 class="why-h"><?php echo $t['w3_h1']; ?><br/><?php echo $t['w3_h2']; ?></h3>
      </div>
      <div class="why-right">
        <p class="why-p"><?php echo $t['w3_p']; ?></p>
      </div>
    </div>
  </div>
</section>

<section id="team" class="sec">
  <div class="team-intro rv">
    <p class="team-intro-label"><?php echo $t['team_label']; ?></p>
    <p class="team-intro-text"><?php echo $t['team_intro']; ?></p>
  </div>
  <div class="team-duo">
    <div class="team-card rv">
      <picture><source srcset="<?php echo get_template_directory_uri(); ?>/assets/michele.webp" type="image/webp"/><img class="team-img" src="<?php echo get_template_directory_uri(); ?>/assets/michele.jpg" alt="Michele – Designer bei mystu" width="600" height="800" loading="lazy"/></picture>
      <div class="team-card-over">
        <p class="team-card-role"><?php echo $t['mi_role']; ?></p>
        <h3 class="team-card-name">Michele</h3>
        <p class="team-card-bio"><?php echo $t['mi_bio']; ?></p>
        <div class="team-card-tags">
          <span class="team-tag">UI/UX</span>
          <span class="team-tag">App Design</span>
          <span class="team-tag">Print</span>
          <span class="team-tag">VfB ♥</span>
        </div>
      </div>
    </div>
    <div class="team-card rv d1">
      <picture><source srcset="<?php echo get_template_directory_uri(); ?>/assets/yusuf.webp" type="image/webp"/><img class="team-img team-img-yusuf" src="<?php echo get_template_directory_uri(); ?>/assets/yusuf.jpg" alt="Yusuf – Entwickler bei mystu" width="1200" height="1800" loading="lazy"/></picture>
      <div class="team-card-over">
        <p class="team-card-role"><?php echo $t['yu_role']; ?></p>
        <h3 class="team-card-name">Yusuf</h3>
        <p class="team-card-bio"><?php echo $t['yu_bio']; ?></p>
        <div class="team-card-tags">
          <span class="team-tag">WordPress</span>
          <span class="team-tag">Shopify</span>
          <span class="team-tag">Typo3</span>
          <span class="team-tag"><?php echo $t['yu_tag_ai']; ?></span>
        </div>
      </div>
    </div>
  </div>
</section>


<section id="kontakt" class="sec">
  <div class="kt-glow"></div>
  <div class="kt-grid">
    <div class="rv">
      <p class="slabel"><?php echo $t['kt_label']; ?></p>
      <h2 class="kt-title"><?php echo $t['kt_title1']; ?><br/><span class="ac"><?php echo $t['kt_title2']; ?></span></h2>
      <p class="kt-text"><?php echo $t['kt_text']; ?></p>
      <div class="kt-links">
        <a class="kt-link" href="mailto:hi@mystu.de"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="5" width="18" height="14" rx="2" stroke="currentColor" stroke-width="1.6"/><path d="M4 7l8 6 8-6" stroke="currentColor" stroke-width="1.6"/></svg>hi@mystu.de</a>
        <a class="kt-link" href="tel:+4915123456789"><svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 4h4l2 5-3 2a11 11 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>+49 151 2345 6789</a>
      </div>
    </div>

    <form class="kt-form rv d1" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST">
      <?php if ($lead_sent): ?><p class="kt-msg ok"><?php echo $t['kt_ok']; ?></p><script>if(typeof gtag==='function'){gtag('event','generate_lead',{form_name:'homepage_kontakt'});}</script><?php endif; ?>
      <?php if ($lead_error): ?><p class="kt-msg err"><?php echo $t['kt_err']; ?></p><?php endif; ?>
      <input type="hidden" name="action" value="mystu_lead_request"/>
      <?php wp_nonce_field('mystu_lead_request', 'mystu_lead_nonce'); ?>
      <div class="kt-field"><label for="kt-name"><?php echo $t['kt_lbl_name']; ?></label><input id="kt-name" name="name" type="text" required placeholder="<?php echo esc_attr($t['kt_ph_name']); ?>"/></div>
      <div class="kt-field"><label for="kt-company"><?php echo $t['kt_lbl_company']; ?></label><input id="kt-company" name="firma" type="text" placeholder="<?php echo esc_attr($t['kt_ph_company']); ?>"/></div>
      <div class="kt-field"><label for="kt-mail"><?php echo $t['kt_lbl_mail']; ?></label><input id="kt-mail" name="email" type="email" required placeholder="<?php echo esc_attr($t['kt_ph_mail']); ?>"/></div>
      <div class="kt-field"><label for="kt-phone"><?php echo $t['kt_lbl_phone']; ?></label><input id="kt-phone" name="telefon" type="tel" placeholder="<?php echo esc_attr($t['kt_ph_phone']); ?>"/></div>
      <div class="kt-field"><label for="kt-city"><?php echo $t['kt_lbl_city']; ?></label><input id="kt-city" name="ort" type="text" placeholder="<?php echo esc_attr($t['kt_ph_city']); ?>"/></div>
      <div class="kt-field"><label for="kt-type"><?php echo $t['kt_lbl_type']; ?></label>
        <select id="kt-type" name="projekt">
          <option><?php echo $t['kt_opt1']; ?></option><option><?php echo $t['kt_opt2']; ?></option><option><?php echo $t['kt_opt3']; ?></option><option><?php echo $t['kt_opt4']; ?></option><option><?php echo $t['kt_opt5']; ?></option>
        </select>
      </div>
      <div class="kt-field"><label for="kt-budget"><?php echo $t['kt_lbl_budget']; ?></label>
        <select id="kt-budget" name="budget">
          <option><?php echo $t['kt_budget1']; ?></option><option><?php echo $t['kt_budget2']; ?></option><option><?php echo $t['kt_budget3']; ?></option><option><?php echo $t['kt_budget4']; ?></option><option><?php echo $t['kt_budget5']; ?></option><option><?php echo $t['kt_budget6']; ?></option>
        </select>
      </div>
      <div class="kt-field"><label for="kt-msg"><?php echo $t['kt_lbl_msg']; ?></label><textarea id="kt-msg" name="nachricht" required placeholder="<?php echo esc_attr($t['kt_ph_msg']); ?>"></textarea></div>
      <div class="kt-field kt-captcha">
        <label for="kt-cap"><?php echo esc_html(sprintf($t['kt_cap_q'], $cap_n1, $cap_n2)); ?></label>
        <input id="kt-cap" name="captcha_answer" type="number" required placeholder="<?php echo esc_attr($t['kt_ph_answer']); ?>"/>
        <input type="hidden" name="captcha_token" value="<?php echo esc_attr($cap_token); ?>"/>
      </div>
      <label class="kt-check"><input type="checkbox" name="datenschutz" required/> <span><?php echo sprintf($t['kt_privacy'], '<a href="' . esc_url(home_url('/datenschutz/')) . '">' . $t['privacy_link_text'] . '</a>'); ?></span></label>
      <button type="submit"><?php echo $t['kt_submit']; ?></button>
      <p class="kt-note"><?php echo sprintf($t['kt_note'], '<a href="' . esc_url(home_url('/datenschutz/')) . '">' . $t['note_datenschutz'] . '</a>', '<a href="' . esc_url(home_url('/impressum/')) . '">' . $t['note_impressum'] . '</a>'); ?></p>
    </form>
  </div>

<div class="calendly-wrap rv d2">
  <div class="calendly-head">
    <p class="slabel"><?php echo $t['cal_label']; ?></p>
    <h3 class="calendly-title"><?php echo $t['cal_title']; ?></h3>
    <p class="calendly-sub"><?php echo sprintf($t['cal_sub'], '<strong>' . $t['cal_sub_strong'] . '</strong>'); ?></p>
  </div>
  <div class="calendly-inline-widget" data-url="https://calendly.com/mystude?hide_gdpr_banner=1&background_color=101110&text_color=f4f5f1&primary_color=c9ff2e<?php echo $lang === 'en' ? '&locale=en' : ''; ?>" style="min-width:280px;height:650px"></div>
</div>
</section>

</main>
<footer class="mfoot">
  <div class="mfoot-top">
    <div><a href="<?php echo $home; ?>" class="mfoot-logo" aria-label="mystu"><?php echo $logo_svg; ?></a><p class="mfoot-desc"><?php echo $t['foot_desc']; ?></p></div>
  </div>
  <div class="mfoot-bot">
    <p class="mfoot-copy">&copy; <?php echo date('Y'); ?> mystu <?php echo $t['foot_copy']; ?> <a href="<?php echo esc_url(home_url('/impressum/')); ?>" style="color:inherit;text-decoration:underline;text-underline-offset:3px"><?php echo $t['foot_impressum']; ?></a> · <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>" style="color:inherit;text-decoration:underline;text-underline-offset:3px"><?php echo $t['foot_datenschutz']; ?></a> · <a href="<?php echo esc_url(home_url('/agb/')); ?>" style="color:inherit;text-decoration:underline;text-underline-offset:3px"><?php echo $t['foot_agb']; ?></a> · <a href="#" class="mystu-cookie-settings" style="color:inherit;text-decoration:underline;text-underline-offset:3px"><?php echo $t['foot_cookie']; ?></a></p>
    <p class="mfoot-made"><?php echo $t['foot_made']; ?> <span>Yusuf &amp; Michele</span></p>
  </div>
</footer>

<script>
window.addEventListener('load',function(){setTimeout(function(){var l=document.getElementById('loader');if(l)l.classList.add('out')},2600)});
(function(){
  var nav=document.getElementById('mnav'),prog=document.getElementById('prog');
  addEventListener('scroll',function(){
    if(nav)nav.classList.toggle('stuck',scrollY>50);
    if(prog)prog.style.width=(scrollY/(document.body.scrollHeight-innerHeight)*100)+'%';
  });
})();
(function(){
  var obs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('vis');obs.unobserve(e.target)}})},{threshold:.12});
  document.querySelectorAll('.rv').forEach(function(el){obs.observe(el)});
})();
(function(){
  var hero=document.getElementById('hero');
  var spot=document.getElementById('heroSpot');
  if(!hero||!spot) return;
  if(window.matchMedia&&(window.matchMedia('(pointer:coarse)').matches||window.matchMedia('(prefers-reduced-motion: reduce)').matches)) return;
  var tx=hero.clientWidth/2,ty=hero.clientHeight/2,cx=tx,cy=ty,raf;
  hero.addEventListener('mouseenter',function(){spot.classList.add('on')});
  hero.addEventListener('mouseleave',function(){spot.classList.remove('on')});
  hero.addEventListener('mousemove',function(e){
    var r=hero.getBoundingClientRect();
    tx=e.clientX-r.left;ty=e.clientY-r.top;
  });
  function loop(){
    cx+=(tx-cx)*.09;cy+=(ty-cy)*.09;
    spot.style.transform='translate3d('+(cx-320)+'px,'+(cy-320)+'px,0)';
    raf=requestAnimationFrame(loop);
  }
  loop();
})();
(function(){
  var h1=document.getElementById('heroH');
  if(!h1) return;
  var fitWords=<?php echo wp_json_encode(array_merge([$t['hero_h1a']], $t['hero_h1b_words'])); ?>;
  var probe=document.createElement('span');
  probe.style.cssText='position:absolute;visibility:hidden;white-space:nowrap;top:-9999px;left:-9999px;pointer-events:none';
  document.body.appendChild(probe);
  function fit(){
    h1.style.fontSize='';
    var cs=getComputedStyle(h1);
    var base=parseFloat(cs.fontSize);
    probe.style.fontFamily=cs.fontFamily;
    probe.style.fontWeight=cs.fontWeight;
    probe.style.letterSpacing=cs.letterSpacing;
    probe.style.textTransform=cs.textTransform;
    probe.style.fontSize=base+'px';
    var avail=h1.clientWidth;
    var max=0;
    fitWords.forEach(function(w){probe.textContent=w;if(probe.offsetWidth>max)max=probe.offsetWidth;});
    if(max>0&&avail>0&&max>avail){
      h1.style.fontSize=(base*(avail/max)*0.96)+'px';
    }
  }
  fit();
  if(document.fonts&&document.fonts.ready){document.fonts.ready.then(fit);}
  var rt;
  window.addEventListener('resize',function(){clearTimeout(rt);rt=setTimeout(fit,150)});
})();
(function(){
  var el=document.getElementById('heroType');
  if(!el||(window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches)) return;
  var words=<?php echo wp_json_encode($t['hero_h1b_words']); ?>;
  if(!words||words.length<2) return;
  var wi=0,ci=words[0].length,deleting=false;
  function tick(){
    var word=words[wi];
    if(!deleting){
      ci++;
      if(ci>word.length){ci=word.length;deleting=true;return setTimeout(tick,1800);}
    } else {
      ci--;
      if(ci<0){ci=0;deleting=false;wi=(wi+1)%words.length;return setTimeout(tick,300);}
    }
    el.textContent=word.slice(0,ci);
    setTimeout(tick,deleting?40:80);
  }
  setTimeout(tick,2200);
})();
(function(){
  var burger=document.querySelector('.mnav-burger');
  var menu=document.getElementById('mob-menu');
  if(!burger||!menu) return;
  function toggleMenu(open){
    burger.classList.toggle('open',open);
    menu.classList.toggle('open',open);
    menu.setAttribute('aria-hidden',open?'false':'true');
    document.body.style.overflow=open?'hidden':'';
  }
  burger.addEventListener('click',function(){
    toggleMenu(!menu.classList.contains('open'));
  });
  menu.querySelectorAll('.mob-link').forEach(function(a){
    a.addEventListener('click',function(){toggleMenu(false)});
  });
  document.addEventListener('keydown',function(e){
    if(e.key==='Escape') toggleMenu(false);
  });
})();
(function(){
  var ids=['hero','leistungen','referenzen','warum','team','kontakt'];
  var sections=ids.map(function(id){return document.getElementById(id)}).filter(Boolean);
  var dpad=document.getElementById('dpad'),up=document.getElementById('dpadUp'),down=document.getElementById('dpadDown');
  if(!dpad||!up||!down||!sections.length) return;
  var reduceMotion=window.matchMedia&&window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  function currentIndex(){
    var y=window.scrollY+innerHeight*0.35,idx=0;
    for(var i=0;i<sections.length;i++){ if(sections[i].offsetTop<=y) idx=i; }
    return idx;
  }
  function updateState(){
    var idx=currentIndex();
    up.disabled=idx<=0;
    down.disabled=idx>=sections.length-1;
  }
  up.addEventListener('click',function(){
    var idx=currentIndex();
    if(idx>0) sections[idx-1].scrollIntoView({behavior:reduceMotion?'auto':'smooth'});
  });
  down.addEventListener('click',function(){
    var idx=currentIndex();
    if(idx<sections.length-1) sections[idx+1].scrollIntoView({behavior:reduceMotion?'auto':'smooth'});
  });
  window.addEventListener('scroll',updateState,{passive:true});
  updateState();
})();
</script>

<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
<?php wp_footer(); ?>
</body>
</html>
