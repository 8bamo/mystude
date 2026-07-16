<?php get_header(); ?>

<main id="main" class="pt-[84px]">
    <?php
    $term        = get_queried_object();
    $cat_slug    = $term->slug ?? '';
    $cat_color   = mystu_category_color($cat_slug);
    $description = category_description();
    ?>

    <section class="border-b border-black/10 bg-white/60 py-16" style="--cat-color: <?php echo esc_attr($cat_color); ?>;">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Kategorie</span>
            <h1 class="mt-4 font-display text-5xl text-ink sm:text-6xl"><?php single_cat_title(); ?></h1>
            <?php if ($description): ?>
                <p class="mt-5 max-w-3xl text-base leading-8 text-muted"><?php echo wp_kses_post($description); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <section class="py-16">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
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
