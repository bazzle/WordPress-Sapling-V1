<?php
$tldr = get_field('tldr_content', get_the_ID());
$block_height = get_field('block_height', get_the_ID());
?>

<div class="c-card">
    <h1 class="c-card__title">
        <?php the_title() ?>
        <a class="c-card__title__link" href="<?php the_permalink(); ?>">
            <span class="visually-hidden">Read about <?php the_title() ?></span>
        </a>
    </h1>
    <div class="c-card__metadata">
        <div class="c-card__date">
            Date: <?php echo get_the_time( 'm.d.y' ); ?>
        </div>
        <?php if($block_height) : ?>
            <span class="c-card__metadata__divider">/</span>
            <div class="c-card__blockheight">
                <?php echo 'Block height: ' . $block_height; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="c-card__excerpt">
        <p>
            <?php echo esc_html( $tldr ) ?>
        </p>
    </div>
</div>