<?php
/*
 * Template Name: Preise & Betreuung
 */
get_header();

$contact_url = 'mailto:hi@mystu.de?subject=' . rawurlencode('Projektanfrage Website & Shop');
$packages = [
    [
        'eyebrow' => 'Für Selbstständige',
        'name' => 'Landingpage',
        'setup' => 'ab 1.490 €',
        'monthly' => '149 €',
        'intro' => 'Eine fokussierte Seite, die erklärt, überzeugt und Anfragen sammelt.',
        'features' => ['Individuelles One-Page-Design', 'Kontaktformular & klare CTAs', 'Mobil optimiert', 'Hosting, Updates & Monitoring', 'Bis zu 30 Min. Änderungen / Monat'],
        'tone' => 'bg-white/75',
    ],
    [
        'eyebrow' => 'Für wachsende Teams',
        'name' => 'Business Website',
        'setup' => 'ab 3.900 €',
        'monthly' => '349 €',
        'intro' => 'Für Unternehmen, die mehr erzählen, gefunden werden und regelmäßig weiterentwickeln wollen.',
        'features' => ['Bis zu 7 individuelle Seiten', 'CMS für Inhalte & Referenzen', 'SEO-Grundsetup & Analytics', 'Cookie- & Formular-Setup', 'Bis zu 2 Std. Betreuung / Monat'],
        'tone' => 'bg-[#fff1e8]',
        'popular' => true,
    ],
    [
        'eyebrow' => 'Für Marken mit Produkten',
        'name' => 'Shop',
        'setup' => 'ab 6.900 €',
        'monthly' => '599 €',
        'intro' => 'Ein Shop, der nicht wie ein Baukasten aussieht und im Alltag mit deinem Sortiment Schritt hält.',
        'features' => ['Shopify oder WooCommerce Setup', 'Produkt-, Zahlungs- & Versandlogik', 'Bis zu 20 Produkte zum Start', 'E-Mail- & Conversion-Basis', 'Bis zu 4 Std. Betreuung / Monat'],
        'tone' => 'bg-[#e8f6f2]',
    ],
    [
        'eyebrow' => 'Für komplexe Vorhaben',
        'name' => 'Individuell',
        'setup' => 'auf Anfrage',
        'monthly' => 'ab 990 €',
        'intro' => 'Logins, Portale, Schnittstellen oder mehrere Teams: Wir planen das System mit dir statt es in ein Paket zu pressen.',
        'features' => ['Kundenbereiche & Login', 'Individuelle Funktionen & Integrationen', 'Mehrsprachigkeit & Rollen', 'Priorisierter Support', 'Betreuung nach Service-Level'],
        'tone' => 'bg-ink text-white',
        'dark' => true,
    ],
];
?>

