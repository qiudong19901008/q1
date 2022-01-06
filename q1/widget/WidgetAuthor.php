<?php

namespace q1\widget;

class WidgetAuthor extends \WP_Widget {
 
  // The construct part  
  function __construct() {
    parent::__construct(
  
      // id
      'widget-author', 
        
      // 名称
      'q1-作者卡片', 
        
      // 其他选项
      [
        'description' => '存放作者信息' 
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
    $portrait = getValue($instance[ 'portrait' ],'https://rcbb-public.oss-cn-guangzhou.aliyuncs.com/rcbb.cc.logo.white.png');
    $nickname = getValue($instance[ 'nickname' ],'古今合道士');
    $description = getValue($instance[ 'description' ],'享生活，分享好看的电影，好听的音乐和好用的工具，可能也会分享一些技术文章');
    $contactWay = getValue($instance[ 'contactWay' ],'<a href="#"><i class="fab fa-github"></i></a>');
    get_template_part('q1/component/widget/authorCard/authorCard',null,[
      'portrait'=>$portrait,
      'nickname'=>$nickname,
      'description'=>$description,
      'contactWay'=>$contactWay
    ]);
  }
            
  // Creating widget Backend 
  public function form( $instance ) {
    $portrait = getValue($instance[ 'portrait' ],'https://rcbb-public.oss-cn-guangzhou.aliyuncs.com/rcbb.cc.logo.white.png');
    $nickname = getValue($instance[ 'nickname' ],'古今合道士');
    $description = getValue($instance[ 'description' ],'享生活，分享好看的电影，好听的音乐和好用的工具，可能也会分享一些技术文章');
    $contactWay = getValue($instance[ 'contactWay' ],'<a href="#"><i class="fab fa-github"></i></a>');
    
    $args = [
      'portrait'=>$portrait,
      'nickname'=>$nickname,
      'description'=>$description,
      'contactWay'=>$contactWay
    ];

    ?>

      <p>
        <label for="<?php echo $this->get_field_id( 'portrait' ); ?>">头像地址:</label>
        <input 
          type="text" 
          id="<?php echo $this->get_field_id( 'portrait' );?>"
          name="<?php echo $this->get_field_name( 'portrait' ); ?>" 
          value="<?php echo esc_attr( $args['portrait'] ); ?>"
          class="widefat"
        >
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'nickname' ); ?>">昵称:</label>
        <input 
          type="text" 
          id="<?php echo $this->get_field_id( 'nickname' );?>"
          name="<?php echo $this->get_field_name( 'nickname' ); ?>" 
          value="<?php echo esc_attr( $args['nickname'] ); ?>"
          class="widefat"
        >
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'description' ); ?>">简介:</label>
        <textarea 
          id="<?php echo $this->get_field_id( 'description' );?>"
          name="<?php echo $this->get_field_name( 'description' ); ?>" 
          rows="6" cols="50" 
          class="widefat code"
        ><?php echo esc_attr( $args['description'] ); ?></textarea>
      </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'contactWay' ); ?>">联系方式:</label>
        <textarea 
          placeholder='<a href="xxxx"><i class="fa fa-envelope"></i></a>'
          id="<?php echo $this->get_field_id( 'contactWay' );?>"
          name="<?php echo $this->get_field_name( 'contactWay' ); ?>"
          value="<?php echo htmlentities( $args['contactWay'] ); ?>"
          rows="6" cols="50" 
          class="widefat code"
        ><?php echo $args['contactWay']; ?></textarea>
      </p>
      
    <?php 
  }
        
  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['portrait'] =  strip_tags($new_instance['portrait']);
    $instance['nickname'] =  strip_tags($new_instance['nickname']);
    $instance['description'] =  strip_tags($new_instance['description']);
    $instance['contactWay'] =  $new_instance['contactWay'];
    return $instance;
  }
   

} 

?>