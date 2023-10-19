<?php
$home_url = get_home_url();
$tagline = get_bloginfo('description');
?>
<header class="o-header">
    <div class="o-row nomargin--y">
        <div class="o-row-container o-header__container">
            <div class="o-header__logo-lockup">
                <?php get_template_part('includes/component', 'logo-lockup') ?>
            </div>
        </div>
    </div>
</header>