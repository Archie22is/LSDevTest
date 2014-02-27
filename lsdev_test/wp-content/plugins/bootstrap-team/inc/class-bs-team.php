<?php

class BS_Team {

    public $columns, $responsive; 

    public function __construct()
    {
        add_action( 'template_redirect', array($this, 'disable_single' ) );
        add_filter( 'get_avatar', array($this, 'change_avatar_class' ) );
        add_shortcode( 'team', array($this, 'output' ) );        
    }

    public function disable_single() 
    {
        $queried_post_type = get_query_var('post_type');
        if ( is_single() && 'team' ==  $queried_post_type ) {
            wp_redirect( home_url(), 301 );
            exit;
        }
    }

    public function change_avatar_class( $class ) 
    {   
        $columns = $this->columns;
        $responsive = $this->responsive;

        $class = str_replace( "class='avatar", "class='img-responsive center-block" , $class );

        return $class;        
    }

    public function output( $atts ) 
    {
        extract( shortcode_atts( array(
            'limit' => '-1',
            'include' => '',
            'columns' => 4,
            'responsive' => true,
            'role' => '',
            'size' => 200,
            'layout' => 'A',
            'buttons' => true,
            'style' => 'panel-default',
            'heading' => true,
            'description' => true,
            'social' => true
        ), $atts ) );
        
        $output = "";

        if ( $responsive == true ) {
            $responsive = 'img-responsive';    
        } else {
            $responsive = '';
        }

        $this->columns = $columns;
        $this->responsive = $responsive;

        if ( $include != '' ) {
        $include = explode( ',', $include );
            $args = array(
                    'post_type' => 'team',
                    'team_role' => $role,
                    'posts_per_page' => $limit, 
                    'post__in' => $include                    
                );
        } else {
             $args = array(
                    'post_type' => 'team',
                    'team_role' => $role,
                    'posts_per_page' => $limit,                  
                );
        }
        $teams = get_posts( $args );
        
        if ( !empty( $teams ) ) {            
            $count = 0;
            if ( $columns >= 2 && $columns <= 4 )
                $output .= "<div class='row team'>";

            foreach ( $teams as $team ) {

                // Count
                $count++;

                //Vars
                $name = $team->post_title;
                $job_title = get_post_meta( $team->ID, 'bs_team_job_title', true );    
                $facebook_link = get_post_meta( $team->ID, 'bs_team_facebook', true );
                $twitter_link = get_post_meta( $team->ID, 'bs_team_twitter', true );
                $googleplus_link = get_post_meta( $team->ID, 'bs_team_googleplus', true );
                $linkedin_link = get_post_meta( $team->ID, 'bs_team_facebook', true );                

                $roles = "";
                $terms = get_the_terms( $team->ID, 'team_role' );
                if ( $terms && ! is_wp_error( $terms ) ) : 
                    $roles = array();
                    foreach ( $terms as $term ) {
                        $roles[] = $term->name;
                    }
                    $roles = join( ", ", $roles );
                endif;
                
                // Header
                if ( $heading == true ) {
                    $heading = "
                        <div class='panel-heading'>
                            <h4 class='panel-title text-center'>$roles</h4>
                        </div>
                    ";
                } else {
                    $heading = "";
                } 

                // Description
                if ( $description == true ) {
                    $description = "<p>$team->post_content</p>";
                } else {
                    $description = "";
                }

                // Image
                if ( '' != get_the_post_thumbnail( $team->ID ) ) {                   
                    $image = get_the_post_thumbnail( $team->ID, array( $size, $size ), "class=$responsive center-block");
                } else {
                    $image = get_avatar( get_post_meta( $team->ID, 'bs_team_email', true ), $size );
                }                
                
                // Social                
                if ( $social == true ) {
                    $links = array( 
                        'facebook' => $facebook_link, 
                        'twitter' => $twitter_link, 
                        'google-plus' => $googleplus_link, 
                        'linkedin' => $linkedin_link 
                    );
                    $social = "<div class='social panel-footer text-center'>";
                    foreach ( $links as $sm=>$link ) {
                        if ( '' != $link ) {
                            $social .= "
                                <a class='col-xs-3' href='$link' target='_blank'>
                                    <i class='fa fa-$sm'></i>
                                </a>
                            ";
                        }
                    }
                    $social .= "<div class='clearfix'></div></div>";
                } else {
                    $social = "";
                }
                // Output
                if ( $columns >= 2 && $columns <= 4 ) {         
                    $md_col_width = 12/$columns;
                    if ( $layout == 'A' ) {
                    $output .= "
                        <div class='col-md-$md_col_width col-sm-6'>
                            <div class='panel $style'>
                                $heading
                                <div class='panel-body text-center'>
                                    $image
                                    <h3>$name</h3>
                                    <h4>$job_title</h4>
                                    $description
                                </div>                                                               
                                $social
                            </div>                                
                        </div>
                        ";
                    } elseif ( $layout == 'B' ) {
                       $output .= "
                        <div class='col-md-$md_col_width col-xs-12'>
                            <div class='col-sm-2 col-md-3 col-xs-12'>
                                $image
                            </div>
                            <div class='col-sm-10 col-md-9 col-xs-12'>
                                <h3>$name</h3>
                                <h4>$job_title</h4>
                                    $description
                            </div>
                        </div>
                        "; 
                    }
                    
                    if ( $count%$columns == 0 ) $output .= "<div class='clearfix'></div>";                  
                } else {
                    $output .= "
                        <p class='bg-warning' style='padding: 20px;'>
                            Invalid number of columns set. Bootstrap Team Members supports 2, 3 or 4 columns.
                        </p>";
                };              
            }
        if ( $columns >= 2 && $columns <= 4 )
            $output .= "</div>";

        return $output;
        }
    }
    
}
 
$BS_Team = new BS_Team();