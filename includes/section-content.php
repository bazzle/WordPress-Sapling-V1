<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?>
        <h1><?php the_content() ?></h1>
        <?php the_content() ?>
    <?php endwhile; 
endif; 
?>