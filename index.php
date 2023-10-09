<?php get_header();
if ( have_posts() ) : ?>
    <div class="o-index">
        <div class="o-row">
            <div class="o-grid-container o-grid-container--wide">
                <div class="o-index o-index__container">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="o-index__item">
                        <?php get_template_part('includes/component', 'card') ?>
                    </div>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>

<?php get_footer();