<?php

/**
 * @desc Enqueue scripts and styles to the front-end
 */
function sapling_enqueue_scripts() {
	// CSS
	wp_enqueue_style( 'sapling_css_main', get_stylesheet_directory_uri() . '/assets/dist/css/style.css', array(),
	filemtime( get_stylesheet_directory() . '/assets/dist/css/style.css'));
	// JS
	wp_deregister_script( 'wp-embed' );
	wp_enqueue_script( 'sapling_js_main', get_template_directory_uri() . '/assets/dist/js/main.min.js', []);
}
add_action( 'wp_enqueue_scripts', 'sapling_enqueue_scripts' );

/**
 * @desc Enqueue scripts and styles to the back-end
 */
function sapling_enqueue_editor_scripts(){
	wp_enqueue_script( 'blockeditor_scripts', get_template_directory_uri() . '/assets/dist/js/block-editor.min.js', array(), '1.0.0', true );
	wp_enqueue_style( 'sapling_css_main', get_stylesheet_directory_uri() . '/assets/dist/css/editor-theme-styles.css', array(), 
	filemtime( get_stylesheet_directory() . '/assets/dist/css/editor-theme-styles.css'));
}
add_action('enqueue_block_editor_assets', 'sapling_enqueue_editor_scripts');

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