<?php
$gift_products = [
    [
        'name' => 'Stuttgart Cap "1893" rot',
        'type' => 'Cap',
        'price' => '25,00 EUR',
        'img' => 'https://mystu.shop/cdn/shop/files/1000x1500px-1893-red-3.jpg',
        'url' => 'https://mystu.shop/products/cap-1893-red',
        'text' => 'Ein klares Geschenk fuer Alltag, Stadion und Wochenendtasche. Der rote Washed-Look setzt mehr Akzent als Schwarz, der 1893-Stick bleibt bewusst reduziert.',
    ],
    [
        'name' => 'Stuttgart Shirt "1893"',
        'type' => 'Shirt',
        'price' => '35,00 EUR',
        'img' => 'https://mystu.shop/cdn/shop/files/1000x1500px-1893-lilac-2.jpg',
        'url' => 'https://mystu.shop/collections/oversize',
        'text' => 'Fuer alle, die Stuttgart dezent tragen wollen. Das 1893-Motiv ist klar erkennbar, aber nicht laut, und passt deshalb gut als sicheres Textilgeschenk.',
    ],
    [
        'name' => 'Stuttgart Socken "Neckarstadion"',
        'type' => 'Socken',
        'price' => '14,99 EUR',
        'img' => 'https://mystu.shop/cdn/shop/files/1000x1350px-socken-neckarstadion-rot.jpg',
        'url' => 'https://mystu.shop/products/socken-neckarstadion',
        'text' => 'Ein unkompliziertes Geschenk mit starkem Stadionbezug. Passt als kleine Aufmerksamkeit, Add-on oder Wichtelgeschenk.',
    ],
    [
        'name' => 'Sticker "Nett hier. Neckarstadion"',
        'type' => 'Sticker',
        'price' => '7,11 EUR',
        'img' => 'https://mystu.shop/cdn/shop/files/1000x1350px-nett-hier-1.jpg',
        'url' => 'https://mystu.shop/collections/sticker',
        'text' => 'Kleiner Preis, klare Stuttgart-Pointe. Funktioniert als Mitbringsel, Umschlag-Beilage oder Zusatz zu Cap, Socken und Shirt.',
    ],
];

$gift_notes = [
    [
        'title' => 'Fuer Fans, die es dezent moegen',
        'text' => 'Caps, reduzierte Shirts und Poster funktionieren besser als laute Fanartikel, wenn das Geschenk auch ausserhalb des Stadions getragen oder aufgehangen werden soll.',
    ],
    [
        'title' => 'Fuer Stuttgart-Heimweh',
        'text' => 'Ein Produkt mit 0711-, Neckarstadion- oder 1893-Bezug ist persoenlicher als ein allgemeines Souvenir und bleibt trotzdem unkompliziert.',
    ],
    [
        'title' => 'Fuer kleine Budgets',
        'text' => 'Sticker und Poster sind gute Add-ons, wenn du eine Karte, einen Gutschein oder ein groesseres Geschenk abrunden willst.',
    ],
];
?>

<section class="border-b border-black bg-black py-20 text-white">
    <div class="mx-auto grid w-full max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[1fr_0.82fr] lg:items-end">
        <div>
            <span class="font-cta text-xs font-bold uppercase tracking-[0.18em] text-white/65">Geschenkguides</span>
            <h1 class="mt-5 max-w-4xl font-display text-5xl leading-[1.05] text-white sm:text-6xl lg:text-7xl">Stuttgart schenken, ohne Souvenir-Kitsch.</h1>
        </div>
        <div class="max-w-xl lg:justify-self-end">
            <p class="text-base leading-8 text-white/70">Diese Seite sammelt Geschenkideen fuer Menschen mit Stuttgart im Herzen: tragbare Fanmode, kleine Mitbringsel, Poster und Produkte aus der mystu Collection. Reduziert gestaltet, persoenlich genug zum Verschenken.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="https://mystu.shop" target="_blank" rel="noopener" class="inline-flex min-h-[3rem] items-center justify-center rounded border border-white bg-white px-6 py-3 font-cta text-sm font-bold uppercase tracking-[0.08em] text-black">Produkte ansehen</a>
                <a href="#mystu-gift-products" class="inline-flex min-h-[3rem] items-center justify-center rounded border border-white/55 px-6 py-3 font-cta text-sm font-bold uppercase tracking-[0.08em] text-white">Auswahl lesen</a>
            </div>
        </div>
    </div>
</section>

