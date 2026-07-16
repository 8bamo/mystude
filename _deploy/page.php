<?php get_header(); ?>

<main id="main" class="pt-[84px]">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php if (is_page('events')): ?>
    <?php
    $festival_months = [
        [
            'label'  => 'Juni',
            'accent' => 'microphone',
            'events' => [
                ['date' => '12.-13. Juni', 'title' => 'About Pop'],
                ['date' => '20. Juni', 'title' => 'Rue de la Musique'],
                ['date' => '26.-27. Juni', 'title' => 'Kesselfestival'],
                ['date' => '28. Juni', 'title' => 'Heusteigsommer'],
                ['date' => '28. Juni', 'title' => 'Stuttgarter Kinderfest'],
            ],
        ],
        [
            'label'  => 'Juli',
            'accent' => 'fireworks',
            'events' => [
                ['date' => '1.-12. Juli', 'title' => 'Jazz Open'],
                ['date' => '9.-12. Juli', 'title' => 'Feuerseefest'],
                ['date' => '10.-12. Juli', 'title' => 'Afrika Festival'],
                ['date' => '11. Juli', 'title' => 'Lichterfest'],
                ['date' => '14.-19. Juli', 'title' => 'Sommerfestival der Kulturen'],
            ],
        ],
        [
            'label'  => 'Ende Juli & August',
            'accent' => 'wave',
            'events' => [
                ['date' => '22.-25. Juli', 'title' => 'Henkersfest'],
                ['date' => '23.-25. Juli', 'title' => 'Bohnenviertelfest'],
                ['date' => '25.+26. Juli', 'title' => 'CSD'],
                ['date' => '30. Juli - 2. August', 'title' => 'Marienplatzfest'],
                ['date' => '1.-2. August', 'title' => 'Draufsicht Festival'],
                ['date' => '1.-2. August', 'title' => 'Stuttgart am Meer'],
            ],
        ],
    ];

    $upcoming_events = [];
    if (post_type_exists('tribe_events')) {
        $events_query = new WP_Query([
            'post_type'      => 'tribe_events',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'meta_key'       => '_EventStartDate',
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_query'     => [[
                'key'     => '_EventStartDate',
                'value'   => current_time('Y-m-d H:i:s'),
                'compare' => '>=',
                'type'    => 'DATETIME',
            ]],
        ]);

        if ($events_query->have_posts()) {
            while ($events_query->have_posts()) {
                $events_query->the_post();
                $upcoming_events[] = [
                    'title' => get_the_title(),
                    'url'   => get_permalink(),
                    'date'  => function_exists('tribe_get_start_date') ? tribe_get_start_date(null, false, 'D, d. M') : get_the_date('D, d. M'),
                    'meta'  => function_exists('tribe_get_venue') ? tribe_get_venue() : 'Stuttgart',
                ];
            }
            wp_reset_postdata();
        }
    }
    ?>

    <section class="events-summer-shell overflow-hidden py-8 sm:py-10">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <div class="events-summer-hero">
                <div class="events-summer-copy">
                    <p class="events-summer-kicker">Stuttgart Eventkalender</p>
                    <h1 class="events-summer-title"><?php the_title(); ?></h1>
                    <p class="events-summer-lead">Die wichtigsten Sommertermine aus Stuttgart, sortiert nach Monaten und schnell scannbar für die nächste Planung.</p>
                </div>

                <div class="events-summer-grid">
                    <?php foreach ($festival_months as $month): ?>
                        <article class="events-poster-card">
                            <div class="events-poster-card__label"><?php echo esc_html($month['label']); ?></div>
                            <div class="events-poster-card__list">
                                <?php foreach ($month['events'] as $festival): ?>
                                    <div class="events-poster-item">
                                        <span class="events-poster-item__date"><?php echo esc_html($festival['date']); ?></span>
                                        <span class="events-poster-item__title"><?php echo esc_html($festival['title']); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ($upcoming_events): ?>
    <section class="py-8 sm:py-10">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <div class="mb-8 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Live aus WordPress</span>
                    <h2 class="mt-3 font-display text-4xl leading-[0.96] text-ink sm:text-5xl">Kommende Events</h2>
                </div>
                <p class="max-w-2xl text-base leading-8 text-muted">Diese Termine kommen direkt aus dem Event-System und können parallel zum Festival-Poster gepflegt werden.</p>
            </div>
            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($upcoming_events as $event): ?>
                    <a href="<?php echo esc_url($event['url']); ?>" class="glass-card rounded-[28px] p-6 transition hover:-translate-y-1 hover:shadow-strong">
                        <span class="font-sans text-[0.72rem] font-bold uppercase tracking-[0.16em] text-coral"><?php echo esc_html($event['date']); ?></span>
                        <h3 class="mt-4 font-display text-[1.85rem] leading-[0.98] text-ink"><?php echo esc_html($event['title']); ?></h3>
                        <p class="mt-4 text-sm leading-7 text-muted"><?php echo esc_html($event['meta']); ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="pb-16 pt-6">
        <div class="mx-auto w-full max-w-5xl px-5 sm:px-8">
            <div class="prose-content rounded-[28px] bg-white/70 p-8 shadow-soft sm:p-12">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php else: ?>

    <section class="border-b border-black/10 bg-white/60 py-16">
        <div class="mx-auto w-full max-w-5xl px-5 sm:px-8">
            <h1 class="font-display text-5xl leading-tight text-ink sm:text-6xl"><?php the_title(); ?></h1>
        </div>
    </section>

    <section class="py-16">
        <div class="mx-auto w-full max-w-5xl px-5 sm:px-8">
            <div class="prose-content rounded-[28px] bg-white/70 p-8 shadow-soft sm:p-12">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
