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