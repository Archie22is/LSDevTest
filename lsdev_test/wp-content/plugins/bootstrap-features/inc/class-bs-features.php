<?php

class BS_Features {

    public function __construct()
    {
        add_action( 'template_redirect', array($this, 'disable_single' ) );
        add_shortcode( 'features', array($this, 'output' ) );        
    }

    public function disable_single() 
    {
        $queried_post_type = get_query_var('post_type');
        if ( is_single() && 'feature' ==  $queried_post_type ) {
            wp_redirect( home_url(), 301 );
            exit;
        }
    }

    public function output( $atts ) 
    {
        extract( shortcode_atts( array(
            'limit' => '-1',
            'include' => '',
            'columns' => 1,
            'responsive' => 'true',
            'group' => '',
            'tag' => 'h3',
            'size' => 100,
            'buttons' => 'true'
        ), $atts ) );
        
        $output = "";

        if ( $responsive == 'true' ) {
            $responsive = 'img-responsive';    
        } else {
            $responsive = '';
        }

        if ( $include != '' ) {
        $include = explode( ',', $include );
            $args = array(
                    'post_type' => 'feature',
                    'feature-group' => $group,
                    'posts_per_page' => $limit, 
                    'post__in' => $include                    
                );
        } else {
             $args = array(
                    'post_type' => 'feature',
                    'feature-group' => $group,
                    'posts_per_page' => $limit,                  
                );
        }
        $features = get_posts( $args );
        
        if ( !empty( $features ) ) {            
            $count = 0;
            if ( $columns >= 2 && $columns <= 4 )
                $output .= "<div class='row features'>";

            foreach ( $features as $feature ) {

                // Count
                $count++;

                // Headings
                $link_open = "";
                $link_close = "";
                if ( get_post_meta( $feature->ID, 'bs_feature_url', true ) ) {
                    $link_open = "<a href='" . get_post_meta( $feature->ID, 'bs_feature_url', true ) . "'>";
                    $link_close = "</a>";
                }
                $heading = "<$tag>" . $link_open . $feature->post_title . $link_close . "</$tag>";
               
                // Buttons                
                if ( $buttons == 'true' ) {
                    $button_text = get_post_meta( $feature->ID, 'bs_feature_button_text', true );
                    if ( '' != $button_text )
                        $button = "<a href='" . get_post_meta( $feature->ID, 'bs_feature_url', true ) . "' class='btn btn-primary text-center'>$button_text</a>";
                    else
                        $button = '';
                } else
                    $button = '';

                // Icon
                $icon_font = get_post_meta( $feature->ID, 'bs_feature_icon_font', true );
                $icon_class = get_post_meta( $feature->ID, 'bs_feature_icon_class', true );
                $icon_size = $size;

                if ( $icon_font != "none" ) {                    
                    if ( $columns == 1 ) 
                        $icon = '<i class="pull-right ' . $icon_font . ' ' . $icon_class . '" style="font-size: ' . $icon_size . 'px"></i>';
                    else
                        $icon = '<i class="' . $icon_font . ' ' . $icon_class . '" style="font-size: ' . $icon_size . 'px"></i>';
                } elseif ( '' != get_the_post_thumbnail( $feature->ID ) ) {
                    if ( $columns == 1 ) 
                        $icon = get_the_post_thumbnail( $feature->ID, array( $size, $size ), "class=img-circle $responsive pull-right");
                    else
                        $icon = get_the_post_thumbnail( $feature->ID, array( $size, $size ), "class=img-circle $responsive center-block");
                }                
                
                // Output
                if ( $columns == 1 ) { 
                    $output .= "
                        <div class='row'>                    
                            <figure class='col-sm-3'>
                                $icon
                            </figure>
                            <div class='col-sm-9'>
                                $heading
                                <p>$feature->post_content</p>
                                $button                             
                            </div>
                        </div>";          
                } elseif ( $columns >= 2 && $columns <= 4 ) {         
                    $md_col_width = 12/$columns;
                    $output .= "
                        <div class='col-md-$md_col_width col-sm-6'>
                            <figure class='text-center'>                                
                                $icon
                            </figure>
                            <div class='text-center'>
                                $heading
                                <p>$feature->post_content</p>
                                $button                              
                            </div>                            
                        </div>";
                    if ( $count%$columns == 0 ) $output .= "<div class='clearfix'></div>";                  
                } else {
                    $output .= "
                        <p class='bg-warning' style='padding: 20px;'>
                            Invalid number of columns set. Bootstrap Features supports 1 to 4 columns.
                        </p>";
                };              
            }

        if ( $columns >= 2 && $columns <= 4 )
            $output .= "</div>";

        return $output;
        }
    }

}
 
$BS_Features = new BS_Features();