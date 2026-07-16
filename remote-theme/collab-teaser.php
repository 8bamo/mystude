<?php
$collab_url = get_permalink(get_page_by_path('collab-partner'));
if (!$collab_url) $collab_url = home_url('/collab-partner/');
?>
<section class="peak-collab py-16 sm:py-20">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="mb-8 space-y-3 sm:mb-10">
            <span class="font-cta text-xs font-bold uppercase tracking-[0.18em] text-muted">Zusammenarbeit</span>
            <h2 class="max-w-3xl font-display text-4xl leading-[1.1] text-ink sm:text-5xl">Creators, Presse und gute Partner.</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            <article class="border border-black bg-black p-6 text-white sm:p-8">
                <div class="max-w-3xl space-y-4 sm:space-y-5">
                    <div class="font-mono text-sm text-white/70">01</div>
                    <h3 class="max-w-[12ch] font-display text-[2.35rem] leading-[1.02] text-white sm:text-[2.75rem]">Creators & Influencer</h3>
                    <p class="max-w-2xl text-base leading-7 text-white/75 sm:text-[1.05rem] sm:leading-8">Du hast eine Community, die Stuttgart liebt? Lass uns gemeinsam Content machen: gesponserte Artikel, Affiliate-Deals und Kollektionen mit Charakter.</p>
                    <a href="<?php echo esc_url($collab_url); ?>#collab-form" class="inline-flex min-h-[3rem] items-center justify-center rounded border border-white bg-white px-6 py-3 font-cta text-sm font-bold uppercase tracking-[0.08em] text-black transition">Kooperation anfragen</a>
                </div>
            </article>

            <article class="border border-black/15 bg-white p-6 sm:p-8">
                <div class="max-w-3xl space-y-4 sm:space-y-5">
                    <div class="font-mono text-sm text-muted">02</div>
                    <h3 class="max-w-[12ch] font-display text-[2.35rem] leading-[1.02] text-ink sm:text-[2.75rem]">Presse & Medien</h3>
                    <p class="max-w-2xl text-base leading-7 text-muted sm:text-[1.05rem] sm:leading-8">Schreibst du über Stuttgart, lokalen Handel oder E-Commerce? Wir stehen für Interviews, Statements und Hintergrundgespräche zur Verfügung.</p>
                    <a href="<?php echo esc_url($collab_url); ?>#collab-form" class="inline-flex min-h-[3rem] items-center justify-center rounded border border-black bg-white px-6 py-3 font-cta text-sm font-bold uppercase tracking-[0.08em] text-black transition">Presseanfrage stellen</a>
                </div>
            </article>
        </div>
    </div>
</section>
