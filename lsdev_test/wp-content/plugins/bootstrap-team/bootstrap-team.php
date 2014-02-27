<?php

/**
 * Plugin Name: Bootstrap Team
 * Plugin URI: http://lsdev.biz
 * Description: Team Members plugin for themes using the BootStrap Framework.
 * Author: Iain Coughtrie
 * Version: 0.8
 * Author URI: http://lsdev.biz
 *
 * @package WordPress
 * @subpackage Bootstrap_Team Members
 * @author Iain
 * @since 0.1
 */

// Post Type and Custom Fields
include plugin_dir_path( __FILE__ ) . '/inc/class-bs-team-admin.php';

// Shortcode and Template Tag
include plugin_dir_path( __FILE__ ) . '/inc/class-bs-team.php';

// Widget
include plugin_dir_path( __FILE__ ) . '/inc/class-bs-team-widget.php';