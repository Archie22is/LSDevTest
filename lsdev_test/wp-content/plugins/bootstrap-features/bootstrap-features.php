<?php

/**
 * Plugin Name: Bootstrap Features
 * Plugin URI: http://lsdev.biz
 * Description: Features plugin for themes using the BootStrap Framework.
 * Author: Iain Coughtrie
 * Version: 1.0
 * Author URI: http://lsdev.biz
 *
 * @package WordPress
 * @subpackage Bootstrap_Features
 * @author Iain
 * @since 0.1
 */

// Post Type and Custom Fields
include plugin_dir_path( __FILE__ ) . '/inc/class-bs-features-admin.php';

// Shortcode and Template Tag
include plugin_dir_path( __FILE__ ) . '/inc/class-bs-features.php';

// Widget
include plugin_dir_path( __FILE__ ) . '/inc/class-bs-features-widget.php';