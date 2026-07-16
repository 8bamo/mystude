<?php
/*
 * Template Name: Collab & Partner
 */
get_header(); ?>

<main id="main" class="pt-[84px]">
    <?php
    $current_partners = [
        [
            'name'   => 'jakobsweg',
            'handle' => '@jakobsweg26',
            'role'   => 'Content Creator',
            'url'    => 'https://www.instagram.com/jakobsweg26/',
            'image'  => 'https://scontent-fra3-1.cdninstagram.com/v/t51.75761-15/500982862_18117937381467525_1965899638156064244_n.jpg?stp=dst-jpegr_e35_tt6&_nc_cat=105&ig_cache_key=MzY0MDI3OTEyMjU2NDM0NDgwNw%3D%3D.3-ccb7-5&ccb=7-5&_nc_sid=58cdad&efg=eyJ2ZW5jb2RlX3RhZyI6InhwaWRzLjE0NDB4MTgwMC5oZHIuQzMifQ%3D%3D&_nc_ohc=0FyrDKDsHW8Q7kNvwHBn8wK&_nc_oc=Adrx2zK1ubt9UzY7GVYrGaCtGFAl6_u3HdeNyVBj6cEeQFzA8Z5fkNThj4208ju7mJk&_nc_ad=z-m&_nc_cid=0&_nc_zt=23&_nc_ht=scontent-fra3-1.cdninstagram.com&_nc_gid=vJ8i46Y8YUNWqaQ3TYuU8Q&_nc_ss=7a22e&oh=00_Af549ISGRt-HKOs0ypTP9ozUNaHKX5PXnUyGa-jpc3fqGQ&oe=69FBD1F7',
        ],
        [
            'name'   => 'Leonie',
            'handle' => '@leonie.mausiiii',
            'role'   => 'Content Creator',
            'url'    => 'https://www.instagram.com/leonie.mausiiii/',
            'image'  => 'https://media-dus1-1.cdn.whatsapp.net/v/t61.24694-24/664770062_1691542275345388_3375331456320817263_n.jpg?ccb=11-4&oh=01_Q5Aa4QEWkir3nfJzHV_ZhamaMTWdYy1AkngCsK5Jb0PiLObltw&oe=6A02FF2A&_nc_sid=5e03e0&_nc_cat=111',
        ],
        [
            'name'   => 'Nosa',
            'handle' => '@nosa.oj',
            'role'   => 'Content Creator',
            'url'    => 'https://www.instagram.com/nosa.oj/',
            'image'  => 'https://p16-common-sign.tiktokcdn-eu.com/tos-useast2a-avt-0068-euttp/67300fc8cf80f8b8e8bb405ea5c70ce1~tplv-tiktokx-cropcenter:1080:1080.jpeg?dr=10399&refresh_token=e50f2318&x-expires=1777899600&x-signature=JNtfRzvXE21RQjK0Ik2Q3Y83UGQ%3D&t=4d5b0474&ps=13740610&shp=a5d48078&shcp=81f88b70&idc=no1a',
        ],
        [
            'name'   => 'Vertikalpass',
            'handle' => '@vertikal.pass',
            'role'   => 'Magazin',
            'url'    => 'https://www.instagram.com/vertikal.pass/',
            'image'  => 'https://vertikalpass.de/wp-content/uploads/2014/09/cropped-vp2.jpg',
            'image_fit' => 'contain',
        ],
        [
            'name'   => 'vfbecherpfand',
            'handle' => '@vfbecherpfand',
            'role'   => 'Soziale Organisation',
            'url'    => 'https://www.instagram.com/vfbecherpfand/',
            'image'  => MYSTU_URI . '/assets/img/partners/vfb-becherpfand.jpg',
            'image_fit' => 'contain',
        ],
        [
            'name'   => 'Felix AFM',
            'handle' => '@felix.afm',
            'role'   => 'Content Creator',
            'url'    => 'https://www.instagram.com/felix.afm/',
            'image'  => MYSTU_URI . '/assets/img/partners/felix-afm.jpg',
            'image_fit' => 'contain',
        ],
    ];
    ?>

    <section class="border-b border-black/10 bg-white/60 py-16 text-center">
        <div class="mx-auto w-full max-w-5xl px-5 sm:px-8">
            <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Kooperationen & Anfragen</span>
            <h1 class="mt-4 font-display text-5xl text-ink sm:text-6xl">Mit Stuttgart arbeiten.</h1>
            <p class="mx-auto mt-5 max-w-3xl text-base leading-8 text-muted">mystu.de ist das Content-Portal für Stuttgart. Wir verbinden Stadtkultur, Produkte und echte Geschichten. Wenn du Stuttgart liebst und Reichweite mitbringst, lass uns reden.</p>
        </div>
    </section>

    <section class="border-b border-black/10 bg-white/40 py-16">
        <div class="mx-auto grid w-full max-w-7xl gap-4 px-5 sm:px-8 md:grid-cols-3">
            <div class="rounded-[24px] border border-black/10 bg-white/80 p-6 text-center shadow-soft"><span class="block text-4xl font-extrabold text-coral">100%</span><span class="mt-3 block text-sm leading-7 text-muted">Stuttgart-Fokus, kein generischer Content</span></div>
            <div class="rounded-[24px] border border-black/10 bg-white/80 p-6 text-center shadow-soft"><span class="block text-4xl font-extrabold text-coral">2</span><span class="mt-3 block text-sm leading-7 text-muted">starke Kategorien: Geschenke und Kultur</span></div>
            <div class="rounded-[24px] border border-black/10 bg-white/80 p-6 text-center shadow-soft"><span class="block text-4xl font-extrabold text-coral">48h</span><span class="mt-3 block text-sm leading-7 text-muted">Rückmeldung auf jede Anfrage</span></div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Aktuelle Partner</span>
                    <h2 class="mt-4 font-display text-4xl text-ink sm:text-5xl">Menschen, mit denen wir gerade arbeiten.</h2>
                </div>
                <p class="max-w-2xl text-base leading-8 text-muted">Unsere aktuellen Collabs und Creator-Partnerschaften. Direkt zu Instagram, direkt zu den Leuten hinter den Projekten.</p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <?php foreach ($current_partners as $partner): ?>
                    <a href="<?php echo esc_url($partner['url']); ?>" target="_blank" rel="noopener" class="group glass-card rounded-[28px] p-6 transition hover:-translate-y-1 hover:shadow-strong">
                        <?php if (!empty($partner['image'])): ?>
                            <?php $image_class = (($partner['image_fit'] ?? 'cover') === 'contain') ? 'object-contain bg-white p-5' : 'object-cover'; ?>
                            <img src="<?php echo esc_url($partner['image']); ?>" alt="<?php echo esc_attr($partner['name']); ?>" class="aspect-[4/5] w-full rounded-[22px] shadow-soft <?php echo esc_attr($image_class); ?>" loading="lazy">
                        <?php else: ?>
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-coral text-lg font-extrabold text-white">
                                <?php echo esc_html(substr($partner['name'], 0, 1)); ?>
                            </span>
                        <?php endif; ?>
                        <h3 class="mt-6 font-display text-3xl leading-[1] text-ink"><?php echo esc_html($partner['name']); ?></h3>
                        <p class="mt-3 font-sans text-[0.72rem] font-bold uppercase tracking-[0.16em] text-muted"><?php echo esc_html($partner['role']); ?></p>
                        <p class="mt-3 font-sans text-sm font-bold text-coral"><?php echo esc_html($partner['handle']); ?></p>
                        <span class="mt-6 inline-flex text-sm font-bold text-muted transition group-hover:text-coral">Auf Instagram ansehen →</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-20">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <div class="grid gap-4 lg:grid-cols-2">
                <article class="rounded-[28px] border border-black/10 bg-white/80 p-8 shadow-soft">
                    <div class="text-2xl text-coral">✦</div>
                    <h2 class="mt-6 font-display text-3xl text-ink">Creators & Influencer</h2>
                    <p class="mt-4 text-base leading-8 text-muted">Du hast eine Community, die Stuttgart kennt und liebt? Wir suchen Creator für echte Kooperationen mit Substanz.</p>
                    <ul class="mt-6 space-y-3 text-sm leading-7 text-muted">
                        <li>Gesponserte Artikel & redaktionelle Platzierungen</li>
                        <li>Affiliate-Links zu mystu.shop mit fairer Provision</li>
                        <li>Co-Created Content für Social Media</li>
                        <li>Produktkooperationen, Giveaways & Kollektionen</li>
                    </ul>
                    <a href="#collab-form" class="mt-8 inline-flex min-h-[3rem] items-center justify-center rounded-full bg-gradient-to-r from-coral to-[#ff9966] px-5 py-3 text-sm font-bold text-white shadow-soft transition hover:-translate-y-0.5">Kooperation anfragen</a>
                </article>
                <article class="rounded-[28px] border border-black/10 bg-white/80 p-8 shadow-soft">
                    <div class="text-2xl text-coral">◈</div>
                    <h2 class="mt-6 font-display text-3xl text-ink">Presse & Medien</h2>
                    <p class="mt-4 text-base leading-8 text-muted">mystu ist eine junge Stuttgarter Marke. Journalisten und Redaktionen sind bei uns willkommen.</p>
                    <ul class="mt-6 space-y-3 text-sm leading-7 text-muted">
                        <li>Interviews und Statements zu Stuttgart & E-Commerce</li>
                        <li>Hintergrundgespräche zur Marke mystu und mystu.shop</li>
                        <li>Bildmaterial, Logos und Presseinformationen auf Anfrage</li>
                        <li>Schnelle Rückmeldung innerhalb von 48 Stunden</li>
                    </ul>
                    <a href="#collab-form" class="mt-8 inline-flex min-h-[3rem] items-center justify-center rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-bold text-ink shadow-soft transition hover:-translate-y-0.5 hover:text-coral">Presseanfrage stellen</a>
                </article>
            </div>
        </div>
    </section>

    <section class="border-y border-black/10 bg-white/40 py-20">
        <div class="mx-auto grid w-full max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[1fr_auto] lg:items-start">
            <div>
                <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Warum mystu.de</span>
                <h2 class="mt-4 font-display text-4xl text-ink sm:text-5xl">Stuttgart verdient mehr als Standard.</h2>
                <p class="mt-5 max-w-3xl text-base leading-8 text-muted">Die meisten lokalen Webseiten sind austauschbar. mystu.de nicht. Wir schreiben Guides, die wirklich weiterhelfen und verbinden Content mit einer starken Marke.</p>
                <p class="mt-4 max-w-3xl text-base leading-8 text-muted">Wenn du mit uns arbeitest, erreichst du eine Zielgruppe, die Stuttgart nicht nur kennt, sondern lebt.</p>
            </div>
            <div class="grid gap-6 lg:text-right">
                <div><span class="block text-5xl font-extrabold text-coral">0711</span><span class="mt-2 block text-sm uppercase tracking-[0.14em] text-muted">Stuttgarts Vorwahl, unsere DNA</span></div>
                <div><span class="block text-5xl font-extrabold text-coral">∞</span><span class="mt-2 block text-sm uppercase tracking-[0.14em] text-muted">Themen rund um Stuttgart</span></div>
            </div>
        </div>
    </section>

    <section class="py-20" id="collab-form">
        <div class="mx-auto w-full max-w-4xl px-5 text-center sm:px-8">
            <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Kontakt</span>
            <h2 class="mt-4 font-display text-4xl text-ink sm:text-5xl">Schreib uns.</h2>
            <p class="mx-auto mt-4 max-w-2xl text-base leading-8 text-muted">Kein Kontaktformular-Friedhof. Wir lesen jede Nachricht und antworten.</p>
            <div class="mt-10 rounded-[28px] border border-black/10 bg-white/80 p-8 shadow-soft sm:p-10">
                <?php if (isset($_GET['collab_sent']) && $_GET['collab_sent'] === '1'): ?>
                    <p class="mb-6 rounded-2xl bg-white px-5 py-4 text-left text-sm font-bold text-coral">Danke, deine Collab-Anfrage ist angekommen.</p>
                <?php elseif (isset($_GET['collab_error']) && $_GET['collab_error'] === '1'): ?>
                    <p class="mb-6 rounded-2xl bg-white px-5 py-4 text-left text-sm font-bold text-coral">Bitte fülle Name, E-Mail und Nachricht aus.</p>
                <?php endif; ?>

                <form class="space-y-5 text-left" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <input type="hidden" name="action" value="mystu_collab_request">
                    <?php wp_nonce_field('mystu_collab_request', 'mystu_collab_nonce'); ?>
                    <div class="grid gap-5 md:grid-cols-2">
                        <input type="text" name="name" required autocomplete="name" placeholder="Dein Name" class="w-full rounded-2xl border-black/10 bg-white px-4 py-3">
                        <input type="email" name="email" required autocomplete="email" placeholder="deine@mail.de" class="w-full rounded-2xl border-black/10 bg-white px-4 py-3">
                    </div>
                    <input type="text" name="instagram" autocomplete="url" placeholder="Instagram oder Website" class="w-full rounded-2xl border-black/10 bg-white px-4 py-3">
                    <select name="type" required class="w-full rounded-2xl border-black/10 bg-white px-4 py-3">
                        <option value="">Art der Anfrage wählen …</option>
                        <option value="influencer">Creator / Influencer-Kooperation</option>
                        <option value="affiliate">Affiliate-Partnerschaft</option>
                        <option value="press">Presseanfrage / Interview</option>
                        <option value="collab">Sonstige Kooperation</option>
                    </select>
                    <textarea name="message" rows="6" required placeholder="Wer bist du und was schwebt dir vor?" class="w-full rounded-2xl border-black/10 bg-white px-4 py-3"></textarea>
                    <button type="submit" class="inline-flex min-h-[3rem] items-center justify-center rounded-full bg-gradient-to-r from-coral to-[#ff9966] px-5 py-3 text-sm font-bold text-white shadow-soft transition hover:-translate-y-0.5">Anfrage senden</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
