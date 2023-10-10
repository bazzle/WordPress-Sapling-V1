<?php
$excerpt = get_the_excerpt();
?>

<div class="c-index-item">
    <h1 class="c-index-item__title">
        <?php the_title() ?>
        <a class="c-index-item__title__link" href="<?php the_permalink(); ?>">
            <span class="visually-hidden">Read about <?php the_title() ?></span>
        </a>
    </h1>
    <div class="c-index-item__metadata">
        <div class="c-index-item__date">
            Date: <?php echo get_the_time( 'm.d.y' ); ?>
        </div>
    </div>
    <div class="c-index-item__excerpt">
        <p>
            <?php echo $excerpt; ?>
        </p>
    </div>
</div>