<?php
/**
 * lsx functions and definitions
 *
 * @package lsx
 */

require get_template_directory() . '/inc/plugins.php';
//require get_template_directory() . '/inc/bootstrap-variables.php';
require get_template_directory() . '/inc/config.php';


define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options-framework/' );
require_once dirname( __FILE__ ) . '/inc/options-framework/options-framework.php';

require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/layout.php';
require get_template_directory() . '/inc/hooks.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/utility.php';
require get_template_directory() . '/inc/scripts.php';
require get_template_directory() . '/inc/nav.php';
require get_template_directory() . '/inc/comment-walker.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';





// Gravata / Featured Image Size for manual query posts
add_image_size( 'profilepic', 120, 120, true );

