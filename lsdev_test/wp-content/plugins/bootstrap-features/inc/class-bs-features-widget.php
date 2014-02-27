<?php
/**
 * Bootstrap Features Widget
 */
class BS_Features_Widget extends WP_Widget {
 
    /** constructor -- name this the same as the class above */
    function bs_features_widget() {
        parent::WP_Widget(false, $name = 'Bootstrap Features');  
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget( $args, $instance ) { 
        extract( $args );
        $title    = apply_filters( 'widget_title', $instance['title'] );
        $tag = $instance['tag'];
        $size = $instance['size'];
        $responsive = $instance['responsive'];
        $columns = $instance['columns'];
        $limit = $instance['limit'];
        $include = $instance['include'];
        $group = $instance['group'];
        $buttons = $instance['buttons'];

        if ( $limit == '' ) $limit = "-1";
        
        // Disregard specific ID setting if specific group is defined
        if ( $group != 'all' ) {
            $include = '';
        } else {
            $group = '';
        }
        
        if ( $include != '' ) $limit = "-1";
              
        if ( $responsive == '1' )
            $responsive = 'true';
        else
            $responsive = 'false';

        if ( $buttons == '1' )
            $buttons = 'true';
        else
            $buttons = 'false';
                
        echo $before_widget;        
        if ( $title )
            echo $before_title . $title . $after_title;
        if ( class_exists( 'BS_Features' ) ) {
                $BS_Features = new BS_Features();
                echo $BS_Features->output(array(                                        
                                    'size' => $size,
                                    'tag' => $tag,
                                    'responsive' => $responsive,
                                    'columns' => $columns,
                                    'limit' => $limit,
                                    'include' => $include,
                                    'group' => $group,
                                    'buttons' => $buttons
                                    )
                                );                 
        };
        echo $after_widget;        
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {   
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['tag'] = strip_tags( $new_instance['tag'] );
    $instance['limit'] = strip_tags( $new_instance['limit'] );
    $instance['include'] = strip_tags( $new_instance['include'] );
    $instance['size'] = strip_tags( $new_instance['size'] );
    $instance['columns'] = strip_tags( $new_instance['columns'] );
    $instance['buttons'] = strip_tags( $new_instance['buttons'] );
    $instance['responsive'] = strip_tags( $new_instance['responsive'] );
    $instance['group'] = strip_tags( $new_instance['group'] );    
    return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {  
    
        $defaults = array( 'title' => 'Features', 'tag' => 'h3', 'size' => '100', 'columns' => '1', 'limit' => '', 'responsive' => 1, 'buttons' => 1, 'group' => '', 'include' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );   

        $title    = esc_attr($instance['title']);
        $tag    = esc_attr($instance['tag']);
        $columns  = esc_attr($instance['columns']);
        $limit  = esc_attr($instance['limit']);
        $include  = esc_attr($instance['include']);
        $size  = esc_attr($instance['size']);
        $buttons = esc_attr($instance['buttons']);
        $responsive = esc_attr($instance['responsive']);
        $group = esc_attr($instance['group']);

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('tag'); ?>"><?php _e('Heading Tag:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" type="text" value="<?php echo $tag; ?>" />
            <small>HTML tag to wrap your headings. Eg. h2, h3, p etc</small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Columns:'); ?></label>
            <select name="<?php echo $this->get_field_name('columns'); ?>" id="<?php echo $this->get_field_id('columns'); ?>" class="widefat layout">
            <?php
            $options = array('1', '2', '3', '4');
            foreach ($options as $option) {
                echo '<option value="' . lcfirst($option) . '" id="' . $option . '"', $columns == lcfirst($option) ? ' selected="selected"' : '', '>', $option, '</option>';
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
            <label for="<?php echo $this->get_field_id('group'); ?>"><?php _e('Feature Group:'); ?></label>
            <select name="<?php echo $this->get_field_name('group'); ?>" id="<?php echo $this->get_field_id('group'); ?>" class="widefat">
            <?php
            $options = get_terms('feature-group');
            echo '<option value="all" id="all">All Groups</option>';
            foreach ($options as $option) {
                echo '<option value="' . $option->slug . '" id="' . $option->slug . '"', $group == $option->slug ? ' selected="selected"' : '', '>', $option->name, '</option>';
            }
            ?>
            </select>
        </p>
        <p class="bs-features-specify">
            <label for="<?php echo $this->get_field_id('include'); ?>"><?php _e('Specify Features by ID:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('include'); ?>" name="<?php echo $this->get_field_name('include'); ?>" type="text" value="<?php echo $include; ?>" />
            <small><?php _e('Comma separated list, overrides limit setting'); ?></small>
        </p>        
        <p>
            <label for="<?php echo $this->get_field_id('size'); ?>"><?php _e('Icon size:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" type="text" value="<?php echo $size; ?>" />
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('buttons'); ?>" name="<?php echo $this->get_field_name('buttons'); ?>" type="checkbox" value="1" <?php checked( '1', $buttons ); ?> />
            <label for="<?php echo $this->get_field_id('buttons'); ?>"><?php _e('Show Buttons'); ?></label>
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('responsive'); ?>" name="<?php echo $this->get_field_name('responsive'); ?>" type="checkbox" value="1" <?php checked( '1', $responsive ); ?> />
            <label for="<?php echo $this->get_field_id('responsive'); ?>"><?php _e('Responsive Images'); ?></label>
        </p>
        <script>
        jQuery(document).ready(function($) {
            var valueSelected = $("#widget-bs_features_widget-2-group :selected").val();

            if ( valueSelected == 'all' ) {
                $('.bs-features-specify').show();                
            } else {
                $('.bs-features-specify').hide();
            }
            $("#widget-bs_features_widget-2-group").change(function() {
                var valueSelected = this.value;

                if ( valueSelected == 'all' ) {
                    $('.bs-features-specify').show();                
                } else {
                    $('.bs-features-specify').hide();
                }
            });
        });
        </script>
        <?php
        
    }

} // end class bs_features_widget
add_action('widgets_init', create_function('', 'return register_widget("BS_Features_Widget");'));
?>