<section class="border-b border-black/15 bg-[#eef1f0] py-14">
    <div class="mx-auto grid w-full max-w-7xl gap-4 px-5 sm:px-8 md:grid-cols-3">
        <?php foreach ($gift_notes as $note): ?>
            <article class="rounded-[8px] border border-black/15 bg-white p-6">
                <h2 class="font-display text-2xl leading-[1.1] text-ink"><?php echo esc_html($note['title']); ?></h2>
                <p class="mt-4 text-sm leading-7 text-muted"><?php echo esc_html($note['text']); ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="py-20" id="mystu-gift-products">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="mb-10 grid gap-6 lg:grid-cols-[0.85fr_1fr] lg:items-end">
            <div>
                <span class="font-cta text-xs font-bold uppercase tracking-[0.18em] text-muted">mystu Auswahl</span>
                <h2 class="mt-4 font-display text-4xl leading-[1.1] text-ink sm:text-5xl">Produkte, die als Geschenk funktionieren.</h2>
            </div>
            <p class="max-w-3xl text-base leading-8 text-muted lg:justify-self-end">Die Auswahl ist bewusst eng gehalten: ein Accessoire, ein groesseres Textil, ein Erinnerungsstueck und ein kleines Geschenk. So findet man schneller etwas, das zum Anlass und Budget passt.</p>
        </div>

        <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($gift_products as $product): ?>
                <a href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener" class="peak-card group flex h-full flex-col overflow-hidden rounded-[8px] border border-black/15 bg-white">
                    <div class="aspect-[4/5] overflow-hidden bg-[#eef1f0]">
                        <img src="<?php echo esc_url($product['img']); ?>" alt="<?php echo esc_attr($product['name']); ?>" loading="lazy" class="h-full w-full object-cover">
                    </div>
                    <div class="flex flex-1 flex-col p-5">
                        <div class="flex items-center justify-between gap-4 font-mono text-sm text-muted">
                            <span><?php echo esc_html($product['type']); ?></span>
                            <span><?php echo esc_html($product['price']); ?></span>
                        </div>
                        <h3 class="mt-4 font-display text-2xl leading-[1.1] text-ink group-hover:underline"><?php echo esc_html($product['name']); ?></h3>
                        <p class="mt-4 flex-1 text-sm leading-7 text-muted"><?php echo esc_html($product['text']); ?></p>
                        <span class="mt-6 inline-flex min-h-[3rem] items-center justify-center rounded border border-black bg-black px-5 py-3 text-center font-cta text-sm font-bold uppercase tracking-[0.08em] text-white transition group-hover:bg-white group-hover:text-black">Im Shop ansehen <span aria-hidden="true" class="ml-2">→</span></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="border-y border-black/15 bg-[#eef1f0] py-16">
    <div class="mx-auto grid w-full max-w-7xl gap-10 px-5 sm:px-8 lg:grid-cols-[0.9fr_1.1fr]">
        <div>
            <span class="font-cta text-xs font-bold uppercase tracking-[0.18em] text-muted">So findest du schneller das richtige Geschenk</span>
            <h2 class="mt-4 font-display text-4xl leading-[1.1] text-ink sm:text-5xl">Nicht jedes Stuttgart-Geschenk muss laut sein.</h2>
        </div>
        <div class="grid gap-4 sm:grid-cols-2">
            <div class="border-l border-black pl-5">
                <h3 class="font-cta text-sm font-bold uppercase tracking-[0.08em] text-black">Unter 10 EUR</h3>
                <p class="mt-3 text-sm leading-7 text-muted">Poster und Sticker als kleine Aufmerksamkeit, Wichtelgeschenk oder Zusatz zu einer Karte.</p>
            </div>
            <div class="border-l border-black pl-5">
                <h3 class="font-cta text-sm font-bold uppercase tracking-[0.08em] text-black">Unter 30 EUR</h3>
                <p class="mt-3 text-sm leading-7 text-muted">Caps und Accessoires fuer Menschen, bei denen Groessen schwer einzuschaetzen sind.</p>
            </div>
            <div class="border-l border-black pl-5">
                <h3 class="font-cta text-sm font-bold uppercase tracking-[0.08em] text-black">Textilgeschenk</h3>
                <p class="mt-3 text-sm leading-7 text-muted">Shirts und Hoodie passen, wenn Stil, Schnitt und Stuttgart-Bezug gleich wichtig sind.</p>
            </div>
            <div class="border-l border-black pl-5">
                <h3 class="font-cta text-sm font-bold uppercase tracking-[0.08em] text-black">Persoenlicher machen</h3>
                <p class="mt-3 text-sm leading-7 text-muted">Kombiniere ein Produkt mit einer kurzen Zeile: Stadionmoment, Lieblingsspiel oder gemeinsamer Stuttgart-Tag.</p>
            </div>
        </div>
    </div>
</section>
