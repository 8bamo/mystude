<?php
$pricing_url = home_url('/preise/');
?>
<section class="py-20">
    <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
        <div class="relative overflow-hidden rounded-[32px] bg-ink px-6 py-10 text-white shadow-strong sm:px-10 sm:py-14 lg:px-14">
            <div class="absolute -right-20 -top-24 h-80 w-80 rounded-full bg-coral/35 blur-3xl"></div>
            <div class="absolute -bottom-32 left-1/3 h-72 w-72 rounded-full bg-mint/25 blur-3xl"></div>
            <div class="relative grid gap-10 lg:grid-cols-[1.15fr_0.85fr] lg:items-end">
                <div>
                    <span class="font-sans text-xs font-bold uppercase tracking-[0.18em] text-honey">Websites & Shops von mystu</span>
                    <h2 class="mt-4 max-w-3xl font-display text-4xl leading-[0.94] sm:text-5xl">Ein Auftritt, der mit deinem Geschäft mitwächst.</h2>
                    <p class="mt-5 max-w-2xl text-base leading-8 text-white/75">Vom fokussierten Landingpage-Launch bis zum Shop oder einer individuellen Plattform: klar kalkulierbar, monatlich betreut und ohne Agentur-Nebel.</p>
                </div>
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <div class="border-l border-white/25 pl-5">
                        <span class="block font-sans text-[0.68rem] font-bold uppercase tracking-[0.16em] text-white/55">Start</span>
                        <strong class="mt-2 block text-2xl font-extrabold">ab 149 € / Monat</strong>
                    </div>
                    <a href="<?php echo esc_url($pricing_url); ?>" class="inline-flex min-h-[3.2rem] items-center justify-center rounded-full bg-white px-6 py-3 text-sm font-bold text-ink transition hover:-translate-y-0.5 hover:bg-honey">Pakete ansehen →</a>
                </div>
            </div>
        </div>
    </div>
</section>
