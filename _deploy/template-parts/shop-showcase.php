<?php
$categories = [
    [
        'img'   => 'https://mystu.shop/cdn/shop/files/1000x1500px-1893-lilac-2.jpg',
        'label' => 'Shirts & Hoodies',
        'desc'  => 'Oversize Cuts, Stuttgart-Prints',
        'url'   => 'https://mystu.shop/collections/shirts',
    ],
    [
        'img'   => 'https://mystu.shop/cdn/shop/files/1000x1500px-1893-red-3.jpg',
        'label' => 'Caps',
        'desc'  => '1893, International, 0711',
        'url'   => 'https://mystu.shop/collections/caps',
    ],
    [
        'img'   => 'https://mystu.shop/cdn/shop/files/1000x1350px-socken-neckarstadion-rot.jpg',
        'label' => 'Socken',
        'desc'  => 'Neckarstadion, Stuttgart-Edition',
        'url'   => 'https://mystu.shop/collections/stuttgart-socken',
    ],
    [
        'img'   => 'https://mystu.shop/cdn/shop/files/1000x1350px-nett-hier-1.jpg',
        'label' => 'Sticker',
        'desc'  => 'Nett hier, International & mehr',
        'url'   => 'https://mystu.shop/collections/sticker',
    ],
];
?>
<section class="py-20">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div class="space-y-3">
                <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">mystu.shop</span>
                <h2 class="font-display text-4xl text-ink sm:text-5xl">Unsere Kollektionen</h2>
            </div>
            <a href="https://mystu.shop" target="_blank" rel="noopener" class="inline-flex min-h-[3rem] items-center justify-center rounded-full border border-white/40 bg-white/30 px-5 py-3 text-sm font-bold text-ink shadow-soft backdrop-blur-[18px] transition hover:-translate-y-0.5 hover:text-coral">Alle Produkte</a>
        </div>

        <div class="grid gap-4 lg:grid-cols-[1.2fr_1fr] lg:grid-rows-2">
            <?php foreach ($categories as $i => $cat): ?>
            <a class="glass-card group overflow-hidden rounded-[28px] transition hover:-translate-y-1 hover:shadow-strong <?php echo $i === 0 ? 'lg:row-span-2' : ''; ?>"
               href="<?php echo esc_url($cat['url']); ?>"
               target="_blank" rel="noopener">
                <div class="overflow-hidden bg-[#f5ecdf] <?php echo $i === 0 ? 'aspect-[3/4]' : 'aspect-[4/3]'; ?>">
                    <img src="<?php echo esc_url($cat['img']); ?>" alt="<?php echo esc_attr($cat['label']); ?>" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                </div>
                <div class="flex items-center justify-between gap-4 p-5">
                    <div>
                        <span class="block text-base font-bold text-ink"><?php echo esc_html($cat['label']); ?></span>
                        <p class="mt-1 text-sm text-muted"><?php echo esc_html($cat['desc']); ?></p>
                    </div>
                    <span class="text-lg text-coral">→</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
