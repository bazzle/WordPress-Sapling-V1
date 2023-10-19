<?php

/* @desc Stop WordPress inserting Hello World and Sample pages on install */
function delete_wordpress_defaults( $blog_id ) {
  $defaultPage = get_page_by_title( 'Sample Page' );
  wp_delete_post( $defaultPage->ID, $bypass_trash = true );
  $defaultPost = get_posts( array( 'title' => 'Hello World!' ) );
  wp_delete_post( $defaultPost[0]->ID, $bypass_trash = true );
}
add_action( 'wpmu_new_blog', 'delete_wordpress_defaults', 10, 6 );
add_action( 'after_switch_theme', 'delete_wordpress_defaults', 10, 6 );

/* @desc We will automatically set the permalink structure */
function update_permalinks() {
  if ( get_option( 'permalink_structure' ) == '' ) {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%' );
    $wp_rewrite->flush_rules();
  }
}
add_action( 'after_switch_theme', 'update_permalinks' );

/* @desc Set excerpt length */
function custom_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );