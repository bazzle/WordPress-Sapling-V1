<?php get_header();
if ( have_posts() ) :  ?>
    <?php while ( have_posts() ) : the_post();
            $tldr = get_field('tldr_content');
            $block_height = get_field('block_height');
        ?>
        <div class="o-single">
            <div class="o-single__hero">
                <div class="o-row">
                    <div class="o-grid-container">
                        <h1 class="o-single__title"><?php the_title() ?></h1>
                        <div class="o-single__metadata">
                            <time class="o-single__metadata__item"><?php echo get_the_time( 'F jS, Y' ); ?></time>
                            <span class="o-single__metadata__divider">/</span>
                            <?php if($block_height) : ?>
                                <span class="o-single__metadata__item"><?php echo 'Block height: ' . $block_height; ?></span>
                                <span class="o-single__metadata__divider">/</span>
                            <?php endif; ?>
                            <span class="o-single__metadata__item">
                                Less than <?php echo reading_time(); ?> minute read
                            </span>
                        </div>
                    </div>
                </div>
                <?php if (has_post_thumbnail()) :
                    $thumbnail_url = get_the_post_thumbnail_url($post->ID,'banner');
                    ?>
                    <div style="background-image:url('<?php echo $thumbnail_url ?>')" class="o-single__featured-image"></div>
                <?php endif; ?>
            </div>

            <div class="o-row">
                <div class="o-grid-container">
                    <div class="o-single__content">
                        <?php if($tldr) : ?>
                            <div class="o-single__tldr">
                                <p>
                                    <?php echo esc_textarea($tldr) ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php the_content() ?>
                    </div>
                </div>
            </div>

        </div>
    <?php endwhile; ?>
<? endif; ?>

<?php get_footer();