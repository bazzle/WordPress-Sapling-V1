<?php

function remove_block_css(){
    wp_dequeue_style( 'wp-block-library' ); // This is the handle for the file typically enqueued for block styles
}
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );