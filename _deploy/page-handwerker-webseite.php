<?php
/*
 * Template Name: Handwerker Webseite (Landingpage)
 * Standalone-Landingpage für Handwerksbetriebe – eigene Navigation & eigener Footer,
 * blau-weißer Look. Region Stuttgart, Ludwigsburg, Heilbronn, Heidelberg.
 */
get_header();

$contact_url = 'mailto:hi@mystu.de?subject=' . rawurlencode('Anfrage Handwerker-Webseite');
$hero_img    = MYSTU_URI . '/assets/img/reference-heroes/handwerk-hero-1280.webp';
$hero_img_sm = MYSTU_URI . '/assets/img/reference-heroes/handwerk-hero-768.webp';

$gewerke = [
    'Elektriker', 'Sanitär · Heizung · Klima', 'Maler & Lackierer', 'Schreiner & Tischler',
    'Dachdecker', 'Fliesenleger', 'Zimmerer', 'Garten- & Landschaftsbau',
    'Stuckateure', 'Metallbau', 'Bodenleger', 'Gebäudereinigung',
];

$regionen = [
    ['name' => 'Stuttgart',   'note' => 'Landeshauptstadt & Umgebung – vom Kessel bis auf die Fildern.'],
    ['name' => 'Ludwigsburg', 'note' => 'Inklusive Kornwestheim, Bietigheim-Bissingen & Marbach.'],
    ['name' => 'Heilbronn',   'note' => 'Stadt- und Landkreis, Neckarsulm & Weinsberger Tal.'],
    ['name' => 'Heidelberg',  'note' => 'Rhein-Neckar-Region mit Mannheim & Umland.'],
    ['name' => 'Esslingen',   'note' => 'Neckartal bis Plochingen und Kirchheim/Teck.'],
    ['name' => 'Waiblingen',  'note' => 'Rems-Murr-Kreis, Fellbach & Schorndorf.'],
];

$faqs = [
    [
        'q' => 'Was kostet eine Webseite für meinen Handwerksbetrieb?',
        'a' => 'Eine fokussierte Handwerker-Landingpage gibt es bei uns ab 1.490 € einmalig plus 149 € pro Monat für Hosting, Wartung, Updates und laufende Änderungen. Der genaue Preis hängt vom Umfang ab – wir legen ihn vor dem Start verbindlich fest, ohne versteckte Kosten.',
    ],
    [
        'q' => 'Wie lange dauert es, bis meine Handwerker-Homepage online ist?',
        'a' => 'In der Regel 2 bis 4 Wochen vom ersten Gespräch bis zum Launch. Wir übernehmen Texte, Struktur und Technik – du lieferst nur Fotos deiner Arbeit und ein paar Infos zu deinem Betrieb.',
    ],
    [
        'q' => 'Werde ich mit der Webseite bei Google gefunden?',
        'a' => 'Ja, genau dafür bauen wir sie. Jede Seite wird für lokale Suchanfragen wie „Elektriker Ludwigsburg“ oder „Dachdecker Heilbronn“ optimiert – inklusive Google-Business-Profil, lokalem SEO-Setup, schnellen Ladezeiten und sauberer Technik.',
    ],
    [
        'q' => 'Ich habe keine Zeit, mich um eine Webseite zu kümmern. Wie viel Aufwand habe ich?',
        'a' => 'Fast keinen. Ein Erstgespräch (ca. 30 Minuten), einmal Fotos und Betriebsdaten liefern, einmal Feedback zum Entwurf – den Rest machen wir. Auch nach dem Launch kümmern wir uns um Updates, Sicherheit und Änderungen.',
    ],
    [
        'q' => 'Was passiert mit meiner alten Webseite?',
        'a' => 'Wir übernehmen den Umzug komplett: Domain, E-Mail-Adressen und bestehende Inhalte werden sauber migriert, alte Google-Rankings bleiben durch Weiterleitungen erhalten.',
    ],
    [
        'q' => 'Arbeitet ihr nur in der Region Stuttgart?',
        'a' => 'Unser Schwerpunkt liegt auf Stuttgart, Ludwigsburg, Heilbronn, Heidelberg und der Region – weil wir lokale Suchbegriffe und den Markt hier kennen. Auf Wunsch arbeiten wir aber deutschlandweit, alle Abläufe funktionieren auch komplett digital.',
    ],
];

/* Inline-SVG-Icons (stroke), damit keine Emojis nötig sind */
function mystu_hw_icon($name) {
    $icons = [
        'design' => '<path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/>',
        'pin'    => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 1 1 16 0z"/><circle cx="12" cy="10" r="3"/>',
        'phone'  => '<rect x="5" y="2" width="14" height="20" rx="2"/><path d="M12 18h.01"/>',
        'image'  => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>',
        'mail'   => '<rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 7l-10 6L2 7"/>',
        'shield' => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M9 12l2 2 4-4"/>',
        'clock'  => '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>',
        'arrow'  => '<path d="M5 12h14"/><path d="M12 5l7 7-7 7"/>',
    ];
    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6" aria-hidden="true">' . $icons[$name] . '</svg>';
}

$nav_items = [
    '#leistungen' => 'Leistungen',
    '#ablauf'     => 'Ablauf',
    '#region'     => 'Region',
    '#preis'      => 'Preis',
    '#rechner'    => 'Demo',
    '#faq'        => 'FAQ',
];

$sent  = isset($_GET['handwerker_sent']);
$error = isset($_GET['handwerker_error']);
?>

<!-- ===== STANDALONE NAVIGATION ===== -->
<header class="sticky top-0 z-50 border-b border-[#0e2a47]/10 bg-white/90 backdrop-blur-md">
    <div class="mx-auto flex w-full max-w-6xl items-center justify-between gap-6 px-5 py-4 sm:px-8">
        <a href="<?php echo esc_url(home_url('/handwerker-webseite/')); ?>" class="flex items-baseline gap-2.5">
            <img src="<?php echo esc_url(content_url('uploads/mystu-logo.svg')); ?>" alt="mystu" class="h-7 w-auto" width="94" height="31">
            <span class="hidden font-mono text-[0.62rem] uppercase tracking-[0.22em] text-[#1f6fe0] sm:inline">für Handwerker</span>
        </a>
        <nav class="hidden items-center gap-7 md:flex" aria-label="Seitennavigation">
            <?php foreach ($nav_items as $href => $label): ?>
                <a href="<?php echo esc_attr($href); ?>" class="text-sm font-medium text-[#3c5570] transition hover:text-[#0e2a47]"><?php echo esc_html($label); ?></a>
            <?php endforeach; ?>
        </nav>
        <a href="#anfrage" class="inline-flex items-center gap-2 rounded-lg bg-[#0e2a47] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1f6fe0]">
            Erstgespräch
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5" aria-hidden="true"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</header>

