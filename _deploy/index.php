<?php get_header(); ?>

<main id="main">
    <div class="container archive-content" style="padding-top: 4rem; padding-bottom: 4rem;">
        <?php if (have_posts()): ?>
            <div class="articles-grid">
                <?php while (have_posts()): the_post(); ?>
                    <?php get_template_part('template-parts/card'); ?>
                <?php endwhile; ?>
            </div>
            <div class="pagination">
                <?php the_posts_pagination(['prev_text' => '← Zurück', 'next_text' => 'Weiter →']); ?>
            </div>
        <?php else: ?>
            <p class="no-posts">Noch keine Inhalte gefunden.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
