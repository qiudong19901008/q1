<?php

namespace q1\core\widget;

use hedao\dao\TagDao;

use function hedao\lib\helper\{
  getValue,
  getValueFromArrByKey,
};

class WidgetTagCloud extends \WP_Widget{
  function __construct() {
    parent::__construct(
      
      // Base ID of your widget
      'widget-tag-cloud', 
        
      // Widget name will appear in UI
      'q1-标签云',
        
      // Widget description
      [
        'description' => '按降序排列的标签云'
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
    $name = getValue($instance[ 'name' ],'标签云');
    $count = getValue($instance[ 'count' ],10);
    $tags = TagDao::getTagList($count);

    get_template_part('template-parts/components/widget/tagCloudCard/tagCloudCard',null,[
      'name'=>$name,
      'tags'=>$tags,
    ]);

  }
            
  // Widget Backend 
  public function form( $instance ) {
    
    $name = getValueFromArrByKey($instance,'name','标签云');
    $count = getValueFromArrByKey($instance,'count',10);
    

    ?>
       
      <p>
        <label for="<?php echo $this->get_field_id( 'name' ); ?>">名称:</label>
        <input 
          type="text" 
          id="<?php echo $this->get_field_id( 'name' );?>"
          name="<?php echo $this->get_field_name( 'name' ); ?>" 
          value="<?php echo esc_attr( $name ); ?>"
          class="widefat"
        >
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'count' ); ?>">显示数量:</label>
        <input 
          type="text" 
          id="<?php echo $this->get_field_id( 'count' );?>"
          name="<?php echo $this->get_field_name( 'count' ); ?>" 
          value="<?php echo htmlentities( $count ); ?>"
          class="widefat"
        >
      </p>
    
    <?php
  }
        
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['name'] =  strip_tags($new_instance['name']);
    $instance['count'] =  strip_tags($new_instance['count']);
    return $instance;
  }
}