<main id="main" class="overflow-hidden pt-[84px]">
    <section class="relative overflow-hidden border-b border-black/10 bg-[radial-gradient(circle_at_10%_0%,rgba(255,179,144,0.34),transparent_29%),radial-gradient(circle_at_95%_45%,rgba(85,201,187,0.22),transparent_28%),#fffaf2] py-20 sm:py-28">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[1.1fr_0.7fr] lg:items-end">
            <div>
                <span class="font-sans text-xs font-bold uppercase tracking-[0.2em] text-coral">Websites, Shops & Betreuung</span>
                <h1 class="mt-5 max-w-4xl font-display text-[clamp(3.4rem,7vw,6.8rem)] leading-[0.84] tracking-[-0.04em] text-ink">Dein digitaler Auftritt. Monatlich mitgedacht.</h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-muted">Du kaufst nicht nur eine Website. Du bekommst einen Auftritt, der gepflegt wird, mit deinem Geschäft wachsen kann und einen Ansprechpartner behält.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#pakete" class="inline-flex min-h-[3.2rem] items-center justify-center rounded-full bg-ink px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:-translate-y-0.5">Preise ansehen</a>
                    <a href="<?php echo esc_url($contact_url); ?>" class="inline-flex min-h-[3.2rem] items-center justify-center rounded-full border border-black/10 bg-white/70 px-6 py-3 text-sm font-bold text-ink shadow-soft transition hover:-translate-y-0.5 hover:text-coral">Projekt besprechen</a>
                </div>
            </div>
            <aside class="rounded-[30px] border border-white/60 bg-white/60 p-6 shadow-soft backdrop-blur-[18px] sm:p-8">
                <span class="font-sans text-[0.68rem] font-bold uppercase tracking-[0.16em] text-coral">So setzt sich dein Budget zusammen</span>
                <dl class="mt-6 space-y-5">
                    <div class="border-b border-black/10 pb-5"><dt class="font-display text-2xl text-ink">Einmaliger Aufbau</dt><dd class="mt-2 text-sm leading-7 text-muted">Strategie, Design, Entwicklung und der saubere Launch.</dd></div>
                    <div><dt class="font-display text-2xl text-ink">Monatliche Betreuung</dt><dd class="mt-2 text-sm leading-7 text-muted">Hosting, Updates, Sicherheit und das vereinbarte Kontingent für echte Weiterentwicklung.</dd></div>
                </dl>
            </aside>
        </div>
    </section>

    <section id="pakete" class="py-20 sm:py-24">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div><span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Vier sinnvolle Stufen</span><h2 class="mt-4 font-display text-4xl leading-[0.94] text-ink sm:text-5xl">Mehr Vorhaben. Mehr Service.</h2></div>
                <p class="max-w-xl text-base leading-8 text-muted">Alle Preise sind Netto-„ab“-Preise. Der konkrete Umfang wird vor dem Start klar festgelegt – ohne Überraschungen.</p>
            </div>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($packages as $package): ?>
                    <article class="relative flex min-h-full flex-col overflow-hidden rounded-[30px] border border-black/10 p-6 shadow-soft sm:p-7 <?php echo esc_attr($package['tone']); ?>">
                        <?php if (!empty($package['popular'])): ?><span class="absolute right-5 top-5 rounded-full bg-coral px-3 py-2 font-sans text-[0.62rem] font-bold uppercase tracking-[0.14em] text-white">Beliebt</span><?php endif; ?>
                        <span class="font-sans text-[0.68rem] font-bold uppercase tracking-[0.16em] <?php echo !empty($package['dark']) ? 'text-honey' : 'text-coral'; ?>"><?php echo esc_html($package['eyebrow']); ?></span>
                        <h3 class="mt-4 font-display text-4xl leading-[0.92] <?php echo !empty($package['dark']) ? 'text-white' : 'text-ink'; ?>"><?php echo esc_html($package['name']); ?></h3>
                        <p class="mt-4 text-sm leading-7 <?php echo !empty($package['dark']) ? 'text-white/72' : 'text-muted'; ?>"><?php echo esc_html($package['intro']); ?></p>
                        <div class="mt-7 border-y py-5 <?php echo !empty($package['dark']) ? 'border-white/15' : 'border-black/10'; ?>">
                            <span class="block font-sans text-[0.66rem] font-bold uppercase tracking-[0.14em] <?php echo !empty($package['dark']) ? 'text-white/55' : 'text-ink/50'; ?>">Einmaliger Aufbau</span>
                            <strong class="mt-2 block text-2xl font-extrabold <?php echo !empty($package['dark']) ? 'text-white' : 'text-ink'; ?>"><?php echo esc_html($package['setup']); ?></strong>
                            <span class="mt-5 block font-sans text-[0.66rem] font-bold uppercase tracking-[0.14em] <?php echo !empty($package['dark']) ? 'text-white/55' : 'text-ink/50'; ?>">laufende Betreuung</span>
                            <strong class="mt-2 block text-3xl font-extrabold <?php echo !empty($package['dark']) ? 'text-honey' : 'text-coral'; ?>"><?php echo esc_html($package['monthly']); ?><small class="text-sm font-semibold <?php echo !empty($package['dark']) ? 'text-white/70' : 'text-muted'; ?>"> / Monat</small></strong>
                        </div>
                        <ul class="mt-6 space-y-3 text-sm leading-6 <?php echo !empty($package['dark']) ? 'text-white/78' : 'text-muted'; ?>">
                            <?php foreach ($package['features'] as $feature): ?><li class="flex gap-3"><span class="font-bold <?php echo !empty($package['dark']) ? 'text-honey' : 'text-coral'; ?>">✓</span><span><?php echo esc_html($feature); ?></span></li><?php endforeach; ?>
                        </ul>
                        <a href="<?php echo esc_url($contact_url); ?>" class="mt-8 inline-flex min-h-[3rem] items-center justify-center rounded-full px-5 py-3 text-sm font-bold transition hover:-translate-y-0.5 <?php echo !empty($package['dark']) ? 'bg-white text-ink hover:bg-honey' : 'border border-black/10 bg-white/75 text-ink hover:text-coral'; ?>"><?php echo $package['name'] === 'Individuell' ? 'Vorhaben besprechen' : 'Paket anfragen'; ?> →</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="border-y border-black/10 bg-white/45 py-20">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[0.75fr_1.25fr]">
            <div><span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Was Betreuung praktisch bedeutet</span><h2 class="mt-4 font-display text-4xl leading-[0.94] text-ink sm:text-5xl">Kein Launch und dann Funkstille.</h2></div>
            <div class="grid gap-4 sm:grid-cols-3">
                <article class="glass-card rounded-[26px] p-6"><span class="text-2xl text-coral">01</span><h3 class="mt-5 font-display text-2xl text-ink">Sicher & aktuell</h3><p class="mt-3 text-sm leading-7 text-muted">Technik, Backups und Sicherheitsupdates werden nicht zum offenen To-do.</p></article>
                <article class="glass-card rounded-[26px] p-6"><span class="text-2xl text-coral">02</span><h3 class="mt-5 font-display text-2xl text-ink">Inhaltlich lebendig</h3><p class="mt-3 text-sm leading-7 text-muted">Neue Angebote, Aktionen oder Seiten sind im monatlichen Service eingeplant.</p></article>
                <article class="glass-card rounded-[26px] p-6"><span class="text-2xl text-coral">03</span><h3 class="mt-5 font-display text-2xl text-ink">Mitwachsend</h3><p class="mt-3 text-sm leading-7 text-muted">Wenn aus der Landingpage ein Shop wird, bauen wir auf einem sauberen Fundament weiter.</p></article>
            </div>
        </div>
    </section>

    <section class="py-20 sm:py-24">
        <div class="mx-auto w-full max-w-5xl px-5 text-center sm:px-8">
            <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Dein nächster Schritt</span>
            <h2 class="mx-auto mt-4 max-w-3xl font-display text-4xl leading-[0.94] text-ink sm:text-5xl">Erzähl uns, was dein Geschäft online können soll.</h2>
            <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-muted">Wir sagen dir offen, welches Paket sinnvoll ist – oder warum dein Vorhaben ein individuelles Angebot braucht.</p>
            <a href="<?php echo esc_url($contact_url); ?>" class="mt-8 inline-flex min-h-[3.2rem] items-center justify-center rounded-full bg-ink px-6 py-3 text-sm font-bold text-white shadow-soft transition hover:-translate-y-0.5">Projekt anfragen →</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
