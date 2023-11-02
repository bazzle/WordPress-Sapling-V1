<?php get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <div class="o-single">
            <div class="o-single__hero">
                <div class="o-row">
                    <div class="o-row-container o-single__head">
                        <h1 class="o-single__title"><?php the_title() ?></h1>
                    </div>
                </div>
                <?php if (has_post_thumbnail()) :
                    $thumbnail_url = get_the_post_thumbnail_url($post->ID,'banner');
                    ?>
                    <div style="background-image:url('<?php echo $thumbnail_url ?>')" class="o-single__featured-image"></div>
                <?php endif; ?>
            </div>

            <div class="o-row">
                <div class="o-row-container">
                    <div class="o-single__content">
                        <?php if(has_excerpt()) : ?>
                            <div class="o-single__tldr">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="o-content">
                            <?php the_content() ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endwhile;
endif; ?>

<?php get_footer();