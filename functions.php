<?php
/**
 * Functions and definitions
 *
 */

/* Add Featured Image Support To Theme */
function add_featured_image_support() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumbnail', 150, 150, );
	add_image_size( 'medium', 300, 300,);
    add_image_size( 'medium_large', 768,);
	add_image_size( 'large', 1024, 1024,);
    add_image_size( 'full', false);
}

add_action( 'after_setup_theme', 'add_featured_image_support' );

function Hero_image_editor_assets() {
    wp_enqueue_script(
        'assessment/header',
        get_template_directory_uri().'/build/assets/src/js/block.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor' )    
    );
    wp_enqueue_style(
		'assessment/header-editor-style',
        get_template_directory_uri().'/build/assets/src/css/editor.css',
        array( 'wp-edit-blocks' )
	);

    wp_add_inline_script( 'assessment/header', 'const MYSCRIPT = ' . json_encode( array(
        'themeUri' => get_template_directory_uri(),
    ) ), 'before' );
};

add_action( 'enqueue_block_editor_assets', 'Hero_image_editor_assets');