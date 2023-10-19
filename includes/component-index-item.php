<div class="c-index-item">
    <h2 class="c-index-item__title">
        <a class="c-index-item__title__link" href="<?php the_permalink(); ?>">
            <?php the_title() ?>
        </a>
    </h2>
    <div class="c-index-item__metadata">
        <time class="o-single__metadata__item"><?php echo get_the_time( 'F jS, Y' ); ?></time>
        <span class="o-single__metadata__divider">/</span>
        <span class="o-single__metadata__item">
            Less than <?php echo reading_time(); ?> minute read
        </span>
    </div>
    <?php if(has_excerpt()) : ?>
        <div class="c-index-item__excerpt">
            <?php the_excerpt(); ?>
        </div>
    <?php endif; ?>
</div>