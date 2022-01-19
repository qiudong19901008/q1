<?php

namespace q1\widget;

class ChildWidgetTemplate extends \WP_Widget{

  function __construct() {
      parent::__construct(
        
        // Base ID of your widget
        'wpb_widget', 
          
        // Widget name will appear in UI
        __('WPBeginner Widget', 'wpb_widget_domain'), 
          
        // Widget description
        array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
      );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
      
    }
              
    // Widget Backend 
    public function form( $instance ) {
      
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
      
    }

}

