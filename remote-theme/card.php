<?php
$categories = get_the_category();
$cat = $categories[0] ?? null;
$reading_time = mystu_get_reading_time();
$cat_color = $cat ? mystu_category_color($cat->slug) : '#ff7a45';
?>
<article class="peak-card group overflow-hidden rounded-[8px] border border-black/15 bg-white transition">
    <a class="block h-full" href="<?php the_permalink(); ?>">
        <div class="relative aspect-[16/10] overflow-hidden bg-[#eef1f0]">
            <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('mystu-card', ['alt' => get_the_title(), 'class' => 'h-full w-full object-cover']); ?>
            <?php else: ?>
                <div class="h-full w-full bg-[#eef1f0]"></div>
            <?php endif; ?>
            <?php if ($cat): ?>
                <span class="absolute left-4 top-4 inline-flex rounded-full bg-[#4e4e4e] px-4 py-2 text-[0.68rem] font-bold uppercase tracking-[0.16em] text-white">
                    <?php echo esc_html($cat->name); ?>
                </span>
            <?php endif; ?>
        </div>
        <div class="space-y-4 p-5">
            <h3 class="font-display text-[1.55rem] leading-[1.1] text-ink transition group-hover:underline"><?php the_title(); ?></h3>
            <p class="line-clamp-3 text-sm leading-7 text-muted"><?php echo esc_html(get_the_excerpt()); ?></p>
            <div class="flex flex-wrap gap-x-4 gap-y-2 font-mono text-[0.72rem] text-muted">
                <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date('d. M Y'); ?></time>
                <span><?php echo $reading_time; ?> Min. Lesezeit</span>
            </div>
        </div>
    </a>
</article>
