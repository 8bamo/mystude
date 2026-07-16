<?php get_header(); ?>

<main id="main" class="pt-[84px]">
    <?php
    $term        = get_queried_object();
    $cat_slug    = $term->slug ?? '';
    $cat_color   = mystu_category_color($cat_slug);
    $description = category_description();
    ?>

    <?php if ($cat_slug === 'geschenkguides'): ?>
        <?php get_template_part('template-parts/gifts-landing'); ?>
    <?php else: ?>
        <section class="border-b border-black/10 bg-white/60 py-16" style="--cat-color: <?php echo esc_attr($cat_color); ?>;">
            <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
                <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Kategorie</span>
                <h1 class="mt-4 font-display text-5xl text-ink sm:text-6xl"><?php single_cat_title(); ?></h1>
                <?php if ($description): ?>
                    <p class="mt-5 max-w-3xl text-base leading-8 text-muted"><?php echo wp_kses_post($description); ?></p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="<?php echo $cat_slug === 'geschenkguides' ? 'border-t border-black/15 py-20' : 'py-16'; ?>">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <?php if ($cat_slug === 'geschenkguides'): ?>
                <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <span class="font-cta text-xs font-bold uppercase tracking-[0.18em] text-muted">Ratgeber</span>
                        <h2 class="mt-4 font-display text-4xl leading-[1.1] text-ink sm:text-5xl">Geschenke mit Stuttgart-Bezug</h2>
                    </div>
                    <p class="max-w-2xl text-base leading-8 text-muted">Artikel, Ideen und kuratierte Empfehlungen für Menschen, die Stuttgart nicht nur mögen, sondern tragen, sammeln oder verschenken wollen.</p>
                </div>
            <?php endif; ?>
            <?php if (have_posts()): ?>
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <?php while (have_posts()): the_post(); ?>
                        <?php get_template_part('template-parts/card'); ?>
                    <?php endwhile; ?>
                </div>

                <div class="mt-10">
                    <?php the_posts_pagination([
                        'mid_size'  => 2,
                        'prev_text' => '← Zurück',
                        'next_text' => 'Weiter →',
                    ]); ?>
                </div>
            <?php else: ?>
                <p class="text-base text-muted">Noch keine Artikel in dieser Kategorie. Bald geht es los!</p>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/cta'); ?>
</main>

<?php get_footer(); ?>
