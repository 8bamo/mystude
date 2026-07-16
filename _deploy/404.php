<?php get_header(); ?>

<main id="main">
    <div class="container" style="min-height: 60vh; display: flex; align-items: center; justify-content: center; text-align: center; padding: 4rem 1rem;">
        <div>
            <span style="font-size: 6rem; font-family: 'Playfair Display', serif; color: var(--color-red); display: block; line-height: 1;">404</span>
            <h1 style="font-size: 2rem; margin: 1rem 0;">Diese Seite gibt es nicht mehr.</h1>
            <p style="color: var(--color-muted); margin-bottom: 2rem;">Vielleicht wurde sie verschoben oder gelöscht. Schau dich auf der Startseite um.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Zur Startseite →</a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
