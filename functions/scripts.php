<?php

add_theme_support('editor-styles');
add_editor_style( get_stylesheet_directory_uri() . '/assets/dist/editor-style.css');

function sapling_enqueue_scripts() {
	wp_register_style( 'main', get_stylesheet_directory_uri() . '/assets/dist/style.css', array(), 
	filemtime( get_stylesheet_directory() . '/assets/dist/style.css'));
	wp_deregister_script( 'wp-embed' );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/dist/js/main.min.js', []);
	wp_enqueue_style( 'main' );
}

add_action( 'wp_enqueue_scripts', 'sapling_enqueue_scripts' );


/**
 * @desc add defer to scripts.min.js
 */

function add_defer_attribute( $tag, $handle ) {
	if ( 'main-js' !== $handle ) {
		return $tag;
	}
	return str_replace( ' src', ' defer src', $tag );
}

add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 2 );