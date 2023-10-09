<?php get_header(); ?>

<?php if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?>

    <div class="page">

        <?php get_template_part('includes/section','page-head'); ?>  
        <?php wpautop(the_content()); ?>
          
    </div>

<?php endwhile; 
endif; ?>


<?php get_footer();