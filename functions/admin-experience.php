<?php
function sapling_setup() {
    add_theme_support( 'custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );
}
add_action( 'after_setup_theme', 'sapling_setup' );


function replace_wordpress_howdy( $wp_admin_bar ) {
    $my_account = $wp_admin_bar->get_node('my-account');
    $newtext = str_replace( 'Howdy,', 'From little acorns mighty oaks do grow – Hello', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtext,
    ));
}
add_filter( 'admin_bar_menu', 'replace_wordpress_howdy', 25 );