<main id="main" class="bg-[#fafbfd] text-[#0e2a47]">

    <!-- ===== HERO ===== -->
    <section class="border-b border-[#0e2a47]/10">
        <div class="mx-auto grid w-full max-w-6xl gap-14 px-5 pb-16 pt-14 sm:px-8 sm:pt-20 lg:grid-cols-[1.05fr_0.95fr] lg:items-center lg:pb-24">
            <div>
                <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">Webdesign für Handwerksbetriebe · Baden-Württemberg</p>
                <h1 class="mt-6 font-display text-[clamp(2.5rem,5.4vw,4.4rem)] leading-[1.02] tracking-[-0.02em]">
                    Webseiten für Handwerker, die Anfragen bringen.
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-[#3c5570]">
                    Deine Kunden suchen bei Google nach „Elektriker Ludwigsburg“ oder „Maler Stuttgart“ – nicht in den Gelben Seiten. Wir bauen dir eine Webseite, die dort auftaucht und aus Besuchern Aufträge macht. In <strong class="font-semibold text-[#0e2a47]">Stuttgart, Ludwigsburg, Heilbronn und Heidelberg</strong>.
                </p>
                <div class="mt-9 flex flex-wrap items-center gap-4">
                    <a href="#anfrage" class="inline-flex items-center gap-2 rounded-lg bg-[#1f6fe0] px-6 py-3.5 text-sm font-semibold text-white shadow-[0_10px_30px_rgba(31,111,224,0.28)] transition hover:bg-[#1a5fc4]">
                        Kostenloses Erstgespräch
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="#leistungen" class="text-sm font-semibold text-[#0e2a47] underline decoration-[#1f6fe0]/40 decoration-2 underline-offset-8 transition hover:decoration-[#1f6fe0]">Was ist drin?</a>
                </div>
            </div>
            <figure class="relative">
                <div class="hw-tick absolute -right-3 -top-3 h-16 w-16 border-r-2 border-t-2 border-[#1f6fe0]" aria-hidden="true"></div>
                <div class="hw-tick absolute -bottom-3 -left-3 h-16 w-16 border-b-2 border-l-2 border-[#1f6fe0]" aria-hidden="true"></div>
                <img src="<?php echo esc_url($hero_img); ?>" srcset="<?php echo esc_url($hero_img_sm); ?> 768w, <?php echo esc_url($hero_img); ?> 1280w" sizes="(min-width: 1024px) 45vw, 92vw" alt="Handwerker bei der Arbeit in seiner Werkstatt – Webdesign für Handwerksbetriebe in der Region Stuttgart" class="w-full rounded-sm object-cover" width="1280" height="720" loading="eager" fetchpriority="high">
            </figure>
        </div>
        <div class="border-t border-[#0e2a47]/10 bg-white">
            <dl class="mx-auto grid w-full max-w-6xl grid-cols-1 divide-y divide-[#0e2a47]/10 px-5 sm:grid-cols-3 sm:divide-x sm:divide-y-0 sm:px-8">
                <div class="py-6 sm:pr-8">
                    <dt class="font-mono text-[0.65rem] uppercase tracking-[0.2em] text-[#5b7186]">Online in</dt>
                    <dd class="mt-1 font-display text-2xl">2–4 Wochen</dd>
                </div>
                <div class="py-6 sm:px-8">
                    <dt class="font-mono text-[0.65rem] uppercase tracking-[0.2em] text-[#5b7186]">Kalkulation</dt>
                    <dd class="mt-1 font-display text-2xl">Festpreis, wie dein Angebot</dd>
                </div>
                <div class="py-6 sm:pl-8">
                    <dt class="font-mono text-[0.65rem] uppercase tracking-[0.2em] text-[#5b7186]">Rückmeldung</dt>
                    <dd class="mt-1 font-display text-2xl">Innerhalb von 24 h</dd>
                </div>
            </dl>
        </div>
    </section>

    <!-- ===== WARUM ===== -->
    <section class="border-b border-[#0e2a47]/10 py-20 sm:py-24">
        <div class="mx-auto w-full max-w-6xl px-5 sm:px-8">
            <div class="grid gap-10 lg:grid-cols-[0.85fr_1.15fr]">
                <div>
                    <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">01 — Warum</p>
                    <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Wer online nicht auftaucht, verliert Aufträge an die Konkurrenz.</h2>
                </div>
                <div class="divide-y divide-[#0e2a47]/10">
                    <div class="flex gap-6 py-6 first:pt-0">
                        <span class="font-display text-3xl text-[#1f6fe0]">80&nbsp;%</span>
                        <p class="text-[0.95rem] leading-7 text-[#3c5570]">deiner Kunden googeln, bevor sie anrufen. Ohne professionelle Webseite existierst du für sie nicht – egal wie gut deine Arbeit ist.</p>
                    </div>
                    <div class="flex gap-6 py-6">
                        <span class="font-display text-3xl text-[#1f6fe0]">24/7</span>
                        <p class="text-[0.95rem] leading-7 text-[#3c5570]">nimmt deine Webseite Anfragen entgegen, während du auf der Baustelle stehst – mit Anfrageformular, Klick-zum-Anrufen und deinen Referenzen.</p>
                    </div>
                    <div class="flex gap-6 py-6 last:pb-0">
                        <span class="font-display text-3xl text-[#1f6fe0]">Platz&nbsp;1</span>
                        <p class="text-[0.95rem] leading-7 text-[#3c5570]">bei „Schreiner Ludwigsburg“ bekommt den Anruf. Lokale Sichtbarkeit ist planbar – wir bauen sie systematisch für dein Gewerk auf.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== LEISTUNGEN ===== -->
    <section id="leistungen" class="border-b border-[#0e2a47]/10 bg-white py-20 sm:py-24">
        <div class="mx-auto w-full max-w-6xl px-5 sm:px-8">
            <div class="max-w-2xl">
                <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">02 — Leistungen</p>
                <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Deine Handwerker-Homepage. Komplett gemacht.</h2>
                <p class="mt-4 text-base leading-8 text-[#3c5570]">Kein Baukasten, keine Vorlage von der Stange – geplant, gebaut und dauerhaft betreut.</p>
            </div>
            <div class="mt-14 grid gap-x-12 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
                <?php
                $leistungen = [
                    ['icon' => 'design', 'title' => 'Individuelles Design', 'text' => 'Dein Logo, deine Farben, deine Handschrift. Eine Seite, die aussieht wie dein Betrieb – seriös und unverwechselbar.'],
                    ['icon' => 'pin',    'title' => 'Lokales Google-Ranking', 'text' => 'SEO für dein Gewerk und deine Städte, plus Einrichtung und Pflege deines Google-Business-Profils.'],
                    ['icon' => 'phone',  'title' => 'Perfekt auf dem Handy', 'text' => 'Über 70 % deiner Kunden kommen mobil. Deine Seite lädt schnell und funktioniert auf jedem Gerät.'],
                    ['icon' => 'image',  'title' => 'Referenzen, die verkaufen', 'text' => 'Vorher-Nachher-Bilder, Projektgalerien und Kundenstimmen – professionell in Szene gesetzt.'],
                    ['icon' => 'mail',   'title' => 'Anfragen statt Anrufbeantworter', 'text' => 'Anfrageformular, Klick-zum-Anrufen und WhatsApp. Interessenten erreichen dich so, wie es ihnen passt.'],
                    ['icon' => 'shield', 'title' => 'DSGVO, Hosting & Wartung', 'text' => 'Impressum, Datenschutz, SSL, Backups und Updates – rechtssicher und dauerhaft gepflegt.'],
                ];
                foreach ($leistungen as $l): ?>
                    <article class="border-t-2 border-[#0e2a47]/10 pt-6 transition-colors hover:border-[#1f6fe0]">
                        <span class="text-[#1f6fe0]"><?php echo mystu_hw_icon($l['icon']); ?></span>
                        <h3 class="mt-4 font-display text-xl"><?php echo esc_html($l['title']); ?></h3>
                        <p class="mt-2.5 text-sm leading-7 text-[#3c5570]"><?php echo esc_html($l['text']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== GEWERKE ===== -->
    <section class="border-b border-[#0e2a47]/10 py-20 sm:py-24">
        <div class="mx-auto grid w-full max-w-6xl gap-10 px-5 sm:px-8 lg:grid-cols-[0.85fr_1.15fr]">
            <div>
                <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">03 — Gewerke</p>
                <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Wir sprechen Handwerk – egal welches.</h2>
                <p class="mt-4 max-w-md text-base leading-8 text-[#3c5570]">Jedes Gewerk hat eigene Kunden, eigene Suchbegriffe und eigene Argumente. Wir kennen die Unterschiede und bauen deine Seite genau darauf zugeschnitten.</p>
            </div>
            <div>
                <ul class="flex flex-wrap content-start gap-2.5">
                    <?php foreach ($gewerke as $g): ?>
                        <li><button type="button" data-gewerk="<?php echo esc_attr($g); ?>" class="gewerk-chip rounded-md border border-[#0e2a47]/15 bg-white px-4 py-2.5 text-sm font-medium text-[#0e2a47] transition hover:border-[#1f6fe0] hover:text-[#1f6fe0]"><?php echo esc_html($g); ?></button></li>
                    <?php endforeach; ?>
                    <li class="rounded-md border border-dashed border-[#1f6fe0]/50 px-4 py-2.5 text-sm font-medium text-[#1f6fe0]">… und dein Gewerk</li>
                </ul>
                <p class="mt-4 font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]" id="gewerk-chip-hint">Tipp: Gewerk anklicken – wir übernehmen es unten ins Anfrageformular.</p>
            </div>
        </div>
    </section>

    <!-- ===== ABLAUF ===== -->
    <section id="ablauf" class="border-b border-[#0e2a47]/10 bg-white py-20 sm:py-24">
        <div class="mx-auto w-full max-w-6xl px-5 sm:px-8">
            <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">04 — Ablauf</p>
            <h2 class="mt-5 max-w-2xl font-display text-3xl leading-tight sm:text-4xl">Von der Anfrage bis online – in vier Schritten.</h2>
            <ol class="mt-14 grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
                <?php
                $schritte = [
                    ['title' => 'Erstgespräch', 'text' => 'Kostenlos und unverbindlich, ca. 30 Minuten. Wir hören zu: dein Betrieb, deine Kunden, deine Ziele.'],
                    ['title' => 'Konzept & Entwurf', 'text' => 'Du bekommst einen konkreten Design-Entwurf und eine klare Struktur – inklusive Texten, die dein Handwerk verkaufen.'],
                    ['title' => 'Umsetzung', 'text' => 'Wir bauen, optimieren für Google und testen auf allen Geräten. Du gibst einmal Feedback, wir feilen nach.'],
                    ['title' => 'Launch & Betreuung', 'text' => 'Deine Seite geht live. Ab jetzt kümmern wir uns um Hosting, Updates und Änderungen – du dich um deine Aufträge.'],
                ];
                foreach ($schritte as $i => $s): ?>
                    <li class="border-l-2 border-[#0e2a47]/10 pl-6 transition-colors hover:border-[#1f6fe0]">
                        <span class="font-mono text-[0.7rem] uppercase tracking-[0.2em] text-[#5b7186]">Schritt <?php echo $i + 1; ?></span>
                        <h3 class="mt-3 font-display text-xl"><?php echo esc_html($s['title']); ?></h3>
                        <p class="mt-2.5 text-sm leading-7 text-[#3c5570]"><?php echo esc_html($s['text']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- ===== REGION (Local SEO) ===== -->
    <section id="region" class="border-b border-[#0e2a47]/10 py-20 sm:py-24">
        <div class="mx-auto w-full max-w-6xl px-5 sm:px-8">
            <div class="max-w-2xl">
                <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">05 — Region</p>
                <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Webdesign für Handwerker in deiner Region.</h2>
                <p class="mt-4 text-base leading-8 text-[#3c5570]">Wir sitzen in der Region Stuttgart und kennen den Markt: die Suchbegriffe deiner Kunden, die lokale Konkurrenz und was ein Betrieb hier online braucht, um Aufträge zu gewinnen.</p>
            </div>
            <div class="mt-12 divide-y divide-[#0e2a47]/10 border-y border-[#0e2a47]/10">
                <?php foreach ($regionen as $r): ?>
                    <div class="grid items-baseline gap-1 py-5 sm:grid-cols-[260px_1fr] sm:gap-8">
                        <h3 class="font-display text-xl">Handwerker-Webseite <?php echo esc_html($r['name']); ?></h3>
                        <p class="text-sm leading-7 text-[#3c5570]"><?php echo esc_html($r['note']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== PREIS ===== -->
    <section id="preis" class="border-b border-[#0e2a47]/10 bg-white py-20 sm:py-24">
        <div class="mx-auto grid w-full max-w-6xl gap-12 px-5 sm:px-8 lg:grid-cols-[1fr_1fr] lg:items-center">
            <div>
                <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">06 — Preis</p>
                <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Ein Preis. Alles drin. Keine Überraschungen.</h2>
                <p class="mt-4 max-w-lg text-base leading-8 text-[#3c5570]">Wie bei einem guten Angebot vom Handwerker: Der Umfang steht vorher fest, der Preis auch. Danach läuft alles über eine planbare monatliche Betreuung – Hosting, Sicherheit, Updates und Änderungen inklusive.</p>
                <a href="<?php echo esc_url(home_url('/preise/')); ?>" class="mt-7 inline-block text-sm font-semibold text-[#0e2a47] underline decoration-[#1f6fe0]/40 decoration-2 underline-offset-8 transition hover:decoration-[#1f6fe0]">Alle Pakete & Preise ansehen</a>
            </div>
            <aside class="rounded-xl bg-[#0e2a47] p-8 text-white sm:p-10">
                <p class="font-mono text-[0.65rem] uppercase tracking-[0.22em] text-[#7fb2f5]">Handwerker-Landingpage</p>
                <div class="mt-6 flex flex-wrap items-baseline gap-x-10 gap-y-3">
                    <div>
                        <span class="block text-xs text-white/70">Einmalig</span>
                        <strong class="font-display text-4xl font-medium">ab 1.490&nbsp;€</strong>
                    </div>
                    <div>
                        <span class="block text-xs text-white/70">Betreuung</span>
                        <strong class="font-display text-4xl font-medium text-[#7fb2f5]">149&nbsp;€<small class="text-base text-white/70"> / Monat</small></strong>
                    </div>
                </div>
                <ul class="mt-8 space-y-3 border-t border-white/15 pt-7 text-sm leading-6 text-white/85">
                    <li class="flex gap-3"><span class="mt-0.5 text-[#7fb2f5]" aria-hidden="true">—</span> Individuelles Design & alle Texte</li>
                    <li class="flex gap-3"><span class="mt-0.5 text-[#7fb2f5]" aria-hidden="true">—</span> Lokale Google-Optimierung</li>
                    <li class="flex gap-3"><span class="mt-0.5 text-[#7fb2f5]" aria-hidden="true">—</span> Anfrageformular & Klick-zum-Anrufen</li>
                    <li class="flex gap-3"><span class="mt-0.5 text-[#7fb2f5]" aria-hidden="true">—</span> Hosting, Wartung & Änderungen inklusive</li>
                </ul>
                <a href="#anfrage" class="mt-9 inline-flex items-center gap-2 rounded-lg bg-[#1f6fe0] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#3b84ea]">
                    Unverbindlich anfragen
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                </a>
            </aside>
        </div>
    </section>

    <!-- ===== DEMO: ANGEBOTSRECHNER ===== -->
    <section id="rechner" class="border-b border-[#0e2a47]/10 py-20 sm:py-24">
        <div class="mx-auto w-full max-w-6xl px-5 sm:px-8">
            <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
                <div>
                    <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">07 — Live-Demo</p>
                    <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Zeig deinen Kunden sofort, was es kostet.</h2>
                    <p class="mt-4 text-base leading-8 text-[#3c5570]">So etwas bauen wir dir in deine Webseite: ein Angebotsrechner, mit dem <strong class="font-semibold text-[#0e2a47]">deine Kunden</strong> in 10 Sekunden einen Richtwert bekommen – und dann direkt anfragen. Probier die Demo rechts aus.</p>
                    <ul class="mt-8 space-y-4 border-t border-[#0e2a47]/10 pt-7 text-sm leading-7 text-[#3c5570]">
                        <li class="flex gap-4"><span class="font-display text-lg text-[#1f6fe0]">→</span><span><strong class="font-semibold text-[#0e2a47]">Wer zuerst eine Hausnummer nennt, bekommt die Anfrage.</strong> Kunden vergleichen – ein Richtwert auf deiner Seite hält sie bei dir.</span></li>
                        <li class="flex gap-4"><span class="font-display text-lg text-[#1f6fe0]">→</span><span><strong class="font-semibold text-[#0e2a47]">Filtert Preisfüchse automatisch aus.</strong> Wer nach dem Richtwert anfragt, weiß, was gute Arbeit kostet.</span></li>
                        <li class="flex gap-4"><span class="font-display text-lg text-[#1f6fe0]">→</span><span><strong class="font-semibold text-[#0e2a47]">Arbeitet auch nachts und am Wochenende.</strong> Jede Berechnung endet in einem Anfrage-Button – direkt in dein Postfach.</span></li>
                    </ul>
                    <button type="button" id="demo-cta" class="mt-9 inline-flex items-center gap-2 rounded-lg bg-[#1f6fe0] px-6 py-3.5 text-sm font-semibold text-white shadow-[0_10px_30px_rgba(31,111,224,0.28)] transition hover:bg-[#1a5fc4]">
                        So einen Rechner will ich auch
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" aria-hidden="true"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
                    </button>
                    <p class="mt-3 text-xs leading-6 text-[#5b7186]">Die Zahlen in der Demo sind Beispielwerte – deinen Rechner füllen wir mit deinen echten Preisen und Leistungen.</p>
                </div>

                <!-- Browser-Mockup mit Demo-Rechner -->
                <div class="overflow-hidden rounded-xl border border-[#0e2a47]/15 bg-white shadow-[0_24px_70px_rgba(13,43,74,0.12)]">
                    <div class="flex items-center gap-2 border-b border-[#0e2a47]/10 bg-[#f4f7fb] px-4 py-3">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#0e2a47]/15"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-[#0e2a47]/15"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-[#0e2a47]/15"></span>
                        <span class="ml-3 flex-1 truncate rounded-md bg-white px-3 py-1.5 font-mono text-[0.62rem] text-[#5b7186]">dein-betrieb.de/angebotsrechner</span>
                    </div>
                    <div class="p-6 sm:p-8">
                        <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#5b7186]">Demo · Angebotsrechner für deine Kunden</p>
                        <h3 class="mt-2 font-display text-2xl">Was kostet mein Projekt?</h3>

                        <div class="mt-5 flex flex-wrap gap-2" aria-label="Gewerk wählen">
                            <button type="button" class="demo-tab rounded-md border border-[#1f6fe0] bg-[#1f6fe0] px-4 py-2 text-sm font-medium text-white transition" data-trade="maler" aria-pressed="true">Maler</button>
                            <button type="button" class="demo-tab rounded-md border border-[#0e2a47]/15 bg-white px-4 py-2 text-sm font-medium text-[#0e2a47] transition hover:border-[#1f6fe0]" data-trade="bad" aria-pressed="false">Badsanierung</button>
                            <button type="button" class="demo-tab rounded-md border border-[#0e2a47]/15 bg-white px-4 py-2 text-sm font-medium text-[#0e2a47] transition hover:border-[#1f6fe0]" data-trade="elektro" aria-pressed="false">Elektro</button>
                        </div>

                        <div class="mt-7">
                            <div class="flex items-baseline justify-between gap-4">
                                <label for="demo-range" class="font-mono text-[0.65rem] uppercase tracking-[0.18em] text-[#5b7186]" id="demo-range-label">Wandfläche</label>
                                <output class="font-display text-lg" id="demo-range-value">80 m²</output>
                            </div>
                            <input type="range" id="demo-range" min="10" max="250" value="80" step="5" class="mt-3 w-full accent-[#1f6fe0]">
                        </div>

                        <div class="mt-6">
                            <label for="demo-option" class="font-mono text-[0.65rem] uppercase tracking-[0.18em] text-[#5b7186]">Ausführung</label>
                            <select id="demo-option" class="mt-2 w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15"></select>
                        </div>

                        <div class="mt-7 rounded-lg bg-[#0e2a47] px-6 py-5 text-white">
                            <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#7fb2f5]">Dein Richtwert</p>
                            <p class="mt-1.5 font-display text-3xl" id="demo-result">960 – 1.270 €</p>
                            <p class="mt-1 text-xs text-white/70">inkl. Material &amp; Arbeitszeit · Beispielwerte der Demo</p>
                        </div>

                        <div class="mt-4 flex items-center justify-between gap-4 rounded-lg border border-dashed border-[#1f6fe0]/40 bg-[#f4f8fe] px-5 py-4">
                            <p class="text-sm font-medium text-[#0e2a47]">So würde dein Kunde jetzt anfragen:</p>
                            <span class="inline-flex shrink-0 items-center gap-2 rounded-lg bg-[#1f6fe0]/90 px-4 py-2.5 text-sm font-semibold text-white">Angebot sichern →</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-16 border-t border-[#0e2a47]/10 pt-12">
                <h3 class="font-display text-2xl sm:text-3xl">Noch mehr Module – alle zum Ausprobieren.</h3>
                <p class="mt-3 max-w-2xl text-base leading-8 text-[#3c5570]">Jeden dieser Bausteine bauen wir dir in deine Webseite – mit deinen Preisen, deinen Fotos und deinem Einzugsgebiet. Alles hier ist eine funktionierende Demo, nichts wird gespeichert.</p>

                <div class="mt-10 grid gap-6 lg:grid-cols-2">

                    <!-- Modul: Vorher/Nachher-Slider -->
                    <article class="rounded-xl border border-[#0e2a47]/15 bg-white p-6 sm:p-7">
                        <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#5b7186]">Modul · Vorher / Nachher</p>
                        <h4 class="mt-2 font-display text-xl">Dein Ergebnis, zum Ziehen.</h4>
                        <p class="mt-2 text-sm leading-6 text-[#3c5570]">Zieh den Regler – so zeigst du Kunden dein Handwerk, ohne ein Wort zu schreiben.</p>
                        <div class="relative mt-5 select-none overflow-hidden rounded-lg" id="ba-wrap">
                            <img src="<?php echo esc_url($hero_img_sm); ?>" alt="Nachher: fertige Arbeit in der Werkstatt" class="block w-full" width="768" height="432" loading="lazy">
                            <div class="absolute inset-y-0 left-0 overflow-hidden" id="ba-top" style="width:50%">
                                <img src="<?php echo esc_url($hero_img_sm); ?>" alt="Vorher: Zustand vor der Arbeit" class="block h-full max-w-none grayscale contrast-75 brightness-[0.8] sepia-[0.25]" id="ba-before" loading="lazy">
                            </div>
                            <div class="pointer-events-none absolute inset-y-0 z-10" id="ba-line" style="left:50%">
                                <div class="h-full w-[3px] -translate-x-1/2 bg-white shadow-[0_0_10px_rgba(0,0,0,0.4)]"></div>
                                <div class="absolute top-1/2 flex h-9 w-9 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-white text-[#0e2a47] shadow-lg">⇔</div>
                            </div>
                            <span class="pointer-events-none absolute left-3 top-3 z-10 rounded bg-[#0e2a47]/80 px-2 py-1 font-mono text-[0.6rem] uppercase tracking-[0.14em] text-white">Vorher</span>
                            <span class="pointer-events-none absolute right-3 top-3 z-10 rounded bg-[#1f6fe0]/90 px-2 py-1 font-mono text-[0.6rem] uppercase tracking-[0.14em] text-white">Nachher</span>
                            <input type="range" min="0" max="100" value="50" id="ba-range" aria-label="Vorher-Nachher-Vergleich" class="absolute inset-0 z-20 h-full w-full cursor-ew-resize opacity-0">
                        </div>
                    </article>

                    <!-- Modul: PLZ-Check -->
                    <article class="flex flex-col rounded-xl border border-[#0e2a47]/15 bg-white p-6 sm:p-7">
                        <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#5b7186]">Modul · Einzugsgebiet</p>
                        <h4 class="mt-2 font-display text-xl">Arbeiten wir bei dir?</h4>
                        <p class="mt-2 text-sm leading-6 text-[#3c5570]">Deine Kunden prüfen in 2 Sekunden, ob sie im Einzugsgebiet liegen – probier z.&nbsp;B. 71634 oder 20095.</p>
                        <div class="mt-5 flex gap-2">
                            <input type="text" id="plz-input" inputmode="numeric" maxlength="5" placeholder="Deine Postleitzahl" class="w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15" aria-label="Postleitzahl">
                            <button type="button" id="plz-check" class="shrink-0 rounded-lg bg-[#0e2a47] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#1f6fe0]">Prüfen</button>
                        </div>
                        <p class="mt-4 min-h-[3.5rem] rounded-lg bg-[#f4f8fe] px-4 py-3 text-sm leading-6 text-[#3c5570]" id="plz-result" aria-live="polite">Das Ergebnis erscheint hier.</p>
                    </article>

                    <!-- Modul: Terminanfrage -->
                    <article class="flex flex-col rounded-xl border border-[#0e2a47]/15 bg-white p-6 sm:p-7">
                        <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#5b7186]">Modul · Terminanfrage</p>
                        <h4 class="mt-2 font-display text-xl">Wunschtermin statt Warteschleife.</h4>
                        <p class="mt-2 text-sm leading-6 text-[#3c5570]">Kunden schlagen ein Zeitfenster vor – ganz ohne Kalender-Chaos, die Anfrage landet strukturiert bei dir.</p>
                        <p class="mt-5 font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]">Tag wählen</p>
                        <div class="mt-2 flex flex-wrap gap-2" id="termin-days"></div>
                        <p class="mt-4 font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]">Zeitfenster</p>
                        <div class="mt-2 flex flex-wrap gap-2">
                            <button type="button" class="termin-slot rounded-md border border-[#0e2a47]/15 bg-white px-4 py-2 text-sm font-medium transition hover:border-[#1f6fe0]" data-slot="vormittags (8–12 Uhr)">Vormittag</button>
                            <button type="button" class="termin-slot rounded-md border border-[#0e2a47]/15 bg-white px-4 py-2 text-sm font-medium transition hover:border-[#1f6fe0]" data-slot="nachmittags (13–17 Uhr)">Nachmittag</button>
                        </div>
                        <div class="mt-5 flex flex-col gap-3 border-t border-[#0e2a47]/10 pt-4 sm:flex-row sm:items-center sm:justify-between">
                            <p class="text-sm font-medium text-[#0e2a47]" id="termin-summary">Wähle Tag &amp; Zeitfenster.</p>
                            <button type="button" id="termin-cta" disabled class="shrink-0 rounded-lg bg-[#1f6fe0] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#1a5fc4] disabled:cursor-not-allowed disabled:opacity-40">Termin anfragen</button>
                        </div>
                    </article>

                    <!-- Modul: Foto-Upload -->
                    <article class="flex flex-col rounded-xl border border-[#0e2a47]/15 bg-white p-6 sm:p-7">
                        <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#5b7186]">Modul · Foto zur Anfrage</p>
                        <h4 class="mt-2 font-display text-xl">„Schick uns ein Bild vom Schaden."</h4>
                        <p class="mt-2 text-sm leading-6 text-[#3c5570]">Ein Foto sagt mehr als drei Telefonate – und spart dir den ersten Vor-Ort-Termin.</p>
                        <label for="foto-input" class="mt-5 flex min-h-[7rem] cursor-pointer flex-col items-center justify-center gap-2 rounded-lg border-2 border-dashed border-[#0e2a47]/20 bg-[#f4f8fe] px-4 py-6 text-center transition hover:border-[#1f6fe0]" id="foto-zone">
                            <span class="text-[#1f6fe0]"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-7 w-7" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M17 8l-5-5-5 5"/><path d="M12 3v12"/></svg></span>
                            <span class="text-sm font-medium text-[#0e2a47]" id="foto-label">Foto auswählen oder hierher ziehen</span>
                            <span class="font-mono text-[0.6rem] uppercase tracking-[0.16em] text-[#5b7186]">Demo – bleibt auf deinem Gerät</span>
                        </label>
                        <input type="file" id="foto-input" accept="image/*" class="sr-only">
                        <div class="mt-4 hidden items-center gap-4 rounded-lg bg-[#f4f8fe] p-3" id="foto-preview">
                            <img src="" alt="Vorschau deines Fotos" class="h-16 w-16 rounded-md object-cover" id="foto-thumb">
                            <div class="min-w-0 text-sm">
                                <p class="truncate font-medium text-[#0e2a47]" id="foto-name"></p>
                                <p class="text-[#3c5570]">Im echten Einsatz hängt das Foto jetzt an deiner Anfrage.</p>
                            </div>
                        </div>
                    </article>

                    <!-- Modul: Materialrechner -->
                    <article class="flex flex-col rounded-xl border border-[#0e2a47]/15 bg-white p-6 sm:p-7">
                        <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#5b7186]">Modul · Materialrechner</p>
                        <h4 class="mt-2 font-display text-xl">Wie viel Farbe? Wie viele Fliesen?</h4>
                        <p class="mt-2 text-sm leading-6 text-[#3c5570]">Solche Rechner ziehen Besucher über Google an – und machen aus Heimwerkern Anfragen, wenn es doch der Profi sein soll.</p>
                        <div class="mt-5 flex gap-2">
                            <button type="button" class="mat-tab rounded-md border border-[#1f6fe0] bg-[#1f6fe0] px-4 py-2 text-sm font-medium text-white transition" data-mat="farbe" aria-pressed="true">Wandfarbe</button>
                            <button type="button" class="mat-tab rounded-md border border-[#0e2a47]/15 bg-white px-4 py-2 text-sm font-medium text-[#0e2a47] transition hover:border-[#1f6fe0]" data-mat="fliesen" aria-pressed="false">Fliesen</button>
                        </div>
                        <div class="mt-5">
                            <div class="flex items-baseline justify-between gap-4">
                                <label for="mat-range" class="font-mono text-[0.65rem] uppercase tracking-[0.18em] text-[#5b7186]" id="mat-range-label">Wandfläche</label>
                                <output class="font-display text-lg" id="mat-range-value">40 m²</output>
                            </div>
                            <input type="range" id="mat-range" min="5" max="200" value="40" step="5" class="mt-3 w-full accent-[#1f6fe0]">
                        </div>
                        <div class="mt-4" id="mat-extra-wrap">
                            <label for="mat-extra" class="font-mono text-[0.65rem] uppercase tracking-[0.18em] text-[#5b7186]" id="mat-extra-label">Anstriche</label>
                            <select id="mat-extra" class="mt-2 w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15"></select>
                        </div>
                        <p class="mt-5 rounded-lg bg-[#f4f8fe] px-4 py-3 text-sm leading-6 text-[#0e2a47]" id="mat-result" aria-live="polite"></p>
                    </article>

                    <!-- Modul: Quiz -->
                    <article class="flex flex-col rounded-xl border border-[#0e2a47]/15 bg-[#0e2a47] p-6 text-white sm:p-7">
                        <p class="font-mono text-[0.62rem] uppercase tracking-[0.2em] text-[#7fb2f5]">Modul · Quiz / Beratung</p>
                        <h4 class="mt-2 font-display text-xl">Welche Webseite braucht dein Betrieb?</h4>
                        <p class="mt-2 text-sm leading-6 text-white/70">Drei Fragen, ehrliche Empfehlung – so führt eine Webseite Besucher zur richtigen Anfrage.</p>
                        <div class="mt-5 flex-1" id="quiz-box">
                            <p class="font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#7fb2f5]" id="quiz-progress"></p>
                            <p class="mt-2 font-display text-lg" id="quiz-question"></p>
                            <div class="mt-4 grid gap-2" id="quiz-options"></div>
                        </div>
                        <div class="mt-5 hidden border-t border-white/15 pt-5" id="quiz-result">
                            <p class="font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#7fb2f5]">Unsere Empfehlung</p>
                            <p class="mt-2 font-display text-2xl" id="quiz-rec"></p>
                            <p class="mt-2 text-sm leading-6 text-white/70" id="quiz-why"></p>
                            <div class="mt-4 flex flex-wrap items-center gap-4">
                                <button type="button" id="quiz-cta" class="rounded-lg bg-[#1f6fe0] px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-[#3b84ea]">Empfehlung anfragen</button>
                                <button type="button" id="quiz-restart" class="text-sm text-white/75 underline underline-offset-4 transition hover:text-white">Nochmal starten</button>
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section>

    <!-- ===== FAQ ===== -->
    <section id="faq" class="border-b border-[#0e2a47]/10 bg-white py-20 sm:py-24">
        <div class="mx-auto grid w-full max-w-6xl gap-10 px-5 sm:px-8 lg:grid-cols-[0.85fr_1.15fr]">
            <div>
                <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#1f6fe0]">08 — FAQ</p>
                <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Kurz & ehrlich beantwortet.</h2>
                <p class="mt-4 max-w-sm text-base leading-8 text-[#3c5570]">Deine Frage ist nicht dabei? Schreib uns an <a href="mailto:hi@mystu.de" class="font-semibold text-[#0e2a47] underline decoration-[#1f6fe0]/40 decoration-2 underline-offset-4 hover:decoration-[#1f6fe0]">hi@mystu.de</a>.</p>
            </div>
            <div class="divide-y divide-[#0e2a47]/10 border-y border-[#0e2a47]/10">
                <?php foreach ($faqs as $faq): ?>
                    <details class="group py-5">
                        <summary class="flex cursor-pointer list-none items-baseline justify-between gap-6 font-display text-lg [&::-webkit-details-marker]:hidden">
                            <?php echo esc_html($faq['q']); ?>
                            <span class="shrink-0 font-mono text-xl text-[#1f6fe0] transition-transform group-open:rotate-45" aria-hidden="true">+</span>
                        </summary>
                        <p class="mt-3 max-w-xl text-sm leading-7 text-[#3c5570]"><?php echo esc_html($faq['a']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ===== ANFRAGE ===== -->
    <section id="anfrage" class="bg-[#0e2a47] py-20 text-white sm:py-24">
        <div class="mx-auto grid w-full max-w-6xl gap-14 px-5 sm:px-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="font-mono text-[0.7rem] uppercase tracking-[0.24em] text-[#7fb2f5]">09 — Kontakt</p>
                <h2 class="mt-5 font-display text-3xl leading-tight sm:text-4xl">Lass uns über deinen Betrieb reden.</h2>
                <p class="mt-4 max-w-md text-base leading-8 text-white/70">Schreib uns kurz, was du machst und wo du hinwillst. Wir melden uns innerhalb von 24 Stunden – mit einer ehrlichen Einschätzung, was deine Webseite können sollte und was sie kostet.</p>
                <ul class="mt-10 space-y-5 border-t border-white/15 pt-8 text-sm">
                    <li class="flex items-center gap-4">
                        <span class="text-[#7fb2f5]"><?php echo mystu_hw_icon('mail'); ?></span>
                        <a href="mailto:hi@mystu.de" class="font-semibold underline decoration-[#7fb2f5]/50 decoration-2 underline-offset-4 hover:decoration-[#7fb2f5]">hi@mystu.de</a>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-[#7fb2f5]"><?php echo mystu_hw_icon('pin'); ?></span>
                        <span class="text-white/80">Stuttgart · Ludwigsburg · Heilbronn · Heidelberg</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="text-[#7fb2f5]"><?php echo mystu_hw_icon('clock'); ?></span>
                        <span class="text-white/80">Antwort innerhalb von 24 Stunden</span>
                    </li>
                </ul>
            </div>

            <div class="rounded-xl bg-white p-7 text-[#0e2a47] sm:p-9">
                <?php if ($sent): ?>
                    <div class="mb-6 rounded-lg border border-[#1f6fe0]/30 bg-[#eaf2fd] px-5 py-4 text-sm font-medium text-[#164e9e]">Danke für deine Anfrage! Wir melden uns innerhalb von 24 Stunden bei dir.</div>
                <?php elseif ($error): ?>
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700">Da hat etwas nicht geklappt. Bitte prüfe deine Angaben oder schreib uns direkt an hi@mystu.de.</div>
                <?php endif; ?>

                <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post" class="grid gap-5">
                    <input type="hidden" name="action" value="mystu_handwerker_request">
                    <?php wp_nonce_field('mystu_handwerker_request', 'mystu_handwerker_nonce'); ?>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]">Name / Betrieb *</span>
                            <input type="text" name="name" required class="w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15" placeholder="z. B. Elektro Müller GmbH">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]">E-Mail *</span>
                            <input type="email" name="email" required class="w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15" placeholder="du@deinbetrieb.de">
                        </label>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">
                        <label class="block">
                            <span class="mb-1.5 block font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]">Telefon (optional)</span>
                            <input type="tel" name="phone" class="w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15" placeholder="Für einen schnellen Rückruf">
                        </label>
                        <label class="block">
                            <span class="mb-1.5 block font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]">Gewerk *</span>
                            <input type="text" name="gewerk" required class="w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15" placeholder="z. B. Sanitär & Heizung">
                        </label>
                    </div>
                    <label class="block">
                        <span class="mb-1.5 block font-mono text-[0.62rem] uppercase tracking-[0.18em] text-[#5b7186]">Worum geht's? *</span>
                        <textarea name="message" rows="4" required class="w-full rounded-lg border border-[#0e2a47]/20 bg-white px-4 py-3 text-sm outline-none transition focus:border-[#1f6fe0] focus:ring-2 focus:ring-[#1f6fe0]/15" placeholder="Kurz in 2–3 Sätzen: Hast du schon eine Webseite? Was soll die neue können?"></textarea>
                    </label>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#1f6fe0] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#1a5fc4]">
                        Anfrage senden – kostenlos & unverbindlich
                    </button>
                    <p class="text-xs leading-6 text-[#5b7186]">Deine Daten werden nur zur Bearbeitung deiner Anfrage verwendet. Kein Newsletter, keine Weitergabe.</p>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- ===== STANDALONE FOOTER ===== -->
<footer class="border-t border-[#0e2a47]/10 bg-white">
    <div class="mx-auto flex w-full max-w-6xl flex-col gap-6 px-5 py-10 sm:px-8 md:flex-row md:items-center md:justify-between">
        <div class="flex items-baseline gap-2.5">
            <img src="<?php echo esc_url(content_url('uploads/mystu-logo.svg')); ?>" alt="mystu" class="h-6 w-auto" width="80" height="27">
            <span class="font-mono text-[0.62rem] uppercase tracking-[0.22em] text-[#5b7186]">für Handwerker</span>
        </div>
        <nav class="flex flex-wrap gap-x-7 gap-y-2 text-sm text-[#3c5570]" aria-label="Rechtliches">
            <a href="<?php echo esc_url(home_url('/preise/')); ?>" class="transition hover:text-[#0e2a47]">Preise</a>
            <a href="<?php echo esc_url(home_url('/impressum/')); ?>" class="transition hover:text-[#0e2a47]">Impressum</a>
            <a href="<?php echo esc_url(home_url('/datenschutz/')); ?>" class="transition hover:text-[#0e2a47]">Datenschutz</a>
        </nav>
        <p class="text-sm text-[#5b7186]">&copy; <?php echo date('Y'); ?> mystu.de</p>
    </div>
</footer>

<style>
    /* Animationen der Handwerker-Landingpage */
    .hw-reveal {
        opacity: 0;
        transform: translateY(26px);
        transition: opacity .7s cubic-bezier(.22, .61, .36, 1), transform .7s cubic-bezier(.22, .61, .36, 1);
        transition-delay: var(--hw-delay, 0ms);
        will-change: opacity, transform;
    }
    .hw-reveal.hw-in { opacity: 1; transform: none; }

    @keyframes hw-pop {
        0% { transform: scale(1); }
        35% { transform: scale(1.06); }
        100% { transform: scale(1); }
    }
    .hw-pop { display: inline-block; animation: hw-pop .35s ease; }

    .hw-nav-scrolled { box-shadow: 0 10px 34px rgba(13, 43, 74, .10); }

    @keyframes hw-tick {
        0%, 100% { opacity: 1; }
        50% { opacity: .35; }
    }
    .hw-tick { animation: hw-tick 2.6s ease-in-out infinite; }

    @media (prefers-reduced-motion: reduce) {
        .hw-reveal { opacity: 1; transform: none; transition: none; }
        .hw-pop, .hw-tick { animation: none; }
    }
</style>

<script>
(function () {
    'use strict';

    var fmt = function (n) { return Math.round(n).toLocaleString('de-DE') + ' €'; };

    /* --- Demo-Angebotsrechner (Handwerker → Endkunde), Beispielwerte --- */
    var DEMOS = {
        maler: {
            label: 'Wandfläche', unit: ' m²', min: 10, max: 250, value: 80, step: 5,
            options: [
                ['Wände streichen', 12],
                ['Tapezieren & streichen', 22],
                ['Lackier- & Lasurarbeiten', 28]
            ]
        },
        bad: {
            label: 'Badgröße', unit: ' m²', min: 3, max: 20, value: 8, step: 1,
            options: [
                ['Basis-Sanierung', 2200],
                ['Komfort', 3200],
                ['Premium', 4500]
            ]
        },
        elektro: {
            label: 'Anzahl Räume', unit: ' Räume', min: 1, max: 12, value: 5, step: 1,
            options: [
                ['Schalter & Steckdosen erneuern', 380],
                ['Komplette Neuverkabelung', 950],
                ['Smart-Home-Ausbau', 1400]
            ]
        }
    };

    var tabs       = Array.prototype.slice.call(document.querySelectorAll('.demo-tab'));
    var rangeEl    = document.getElementById('demo-range');
    var rangeLabel = document.getElementById('demo-range-label');
    var rangeValue = document.getElementById('demo-range-value');
    var optionEl   = document.getElementById('demo-option');
    var resultEl   = document.getElementById('demo-result');
    var currentTrade = 'maler';

    function demoRender() {
        var d = DEMOS[currentTrade];
        if (!d || !rangeEl) { return; }
        var qty   = parseInt(rangeEl.value, 10);
        var price = parseInt(optionEl.value, 10);
        var base  = qty * price;
        rangeValue.textContent = qty.toLocaleString('de-DE') + d.unit;
        resultEl.textContent   = fmt(base * 0.9) + ' – ' + fmt(base * 1.15);
    }

    function demoSetTrade(trade) {
        var d = DEMOS[trade];
        if (!d || !rangeEl) { return; }
        currentTrade = trade;
        rangeEl.min = d.min; rangeEl.max = d.max; rangeEl.step = d.step; rangeEl.value = d.value;
        rangeLabel.textContent = d.label;
        optionEl.innerHTML = '';
        d.options.forEach(function (o) {
            var opt = document.createElement('option');
            opt.value = o[1];
            opt.textContent = o[0];
            optionEl.appendChild(opt);
        });
        tabs.forEach(function (t) {
            var active = t.dataset.trade === trade;
            t.setAttribute('aria-pressed', active ? 'true' : 'false');
            t.classList.toggle('bg-[#1f6fe0]', active);
            t.classList.toggle('border-[#1f6fe0]', active);
            t.classList.toggle('text-white', active);
            t.classList.toggle('bg-white', !active);
            t.classList.toggle('border-[#0e2a47]/15', !active);
            t.classList.toggle('text-[#0e2a47]', !active);
        });
        demoRender();
    }

    if (rangeEl && optionEl && resultEl) {
        tabs.forEach(function (t) {
            t.addEventListener('click', function () { demoSetTrade(t.dataset.trade); });
        });
        rangeEl.addEventListener('input', demoRender);
        optionEl.addEventListener('change', demoRender);
        demoSetTrade('maler');
    }

    var messageField = document.querySelector('#anfrage textarea[name="message"]');
    var gewerkField  = document.querySelector('#anfrage input[name="gewerk"]');

    /* CTA: „So einen Rechner will ich auch“ → Formular vorbefüllen */
    var demoCta = document.getElementById('demo-cta');
    if (demoCta && messageField) {
        demoCta.addEventListener('click', function () {
            messageField.value = 'Ich interessiere mich für eine Webseite mit Angebotsrechner für meine Kunden '
                + '(wie in der Demo auf eurer Handwerker-Seite). Bitte um ein kostenloses Erstgespräch.';
            var target = document.getElementById('anfrage');
            if (target) { target.scrollIntoView({ behavior: 'smooth' }); }
            window.setTimeout(function () {
                var name = document.querySelector('#anfrage input[name="name"]');
                if (name) { name.focus({ preventScroll: true }); }
            }, 600);
        });
    }

    /* --- Modul: Vorher/Nachher-Slider --- */
    var baWrap   = document.getElementById('ba-wrap');
    var baRange  = document.getElementById('ba-range');
    var baTop    = document.getElementById('ba-top');
    var baLine   = document.getElementById('ba-line');
    var baBefore = document.getElementById('ba-before');
    if (baWrap && baRange) {
        var baSync = function () { baBefore.style.width = baWrap.clientWidth + 'px'; };
        var baMove = function () {
            baTop.style.width = baRange.value + '%';
            baLine.style.left = baRange.value + '%';
        };
        baRange.addEventListener('input', baMove);
        window.addEventListener('resize', baSync);
        if (baBefore.complete) { baSync(); } else { baBefore.addEventListener('load', baSync); }
        baSync(); baMove();
    }

    /* --- Modul: PLZ-Check (Beispiel-Einzugsgebiet) --- */
    var plzInput = document.getElementById('plz-input');
    var plzBtn   = document.getElementById('plz-check');
    var plzOut   = document.getElementById('plz-result');
    if (plzInput && plzBtn && plzOut) {
        var PLZ_REGIONS = {
            '70': 'Stuttgart', '71': 'Ludwigsburg & Rems-Murr', '72': 'Tübingen & Reutlingen',
            '73': 'Esslingen & Göppingen', '74': 'Heilbronn & Umgebung', '75': 'Pforzheim & Enzkreis',
            '68': 'Mannheim & Rhein-Neckar', '69': 'Heidelberg & Rhein-Neckar'
        };
        var plzCheck = function () {
            var v = plzInput.value.trim();
            if (!/^\d{5}$/.test(v)) {
                plzOut.textContent = 'Bitte eine gültige fünfstellige Postleitzahl eingeben.';
                return;
            }
            var region = PLZ_REGIONS[v.slice(0, 2)];
            if (region) {
                plzOut.innerHTML = '<strong class="text-[#0e2a47]">Ja!</strong> ' + region + ' liegt mitten in unserem Einzugsgebiet. Im echten Einsatz stünde hier jetzt: Anfahrt kostenlos, Termin oft innerhalb einer Woche.';
            } else {
                plzOut.textContent = 'Etwas außerhalb unseres Kerngebiets – im echten Einsatz würde dein Kunde hier ein ehrliches „Frag trotzdem an, wir prüfen das“ sehen.';
            }
        };
        plzBtn.addEventListener('click', plzCheck);
        plzInput.addEventListener('keydown', function (e) { if (e.key === 'Enter') { plzCheck(); } });
    }

    /* --- Modul: Terminanfrage --- */
    var terminDays = document.getElementById('termin-days');
    var terminSum  = document.getElementById('termin-summary');
    var terminCta  = document.getElementById('termin-cta');
    if (terminDays && terminSum && terminCta) {
        var terminState = { day: null, slot: null };
        var chipOn  = ['border-[#1f6fe0]', 'bg-[#1f6fe0]', 'text-white'];
        var chipOff = ['border-[#0e2a47]/15', 'bg-white'];
        var d = new Date();
        var added = 0;
        while (added < 5) {
            d.setDate(d.getDate() + 1);
            if (d.getDay() === 0 || d.getDay() === 6) { continue; }
            var label = d.toLocaleDateString('de-DE', { weekday: 'short', day: '2-digit', month: '2-digit' });
            var btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'termin-day rounded-md border border-[#0e2a47]/15 bg-white px-3.5 py-2 text-sm font-medium transition hover:border-[#1f6fe0]';
            btn.textContent = label;
            btn.dataset.day = label;
            terminDays.appendChild(btn);
            added++;
        }
        var terminUpdate = function () {
            if (terminState.day && terminState.slot) {
                terminSum.textContent = 'Terminwunsch: ' + terminState.day + ', ' + terminState.slot;
                terminCta.disabled = false;
            } else {
                terminSum.textContent = terminState.day || terminState.slot
                    ? 'Fast fertig – wähle noch ' + (terminState.day ? 'ein Zeitfenster.' : 'einen Tag.')
                    : 'Wähle Tag & Zeitfenster.';
                terminCta.disabled = true;
            }
        };
        var terminBind = function (selector, key, dataAttr) {
            var els = Array.prototype.slice.call(document.querySelectorAll(selector));
            els.forEach(function (el) {
                el.addEventListener('click', function () {
                    els.forEach(function (o) {
                        chipOn.forEach(function (c) { o.classList.remove(c); });
                        chipOff.forEach(function (c) { o.classList.add(c); });
                    });
                    chipOff.forEach(function (c) { el.classList.remove(c); });
                    chipOn.forEach(function (c) { el.classList.add(c); });
                    terminState[key] = el.dataset[dataAttr];
                    terminUpdate();
                });
            });
        };
        terminBind('.termin-day', 'day', 'day');
        terminBind('.termin-slot', 'slot', 'slot');
        terminUpdate();
        terminCta.addEventListener('click', function () {
            if (!terminState.day || !terminState.slot) { return; }
            var mf = document.querySelector('#anfrage textarea[name="message"]');
            if (mf) {
                mf.value = 'Terminwunsch aus der Demo: ' + terminState.day + ', ' + terminState.slot + '.\n'
                    + 'Ich interessiere mich für eine Webseite mit Terminanfrage-Modul für meine Kunden.';
            }
            var target = document.getElementById('anfrage');
            if (target) { target.scrollIntoView({ behavior: 'smooth' }); }
        });
    }

    /* --- Modul: Foto-Upload (rein clientseitig, nichts wird übertragen) --- */
    var fotoInput   = document.getElementById('foto-input');
    var fotoPreview = document.getElementById('foto-preview');
    var fotoThumb   = document.getElementById('foto-thumb');
    var fotoName    = document.getElementById('foto-name');
    var fotoZone    = document.getElementById('foto-zone');
    if (fotoInput && fotoPreview) {
        var fotoShow = function (file) {
            if (!file || file.type.indexOf('image/') !== 0) { return; }
            fotoThumb.src = URL.createObjectURL(file);
            fotoName.textContent = file.name + ' (' + Math.max(1, Math.round(file.size / 1024)) + ' KB)';
            fotoPreview.classList.remove('hidden');
            fotoPreview.classList.add('flex');
        };
        fotoInput.addEventListener('change', function () { fotoShow(fotoInput.files[0]); });
        fotoZone.addEventListener('dragover', function (e) { e.preventDefault(); fotoZone.classList.add('border-[#1f6fe0]'); });
        fotoZone.addEventListener('dragleave', function () { fotoZone.classList.remove('border-[#1f6fe0]'); });
        fotoZone.addEventListener('drop', function (e) {
            e.preventDefault();
            fotoZone.classList.remove('border-[#1f6fe0]');
            if (e.dataTransfer.files.length) { fotoShow(e.dataTransfer.files[0]); }
        });
    }

    /* --- Modul: Materialrechner --- */
    var MAT = {
        farbe: {
            label: 'Wandfläche', min: 5, max: 200, value: 40, step: 5,
            extraLabel: 'Anstriche', extras: [['1 Anstrich', 1], ['2 Anstriche', 2]],
            calc: function (qm, extra) {
                var liter = Math.ceil((qm * extra) / 8 * 2) / 2;
                var eimer = Math.ceil(liter / 10);
                return 'Du brauchst ca. <strong>' + liter.toLocaleString('de-DE') + ' Liter Farbe</strong> (' + eimer + '× 10-l-Eimer) für ' + qm + ' m² bei ' + extra + ' Anstrich' + (extra > 1 ? 'en' : '') + ' – Beispielwert bei 8 m²/l Ergiebigkeit.';
            }
        },
        fliesen: {
            label: 'Fläche', min: 2, max: 120, value: 25, step: 1,
            extraLabel: 'Verschnitt', extras: [['ca. 10 % (gerade Verlegung)', 1.1], ['ca. 15 % (diagonal)', 1.15]],
            calc: function (qm, extra) {
                var kauf = Math.ceil(qm * extra * 10) / 10;
                var pakete = Math.ceil(kauf / 1.44);
                return 'Kaufe ca. <strong>' + kauf.toLocaleString('de-DE') + ' m² Fliesen</strong> (' + pakete + ' Pakete à 1,44 m²) für ' + qm + ' m² Fläche inkl. Verschnitt – Beispielwerte.';
            }
        }
    };
    var matTabs   = Array.prototype.slice.call(document.querySelectorAll('.mat-tab'));
    var matRange  = document.getElementById('mat-range');
    var matRLabel = document.getElementById('mat-range-label');
    var matRValue = document.getElementById('mat-range-value');
    var matExtra  = document.getElementById('mat-extra');
    var matELabel = document.getElementById('mat-extra-label');
    var matResult = document.getElementById('mat-result');
    var matCurrent = 'farbe';
    if (matRange && matExtra && matResult) {
        var matRender = function () {
            var m = MAT[matCurrent];
            var qm = parseInt(matRange.value, 10);
            matRValue.textContent = qm + ' m²';
            matResult.innerHTML = m.calc(qm, parseFloat(matExtra.value));
        };
        var matSet = function (key) {
            var m = MAT[key];
            matCurrent = key;
            matRange.min = m.min; matRange.max = m.max; matRange.step = m.step; matRange.value = m.value;
            matRLabel.textContent = m.label;
            matELabel.textContent = m.extraLabel;
            matExtra.innerHTML = '';
            m.extras.forEach(function (o) {
                var opt = document.createElement('option');
                opt.value = o[1]; opt.textContent = o[0];
                matExtra.appendChild(opt);
            });
            matTabs.forEach(function (t) {
                var active = t.dataset.mat === key;
                t.setAttribute('aria-pressed', active ? 'true' : 'false');
                t.classList.toggle('bg-[#1f6fe0]', active);
                t.classList.toggle('border-[#1f6fe0]', active);
                t.classList.toggle('text-white', active);
                t.classList.toggle('bg-white', !active);
                t.classList.toggle('border-[#0e2a47]/15', !active);
                t.classList.toggle('text-[#0e2a47]', !active);
            });
            matRender();
        };
        matTabs.forEach(function (t) {
            t.addEventListener('click', function () { matSet(t.dataset.mat); });
        });
        matRange.addEventListener('input', matRender);
        matExtra.addEventListener('change', matRender);
        matSet('farbe');
    }

    /* --- Modul: Quiz --- */
    var quizBox      = document.getElementById('quiz-box');
    var quizProgress = document.getElementById('quiz-progress');
    var quizQuestion = document.getElementById('quiz-question');
    var quizOptions  = document.getElementById('quiz-options');
    var quizResult   = document.getElementById('quiz-result');
    var quizRec      = document.getElementById('quiz-rec');
    var quizWhy      = document.getElementById('quiz-why');
    if (quizBox && quizOptions) {
        var QUIZ = [
            { q: 'Hast du schon eine Webseite?', a: ['Ja, aber veraltet', 'Nein, noch keine', 'Ja, bringt aber keine Anfragen'] },
            { q: 'Was ist dein wichtigstes Ziel?', a: ['Mehr Anfragen aus der Region', 'Betrieb ausführlich präsentieren', 'Azubis & Mitarbeiter finden'] },
            { q: 'Wie viele Leistungen willst du zeigen?', a: ['Eine Kernleistung', 'Mehrere Leistungen im Detail'] }
        ];
        var quizStep = 0;
        var quizAnswers = [];
        var quizRenderQ = function () {
            var item = QUIZ[quizStep];
            quizProgress.textContent = 'Frage ' + (quizStep + 1) + ' von ' + QUIZ.length;
            quizQuestion.textContent = item.q;
            quizOptions.innerHTML = '';
            item.a.forEach(function (answer) {
                var btn = document.createElement('button');
                btn.type = 'button';
                btn.className = 'rounded-lg border border-white/20 bg-white/10 px-4 py-3 text-left text-sm font-medium text-white transition hover:border-[#7fb2f5] hover:bg-white/15';
                btn.textContent = answer;
                btn.addEventListener('click', function () {
                    quizAnswers.push(answer);
                    quizStep++;
                    if (quizStep < QUIZ.length) { quizRenderQ(); } else { quizFinish(); }
                });
                quizOptions.appendChild(btn);
            });
        };
        var quizFinish = function () {
            var business = quizAnswers[1] !== 'Mehr Anfragen aus der Region' || quizAnswers[2] === 'Mehrere Leistungen im Detail';
            quizRec.textContent = business ? 'Business-Website (ab 3.900 €)' : 'Landingpage (ab 1.490 €)';
            quizWhy.textContent = business
                ? 'Du willst mehr zeigen als eine Kernleistung – mit mehreren Seiten, eigener Karriere-Seite und CMS bist du richtig aufgestellt.'
                : 'Eine fokussierte Seite mit klarem Anfrage-Weg bringt dir am schnellsten neue Aufträge aus der Region.';
            quizBox.classList.add('hidden');
            quizResult.classList.remove('hidden');
        };
        var quizCta = document.getElementById('quiz-cta');
        if (quizCta) {
            quizCta.addEventListener('click', function () {
                var mf = document.querySelector('#anfrage textarea[name="message"]');
                if (mf) {
                    mf.value = 'Quiz-Ergebnis von eurer Handwerker-Seite:\n'
                        + '1. Webseite vorhanden: ' + quizAnswers[0] + '\n'
                        + '2. Ziel: ' + quizAnswers[1] + '\n'
                        + '3. Umfang: ' + quizAnswers[2] + '\n'
                        + 'Empfehlung: ' + quizRec.textContent + ' – bitte um ein kostenloses Erstgespräch.';
                }
                var target = document.getElementById('anfrage');
                if (target) { target.scrollIntoView({ behavior: 'smooth' }); }
            });
        }
        var quizRestart = document.getElementById('quiz-restart');
        if (quizRestart) {
            quizRestart.addEventListener('click', function () {
                quizStep = 0;
                quizAnswers = [];
                quizResult.classList.add('hidden');
                quizBox.classList.remove('hidden');
                quizRenderQ();
            });
        }
        quizRenderQ();
    }

    /* --- Gewerk-Chips: Klick übernimmt das Gewerk ins Formular --- */
    var chips = Array.prototype.slice.call(document.querySelectorAll('.gewerk-chip'));
    var hint  = document.getElementById('gewerk-chip-hint');
    chips.forEach(function (chip) {
        chip.addEventListener('click', function () {
            chips.forEach(function (c) {
                c.classList.remove('border-[#1f6fe0]', 'bg-[#1f6fe0]', 'text-white');
                c.classList.add('bg-white', 'text-[#0e2a47]');
            });
            chip.classList.remove('bg-white', 'text-[#0e2a47]');
            chip.classList.add('border-[#1f6fe0]', 'bg-[#1f6fe0]', 'text-white');
            if (gewerkField) { gewerkField.value = chip.dataset.gewerk; }
            if (hint) { hint.textContent = '„' + chip.dataset.gewerk + '“ ist im Anfrageformular eingetragen.'; }
        });
    });

    /* --- Scroll-Reveals (gestaffelt), Ergebnis-Pop, Navi-Schatten --- */
    var hwReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!hwReduced && 'IntersectionObserver' in window) {
        var hwSelectors = [
            '#main section h2',
            '#main section h2 + p',
            '#main .font-mono.uppercase',
            '#main article',
            '#main figure',
            '#main aside',
            '#main details',
            '#main dl > div',
            '#main ol > li',
            '#main section .divide-y > div',
            '#main form > *'
        ];
        var hwGroups = new Map();
        var hwTargets = [];
        var hwHero = document.querySelector('#main > section');
        hwSelectors.forEach(function (sel) {
            Array.prototype.slice.call(document.querySelectorAll(sel)).forEach(function (el) {
                if (el.classList.contains('hw-reveal')) { return; }
                if (hwHero && hwHero.contains(el)) { return; }
                var parent = el.parentElement;
                var idx = hwGroups.get(parent) || 0;
                hwGroups.set(parent, idx + 1);
                el.classList.add('hw-reveal');
                el.style.setProperty('--hw-delay', Math.min(idx * 85, 480) + 'ms');
                hwTargets.push(el);
            });
        });
        var hwIO = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('hw-in');
                    hwIO.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -7% 0px' });
        hwTargets.forEach(function (el) { hwIO.observe(el); });

        /* Sicherung: Falls der Observer nicht feuert (alte Browser, Reader-Modi),
           wird nach kurzer Zeit alles eingeblendet. */
        window.setTimeout(function () {
            if (!document.querySelector('.hw-reveal.hw-in')) {
                hwTargets.forEach(function (el) { el.classList.add('hw-in'); });
            }
        }, 1500);

        /* Manueller Fallback: prueft Positionen selbst, falls der Observer stumm bleibt */
        var hwPending = hwTargets.slice();
        var hwTimer = null;
        var hwManual = function () {
            var vh = window.innerHeight;
            for (var k = hwPending.length - 1; k >= 0; k--) {
                var rect = hwPending[k].getBoundingClientRect();
                if (rect.top < vh * 0.93 && rect.bottom > 0) {
                    hwPending[k].classList.add('hw-in');
                    hwPending.splice(k, 1);
                }
            }
            if (!hwPending.length && hwTimer) { window.clearInterval(hwTimer); hwTimer = null; }
        };
        hwTimer = window.setInterval(hwManual, 700);
        window.addEventListener('scroll', hwManual, { passive: true });
    }

    /* Ergebnis-Werte kurz aufpoppen lassen, wenn sie sich ändern */
    if (!hwReduced && 'MutationObserver' in window) {
        ['demo-result', 'mat-result', 'plz-result', 'quiz-rec'].forEach(function (id) {
            var el = document.getElementById(id);
            if (!el) { return; }
            new MutationObserver(function () {
                el.classList.remove('hw-pop');
                void el.offsetWidth;
                el.classList.add('hw-pop');
            }).observe(el, { childList: true, characterData: true, subtree: true });
        });
    }

    /* Navi bekommt beim Scrollen einen Schatten */
    var hwNav = document.querySelector('body > header.sticky');
    if (hwNav) {
        var hwNavScroll = function () {
            hwNav.classList.toggle('hw-nav-scrolled', window.scrollY > 10);
        };
        window.addEventListener('scroll', hwNavScroll, { passive: true });
        hwNavScroll();
    }

})();
</script>

<?php
/* FAQPage Schema aus denselben Daten wie die sichtbare FAQ-Sektion */
$faq_schema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => array_map(static function ($faq) {
        return [
            '@type'          => 'Question',
            'name'           => $faq['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
        ];
    }, $faqs),
];
echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";

get_footer();
