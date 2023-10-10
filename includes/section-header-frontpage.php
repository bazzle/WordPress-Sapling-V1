<?php
$tagline = get_bloginfo('description');
?>
<header class="o-header-frontpage">
    <div class="o-row nomargin--y">
        <div class="o-row-container o-header-frontpage__container">
            <div class="o-header-frontpage__site-name-tag">
                <a class="o-header-frontpage__site-name" href="<?php echo get_option('home'); ?>">
                    <?php echo get_bloginfo( 'name' ); ?>
                </a>
                <?php if($tagline) : ?>
                    <p class="o-header-frontpage__site-tagline">
                        <?php echo $tagline ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="o-header-frontpage__divider">
                <div class="o-header-frontpage__logo">
                    <?php get_template_part('includes/component', 'logo') ?>
                </div>
            </div>
        </div>
    </div>
</header>