<?php

class BS_Team_Members_Admin {

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
		    'name'               => 'Team Members',
		    'singular_name'      => 'Team Member',
		    'add_new'            => 'Add New',
		    'add_new_item'       => 'Add New Team Member',
		    'edit_item'          => 'Edit Team Member',
		    'new_item'           => 'New Team Member',
		    'all_items'          => 'All Team Members',
		    'view_item'          => 'View Team Member',
		    'search_items'       => 'Search Team Members',
		    'not_found'          => 'No team members found',
		    'not_found_in_trash' => 'No team members found in Trash',
		    'parent_item_colon'  => '',
		    'menu_name'          => 'Team Members'
		);

		$args = array(
		    'labels'             => $labels,
		    'public'             => true,
		    'publicly_queryable' => true,
		    'show_ui'            => true,
		    'show_in_menu'       => true,
		    'query_var'          => true,
		    'rewrite'            => array( 'slug' => 'team-member' ),
		    'capability_type'    => 'post',
		    'has_archive'        => false,
		    'hierarchical'       => false,
		    'menu_position'      => null,
		    'supports'           => array( 'title', 'editor', 'thumbnail' )
		);

		register_post_type( 'team', $args );
	}

	public function taxonomy_setup()
	{
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Roles', 'taxonomy general name' ),
			'singular_name'     => _x( 'Role', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Roles' ),
			'all_items'         => __( 'All Roles' ),
			'parent_item'       => __( 'Parent Role' ),
			'parent_item_colon' => __( 'Parent Role:' ),
			'edit_item'         => __( 'Edit Role' ),
			'update_item'       => __( 'Update Role' ),
			'add_new_item'      => __( 'Add New Role' ),
			'new_item_name'     => __( 'New Role Name' ),
			'menu_name'         => __( 'Roles' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'role' ),
		);

		register_taxonomy( 'team_role', array( 'team' ), $args );

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
	    $users = get_users();
	    $user_array[] = array( "name"=>"None", "value"=>0 );
	    foreach ( $users as $user ) {
	    	$user_array[] = array( "name"=>$user->display_name, "value"=>$user->ID );	    	
	    }

	    $meta_boxes[ 'team_metabox' ] = array(
	        'id' => 'team_metabox',
	        'title' => 'Team Member Info',
	        'pages' => array( 'team' ), // post type
	        'context' => 'normal',
	        'priority' => 'high',
	        'show_names' => true, // Show field names on the left
	        'fields' => array(
	        	array(
	                'name' => 'Job Title',	                
	                'id' => $prefix . 'team_job_title',
	                'type' => 'text'
	            ),        	
	            array(
	                'name' => 'Email Address',
	                'desc' => 'Used for Gravatar if a featured image is not set',	                
	                'id' => $prefix . 'team_email',
	                'type' => 'text_email'
	            ),
	            array(
	                'name' => 'Facebook URL',
	                'id' => $prefix . 'team_facebook',
	                'type' => 'text_url'
	            ),
	            array(
	                'name' => 'Twitter URL',
	                'id' => $prefix . 'team_twitter',
	                'type' => 'text_url'
	            ),
	            array(
	                'name' => 'Google Plus URL',
	                'id' => $prefix . 'team_googleplus',
	                'type' => 'text_url'
	            ),
	            array(
	                'name' => 'LinkedIn URL',
	                'id' => $prefix . 'team_linkedin',
	                'type' => 'text_url'
	            ),         
	            array(
	            	'name' => 'Site User',
	            	'desc' => 'Related username on this site',
	            	'id' => $prefix . 'team_user_id',
	            	'type' => 'select',
	            	'options' => $user_array,
	            )
	        ),
	    );

	    return $meta_boxes;
	}
}

$BS_Team_Members_Admin = new BS_Team_Members_Admin();