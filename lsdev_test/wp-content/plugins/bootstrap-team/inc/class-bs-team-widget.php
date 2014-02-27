<?php
/**
 * Bootstrap Team Members Widget
 */
class BS_Team_Widget extends WP_Widget {
 
    /** constructor -- name this the same as the class above */
    function bs_team_widget() {
        parent::WP_Widget(false, $name = 'Bootstrap Team Members');  
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget( $args, $instance ) { 
        extract( $args );
        $title    = apply_filters( 'widget_title', $instance['title'] );
        $size = $instance['size'];
        $responsive = $instance['responsive'];
        $columns = $instance['columns'];
        $limit = $instance['limit'];
        $include = $instance['include'];
        $layout = $instance['layout'];
        $role = $instance['role'];
        $heading = $instance['heading'];
        $description = $instance['description'];
        $social = $instance['social'];
        $style = $instance['style'];

        if ( $limit == '' ) $limit = "-1";
        
        if ( $responsive == 1 ) $responsive = true;
        // Disregard specific ID setting if specific role is defined
        if ( $role != 'all' ) {
            $include = '';
        } else {
            $role = '';
        }
        
        if ( $include != '' ) $limit = "-1";
                
        echo $before_widget;        
        if ( $title )
            echo $before_title . $title . $after_title;
        if ( class_exists( 'BS_Team' ) ) {
                $BS_Team = new BS_Team();
                echo $BS_Team->output(array(                                 
                                    'size' => $size,
                                    'responsive' => $responsive,
                                    'columns' => $columns,
                                    'limit' => $limit,
                                    'include' => $include,
                                    'role' => $role,
                                    'heading' => $heading,
                                    'description' => $description,
                                    'social' => $social,
                                    'style' => $style,
                                    'layout' => $layout
                                    )
                                );                 
        };
        echo $after_widget;        
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {   
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['limit'] = strip_tags( $new_instance['limit'] );
    $instance['include'] = strip_tags( $new_instance['include'] );
    $instance['size'] = strip_tags( $new_instance['size'] );
    $instance['layout'] = strip_tags( $new_instance['layout'] );
    $instance['columns'] = strip_tags( $new_instance['columns'] );
    $instance['style'] = strip_tags( $new_instance['style'] );
    $instance['heading'] = strip_tags( $new_instance['heading'] );
    $instance['description'] = strip_tags( $new_instance['description'] );
    $instance['social'] = strip_tags( $new_instance['social'] );
    $instance['responsive'] = strip_tags( $new_instance['responsive'] );
    $instance['role'] = strip_tags( $new_instance['role'] );    
    return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {  
    
        $defaults = array( 
            'title' => 'Team Members', 
            'size' => '100', 
            'columns' => '3', 
            'style' => 'panel-default', 
            'limit' => '', 
            'responsive' => 1, 
            'heading' => '', 
            'description' => 1, 
            'social' => 1, 
            'role' => '', 
            'include' => '', 
            'layout' => 'A' 
        );
        $instance = wp_parse_args( (array) $instance, $defaults );   

        $title    = esc_attr($instance['title']);
        $layout  = esc_attr($instance['layout']);
        $columns  = esc_attr($instance['columns']);
        $style  = esc_attr($instance['style']);
        $limit  = esc_attr($instance['limit']);
        $include  = esc_attr($instance['include']);
        $size  = esc_attr($instance['size']);
        $heading = esc_attr($instance['heading']);
        $description = esc_attr($instance['description']);
        $social = esc_attr($instance['social']);
        $responsive = esc_attr($instance['responsive']);
        $role = esc_attr($instance['role']);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('layout'); ?>"><?php _e('Layout:'); ?></label>
            <select name="<?php echo $this->get_field_name('layout'); ?>" id="<?php echo $this->get_field_id('layout'); ?>" class="widefat layout">
            <?php
            $options = array('A', 'B');
            foreach ($options as $option) {
                echo '<option value="' . $option . '" id="' . $option . '"', $layout == $option ? ' selected="selected"' : '', '>', $option, '</option>';
            }
            ?>
            </select>
        </p>      
        <p>
            <label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Columns:'); ?></label>
            <select name="<?php echo $this->get_field_name('columns'); ?>" id="<?php echo $this->get_field_id('columns'); ?>" class="widefat layout">
            <?php
            $options = array('2', '3', '4');
            foreach ($options as $option) {
                echo '<option value="' . lcfirst($option) . '" id="' . $option . '"', $columns == lcfirst($option) ? ' selected="selected"' : '', '>', $option, '</option>';
            }
            ?>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('style'); ?>"><?php _e('Panel Style:'); ?></label>
            <select name="<?php echo $this->get_field_name('style'); ?>" id="<?php echo $this->get_field_id('style'); ?>" class="widefat layout">
            <?php
            $options = array('panel-default', 'panel-primary', 'panel-success', 'panel-info', 'panel-warning', 'panel-danger');
            foreach ($options as $option) {
                echo '<option value="' . lcfirst($option) . '" id="' . $option . '"', $style == lcfirst($option) ? ' selected="selected"' : '', '>', $option, '</option>';
            }
            ?>
            </select>
        </p>       
        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"><?php _e('Maximum amount:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('limit'); ?>" name="<?php echo $this->get_field_name('limit'); ?>" type="text" value="<?php echo $limit; ?>" />
            <small><?php _e('Leave empty to display all'); ?></small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('role'); ?>"><?php _e('Role:'); ?></label>
            <select name="<?php echo $this->get_field_name('role'); ?>" id="<?php echo $this->get_field_id('role'); ?>" class="widefat">
            <?php
            $options = get_terms('team_role');
            echo '<option value="all" id="all">All Roles</option>';
            foreach ($options as $option) {
                echo '<option value="' . $option->slug . '" id="' . $option->slug . '"', $role == $option->slug ? ' selected="selected"' : '', '>', $option->name, '</option>';
            }
            ?>
            </select>
            <small>Display team members within a specific role</small>
        </p>
        <p class="bs-teams-specify">
            <label for="<?php echo $this->get_field_id('include'); ?>"><?php _e('Specify Team Members by ID:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('include'); ?>" name="<?php echo $this->get_field_name('include'); ?>" type="text" value="<?php echo $include; ?>" />
            <small><?php _e('Comma separated list, overrides limit setting'); ?></small>
        </p>        
        <p>
            <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Image size:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" type="text" value="<?php echo $size; ?>" />
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('heading'); ?>" name="<?php echo $this->get_field_name('heading'); ?>" type="checkbox" value="1" <?php checked( '1', $heading ); ?> />
            <label for="<?php echo $this->get_field_id('heading'); ?>"><?php _e('Show Panel Header'); ?></label>
            <br/>
            <small>Display member role at top of panel</small>
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="checkbox" value="1" <?php checked( '1', $description ); ?> />
            <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Show Description'); ?></label>
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('social'); ?>" name="<?php echo $this->get_field_name('social'); ?>" type="checkbox" value="1" <?php checked( '1', $social ); ?> />
            <label for="<?php echo $this->get_field_id('social'); ?>"><?php _e('Show Panel Footer'); ?></label>
            <br/>
            <small>Display social icons at bottom of panel</small>
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('responsive'); ?>" name="<?php echo $this->get_field_name('responsive'); ?>" type="checkbox" value="1" <?php checked( '1', $responsive ); ?> />
            <label for="<?php echo $this->get_field_id('responsive'); ?>"><?php _e('Responsive Images'); ?></label>
        </p>
        <?php
        
    }

} // end class bs_teams_widget
add_action('widgets_init', create_function('', 'return register_widget("BS_Team_Widget");'));
?>