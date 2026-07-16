<?php
$collab_url = get_permalink(get_page_by_path('collab-partner'));
if (!$collab_url) $collab_url = home_url('/collab-partner/');
?>
<section class="py-16 sm:py-20">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="mb-8 space-y-2 sm:mb-10 sm:space-y-3">
            <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-coral">Zusammenarbeit</span>
            <h2 class="max-w-3xl font-display text-4xl leading-[0.98] text-ink sm:text-5xl">Creators, Presse und gute Partner.</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            <article class="glass-card rounded-[28px] p-6 sm:p-8">
                <div class="max-w-3xl space-y-4 sm:space-y-5">
                    <div class="text-2xl leading-none text-coral">✦</div>
                    <h3 class="max-w-[12ch] font-display text-[2.35rem] leading-[0.94] text-ink sm:text-[2.75rem]">Creators & Influencer</h3>
                    <p class="max-w-2xl text-base leading-7 text-muted sm:text-[1.05rem] sm:leading-8">Du hast eine Community, die Stuttgart liebt? Lass uns gemeinsam Content machen: gesponserte Artikel, Affiliate-Deals und Kollektionen mit Charakter.</p>
                    <a href="<?php echo esc_url($collab_url); ?>#collab-form" class="inline-flex min-h-[3.1rem] items-center justify-center rounded-full bg-gradient-to-r from-coral to-[#ff9966] px-5 py-3 text-sm font-bold text-white shadow-soft transition hover:-translate-y-0.5">Kooperation anfragen</a>
                </div>
            </article>

            <article class="glass-card rounded-[28px] p-6 sm:p-8">
                <div class="max-w-3xl space-y-4 sm:space-y-5">
                    <div class="text-2xl leading-none text-coral">◈</div>
                    <h3 class="max-w-[12ch] font-display text-[2.35rem] leading-[0.94] text-ink sm:text-[2.75rem]">Presse & Medien</h3>
                    <p class="max-w-2xl text-base leading-7 text-muted sm:text-[1.05rem] sm:leading-8">Schreibst du über Stuttgart, lokalen Handel oder E-Commerce? Wir stehen für Interviews, Statements und Hintergrundgespräche zur Verfügung.</p>
                    <a href="<?php echo esc_url($collab_url); ?>#collab-form" class="inline-flex min-h-[3.1rem] items-center justify-center rounded-full border border-black/10 bg-white px-5 py-3 text-sm font-bold text-ink shadow-soft transition hover:-translate-y-0.5 hover:text-coral">Presseanfrage stellen</a>
                </div>
            </article>
        </div>
    </div>
</section>
