<?php
/**
 * Scripts and Styles file
 * See: http://jetpack.me/
 *
 * @package lsx
 */

/**
 * Enqueue scripts and styles.
 */
function lsx_scripts() {
	//wp_enqueue_style( 'lsx-style', get_stylesheet_uri() );

	wp_enqueue_style('lsx_main', get_template_directory_uri() . '/assets/css/main.min.css', false, 'cbb994c13f6a865b6e5acae303eeb1aa');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script('lsx_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', false, '7ec09ba241198e13577e517f23218104', true);
	wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.7.0.min.js', false, null, false);
	wp_enqueue_script('modernizr');
    wp_enqueue_script('jquery');
	wp_enqueue_script('lsx_scripts');
	wp_enqueue_style( 'child-css', get_stylesheet_directory_uri() . '/custom.css' );

	//wp_enqueue_script( 'lsx-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
}
add_action( 'wp_enqueue_scripts', 'lsx_scripts' );