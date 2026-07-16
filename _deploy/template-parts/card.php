<?php
$categories = get_the_category();
$cat = $categories[0] ?? null;
$reading_time = mystu_get_reading_time();
$cat_color = $cat ? mystu_category_color($cat->slug) : '#ff7a45';
?>
<article class="glass-card group overflow-hidden rounded-[28px] transition hover:-translate-y-1 hover:shadow-strong">
    <a class="block h-full" href="<?php the_permalink(); ?>">
        <div class="relative aspect-[16/10] overflow-hidden bg-[#f5ecdf]">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('mystu-card', ['alt' => get_the_title(), 'class' => 'h-full w-full object-cover transition duration-500 group-hover:scale-105']); ?>
            <?php else: ?>
                <div class="h-full w-full bg-gradient-to-br from-[#f8d6c4] to-[#f5ecdf]"></div>
            <?php endif; ?>
            <?php if ($cat): ?>
                <span class="absolute left-4 top-4 inline-flex rounded-full px-3 py-2 text-[0.68rem] font-bold uppercase tracking-[0.16em] text-white" style="background: <?php echo esc_attr($cat_color); ?>;">
                    <?php echo esc_html($cat->name); ?>
                </span>
            <?php endif; ?>
        </div>
        <div class="space-y-4 p-6">
            <h3 class="font-display text-[1.45rem] leading-[1.02] text-ink transition group-hover:text-coral"><?php the_title(); ?></h3>
            <p class="line-clamp-3 text-sm leading-7 text-muted"><?php echo esc_html(get_the_excerpt()); ?></p>
            <div class="flex flex-wrap gap-x-4 gap-y-2 text-[0.72rem] font-bold uppercase tracking-[0.14em] text-muted">
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d. M Y'); ?></time>
                <span><?php echo $reading_time; ?> Min. Lesezeit</span>
            </div>
        </div>
    </a>
</article>
