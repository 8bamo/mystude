<?php get_header(); ?>

<main id="main" class="pt-[84px]">
<?php if (have_posts()): while (have_posts()): the_post();
    $categories   = get_the_category();
    $cat          = $categories[0] ?? null;
    $reading_time = mystu_get_reading_time();
    $tags         = get_the_tags();
    $cat_color    = $cat ? mystu_category_color($cat->slug) : '#ff7a45';
?>
    <section class="relative overflow-hidden border-b border-black/10 bg-white/60 py-16">
        <?php if (has_post_thumbnail()): ?>
            <div class="absolute inset-0 opacity-20">
                <?php the_post_thumbnail('mystu-hero', ['alt' => '', 'class' => 'h-full w-full object-cover']); ?>
            </div>
        <?php endif; ?>
        <div class="relative mx-auto w-full max-w-5xl px-5 sm:px-8">
            <?php if ($cat): ?>
                <a class="inline-flex rounded-full px-4 py-2 text-[0.72rem] font-bold uppercase tracking-[0.16em] text-white" href="<?php echo esc_url(get_category_link($cat->term_id)); ?>" style="background: <?php echo esc_attr($cat_color); ?>;">
                    <?php echo esc_html($cat->name); ?>
                </a>
            <?php endif; ?>
            <h1 class="mt-6 font-display text-5xl leading-tight text-ink sm:text-6xl"><?php the_title(); ?></h1>
            <div class="mt-5 flex flex-wrap gap-x-4 gap-y-2 font-sans text-xs font-bold uppercase tracking-[0.14em] text-muted">
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d. F Y'); ?></time>
                <span><?php echo $reading_time; ?> Min. Lesezeit</span>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="mx-auto w-full max-w-5xl px-5 sm:px-8">
            <div class="prose-content rounded-[28px] bg-white/75 p-8 shadow-soft sm:p-12">
                <?php the_content(); ?>
            </div>

            <?php if ($tags): ?>
                <div class="mt-10 flex flex-wrap gap-3">
                    <?php foreach ($tags as $tag): ?>
                        <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="inline-flex rounded-full border border-black/10 bg-white px-4 py-2 text-sm text-muted shadow-soft">#<?php echo esc_html($tag->name); ?></a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php get_template_part('template-parts/cta'); ?>

    <section class="py-10">
        <div class="mx-auto grid w-full max-w-5xl gap-4 px-5 sm:px-8 md:grid-cols-2">
            <?php $prev = get_previous_post(); $next = get_next_post(); ?>
            <?php if ($prev): ?>
                <a class="rounded-[24px] border border-black/10 bg-white/80 p-6 shadow-soft" href="<?php echo esc_url(get_permalink($prev)); ?>">
                    <span class="font-sans text-xs font-bold uppercase tracking-[0.16em] text-coral">← Vorheriger Artikel</span>
                    <span class="mt-3 block font-display text-2xl leading-tight text-ink"><?php echo esc_html(get_the_title($prev)); ?></span>
                </a>
            <?php endif; ?>
            <?php if ($next): ?>
                <a class="rounded-[24px] border border-black/10 bg-white/80 p-6 shadow-soft md:text-right" href="<?php echo esc_url(get_permalink($next)); ?>">
                    <span class="font-sans text-xs font-bold uppercase tracking-[0.16em] text-coral">Nächster Artikel →</span>
                    <span class="mt-3 block font-display text-2xl leading-tight text-ink"><?php echo esc_html(get_the_title($next)); ?></span>
                </a>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($cat):
        $related = new WP_Query([
            'category__in'   => [$cat->term_id],
            'posts_per_page' => 3,
            'post__not_in'   => [get_the_ID()],
            'post_status'    => 'publish',
        ]);
        if ($related->have_posts()): ?>
        <section class="border-t border-black/10 bg-white/40 py-20">
            <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
                <h2 class="mb-10 font-display text-4xl text-ink sm:text-5xl">Mehr aus <?php echo esc_html($cat->name); ?></h2>
                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    <?php while ($related->have_posts()): $related->the_post(); ?>
                        <?php get_template_part('template-parts/card'); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; endif; ?>
<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
