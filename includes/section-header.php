<?php
$tagline = get_bloginfo('description');
?>
<header class="o-header">
    <div class="o-row nomargin">
        <div class="o-grid-container o-grid-container o-header__container">
            <div class="o-header__logo">
                <?php get_template_part('includes/component', 'logo') ?>
            </div>
            <div class="o-header__title">
                <span class="o-header__site-name" href="<?php echo get_option('home'); ?>">
                    <?php echo get_bloginfo( 'name' ); ?>
                </span>
                <a class="o-header__link" href="<?php echo get_option('home'); ?>">
                    <span class="visually-hidden">Back to homepage</span>
                </a>
                <?php if($tagline) : ?>
                    <span class="o-header__site-tagline">
                        <?php echo $tagline ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>