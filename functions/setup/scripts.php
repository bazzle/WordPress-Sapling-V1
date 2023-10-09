<?php

add_theme_support('editor-styles');
add_editor_style( get_stylesheet_directory_uri() . '/assets/dist/editor-style.css');

function head() {
	wp_register_style( 'main', get_stylesheet_directory_uri() . '/assets/dist/style.css', array(), 
	filemtime( get_stylesheet_directory() . '/assets/dist/style.css'));
	wp_enqueue_style( 'main' );
}
function footer() {
	wp_deregister_script( 'wp-embed' );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/dist/js/main.min.js', []);
}
function wpEnqueueEditorScripts(){
	wp_enqueue_script( 'blockeditor_scripts', get_template_directory_uri() . '/assets/dist/js/block-editor.min.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'head' );
add_action( 'wp_enqueue_scripts', 'footer' );
add_action('enqueue_block_editor_assets', 'wpEnqueueEditorScripts');


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