<?php

class BS_Features_Admin {

	public function __construct()
	{
	    add_action( 'init', array( $this, 'post_type_setup' ) );
	    add_action( 'init', array( $this, 'taxonomy_setup' ) );
	    add_action( 'init', array( $this, 'metabox_init' ) );
	    add_filter( 'cmb_meta_boxes', array( $this, 'field_setup' ) );    
	}

	public function post_type_setup() 
	{
		$labels = array(
		    'name'               => 'Features',
		    'singular_name'      => 'Feature',
		    'add_new'            => 'Add New',
		    'add_new_item'       => 'Add New Feature',
		    'edit_item'          => 'Edit Feature',
		    'new_item'           => 'New Feature',
		    'all_items'          => 'All Features',
		    'view_item'          => 'View Feature',
		    'search_items'       => 'Search Features',
		    'not_found'          => 'No features found',
		    'not_found_in_trash' => 'No features found in Trash',
		    'parent_item_colon'  => '',
		    'menu_name'          => 'Features'
		);

		$args = array(
		    'labels'             => $labels,
		    'public'             => true,
		    'publicly_queryable' => true,
		    'show_ui'            => true,
		    'show_in_menu'       => true,
		    'query_var'          => true,
		    'rewrite'            => array( 'slug' => 'feature' ),
		    'capability_type'    => 'post',
		    'has_archive'        => false,
		    'hierarchical'       => false,
		    'menu_position'      => null,
		    'supports'           => array( 'title', 'editor', 'thumbnail' )
		);

		register_post_type( 'feature', $args );
	}

	public function taxonomy_setup()
	{
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Feature Groups', 'taxonomy general name' ),
			'singular_name'     => _x( 'Feature Group', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Feature Groups' ),
			'all_items'         => __( 'All Feature Groups' ),
			'parent_item'       => __( 'Parent Feature Group' ),
			'parent_item_colon' => __( 'Parent Feature Group:' ),
			'edit_item'         => __( 'Edit Feature Group' ),
			'update_item'       => __( 'Update Feature Group' ),
			'add_new_item'      => __( 'Add New Feature Group' ),
			'new_item_name'     => __( 'New Feature Group Name' ),
			'menu_name'         => __( 'Feature Groups' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'feature-group' ),
		);

		register_taxonomy( 'feature-group', array( 'feature' ), $args );

	}


	public function metabox_init()
	{
		if ( ! class_exists('cmb_Meta_Box')) {
		    include plugin_dir_path( __FILE__ ) . '/metabox/init.php';
		}
	}

	public function field_setup( $meta_boxes ) 
	{
	    $prefix = 'bs_'; // Prefix for all fields
	    $meta_boxes[ 'feature_metabox' ] = array(
	        'id' => 'feature_metabox',
	        'title' => 'Feature Info',
	        'pages' => array( 'feature' ), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(	        	
	            array(
	                'name' => 'URL',
	                'desc' => "Set a link for this feature.",
	                'id' => $prefix . 'feature_url',
	                'type' => 'text_url'
	            ),
	            array(
	                'name' => 'Button Text',
	                'desc' => "Leave empty to exclude a button.",
	                'id' => $prefix . 'feature_button_text',
	                'type' => 'text'
	            ),
	            array(
	                'name' => 'Icon Font',
	                'desc' => "Use a font based icon instead of a featured image.",
	                'id' => $prefix . 'feature_icon_font',
	                'type' => 'select',
	                'options' => array(
	                	array('name' => 'None', 'value' => 'none'),
	                    array('name' => 'Font Awesome', 'value' => 'fa'),
	                    array('name' => 'Glyphicon', 'value' => 'glyphicon'),	                   
	                )
	            ),
	            array(
	                'name' => 'Icon Class',
	                'desc' => "Enter the icon class as per <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>Font Awesome</a> or <a href='http://getbootstrap.com/components/' target='_blank'>Glyphicon</a> docs.",
	                'id' => $prefix . 'feature_icon_class',
	                'type' => 'text'
	            )	           
	        ),
	    );

	    return $meta_boxes;
	}
}

$BS_Features_Admin = new BS_Features_Admin();