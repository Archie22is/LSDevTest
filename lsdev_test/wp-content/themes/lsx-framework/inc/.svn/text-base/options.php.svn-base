<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {

	$imagepath =  get_template_directory_uri() . '/assets/img/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'lsx'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Top Navigation', 'lsx'),
		'desc' => __('Enable Bootstrap\'s top navigation bar.', 'lsx'),
		'id' => 'top_nav',
		'std' => 1,
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Logo', 'lsx'),
		'desc' => __('Upload your logo to be displayed in the header.', 'lsx'),
		'id' => 'site_logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Favicon', 'lsx'),
		'desc' => __('Upload a favicon.', 'lsx'),
		'id' => 'favicon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Fixed Layout', 'lsx'),
		'desc' => __('Enable fixed layout.', 'lsx'),
		'id' => 'static_layout',
		'std' => '0',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('General Site Layout', 'lsx'),
		'desc' => __('Choose general sitewide layout.', 'lsx'),
		'id' => "site_layout",
		'std' => "2c-l",
		'type' => "images",
		'options' => array(
			'1col' => $imagepath . '1c.png',
			'2c-l' => $imagepath . '2cr.png',
			'2c-r' => $imagepath . '2cl.png',
			'3c-,' => $imagepath . '3cm.png',
			'3c-l' => $imagepath . '3cr.png',
			'3c-r' => $imagepath . '3cl.png')
	);

	$options[] = array(
		'name' => __('Home Page Layout', 'lsx'),
		'desc' => __('Choose homepage layout.', 'lsx'),
		'id' => "home_layout",
		'std' => "2c-l",
		'type' => "images",
		'options' => array(
			'1col' => $imagepath . '1c.png',
			'2c-l' => $imagepath . '2cr.png',
			'2c-r' => $imagepath . '2cl.png',
			'3c-,' => $imagepath . '3cm.png',
			'3c-l' => $imagepath . '3cr.png',
			'3c-r' => $imagepath . '3cl.png')
	);

	return $options;
}