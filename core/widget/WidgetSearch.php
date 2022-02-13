<?php

namespace q1\core\widget;

use function hedao\lib\helper\{
  getValue,
  getValueFromArrByKey,
};

class WidgetSearch extends \WP_Widget{
  function __construct() {
    parent::__construct(
      
      // Base ID of your widget
      'widget-search', 
        
      // Widget name will appear in UI
      'q1-搜索框',
        
      // Widget description
      [
        'description' => '一个搜索框' 
      ]
    );
  }
    
  // Creating widget front-end
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    echo $this->_widget($instance);
    echo $args['after_widget'];   
  }

  private function _widget($instance){
    $placeholder = getValue($instance[ 'placeholder' ],'搜点什么呢?');
    $btnInnerHtml = getValue($instance[ 'btnInnerHtml' ],'<i class="fa fa-search" ></i>');
    $color = getValue($instance[ 'color' ],'#6ac5f9');

    get_template_part('components/searchCard/searchCard',null,[
      'placeholder'=>$placeholder,
      'btnInnerHtml'=>$btnInnerHtml,
      'color'=>$color,
    ]);
  }
            
  // Widget Backend 
  public function form( $instance ) {
    
    $placeholder = getValueFromArrByKey($instance,'placeholder','搜点什么呢?');
    $btnInnerHtml = getValueFromArrByKey($instance,'btnInnerHtml','<i class="fa fa-search" ></i>');
    $color = getValueFromArrByKey($instance,'color','#6ac5f9');

    ?>
       
      <p>
        <label for="<?php echo $this->get_field_id( 'placeholder' ); ?>">搜索框提示信息:</label>
        <input 
          type="text" 
          id="<?php echo $this->get_field_id( 'placeholder' );?>"
          name="<?php echo $this->get_field_name( 'placeholder' ); ?>" 
          value="<?php echo esc_attr( $placeholder ); ?>"
          class="widefat"
        >
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'btnInnerHtml' ); ?>">搜索按钮内容:</label>
        <input 
          type="text" 
          id="<?php echo $this->get_field_id( 'btnInnerHtml' );?>"
          name="<?php echo $this->get_field_name( 'btnInnerHtml' ); ?>" 
          value="<?php echo htmlentities( $btnInnerHtml ); ?>"
          class="widefat"
        >
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'color' ); ?>">整体颜色:</label>
        <input 
          type="text" 
          id="<?php echo $this->get_field_id( 'color' );?>"
          name="<?php echo $this->get_field_name( 'color' ); ?>" 
          value="<?php echo esc_attr( $color ); ?>"
          class="widefat"
        >
      </p>

    <?php
  }
        
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['placeholder'] =  strip_tags($new_instance['placeholder']);
    $instance['btnInnerHtml'] =  strip_tags($new_instance['btnInnerHtml']);
    $instance['color'] = $new_instance['color'];
    return $instance;
  }
}