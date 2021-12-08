<?php

class CardAuthorWidget extends WP_Widget {
 
  // The construct part  
  function __construct() {
    parent::__construct(
  
      // id
      'card-author', 
        
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
    $portrait = $instance[ 'portrait' ];
    $nickname = $instance[ 'nickname' ];
    $description = $instance[ 'description' ];
    $contactWay = $instance[ 'contactWay' ];

    ?>
    <div class="card-author-container">
    <!-- 作者介绍 -->
    <div class="intro">
        <div class="portrait">
          <img src="<?php echo $portrait ?>" alt="作者头像">
          <!-- https://rcbb-public.oss-cn-guangzhou.aliyuncs.com/rcbb.cc.logo.white.png -->
        </div>
        <div class="nickname">
          <?php echo $nickname ?>
          <!-- 古今合道士 -->
        </div>
        <div class="description">
          <?php echo $description; ?>
          <!-- 享生活，分享好看的电影，好听的音乐和好用的工具，可能也会分享一些技术文章，目前是个程序猿~ -->
        </div>
     </div>
     <!-- 创作 -->
     <div class="creation">
        <div class="article">
          <p>文章</p>
          <p>12</p>
        </div>
        <div class="category">
          <p>分类</p>
          <p>7</p>
        </div>
        <div class="tag">
          <p>标签</p>
          <p>6</p>
        </div>
     </div>
     <!-- 联系方式 -->
     <div class="contact-way">
        <?php
          echo html_entity_decode($contactWay);
        ?>
       <!-- fab代表品牌图标 -->
        <!-- <a href="#"><i class="fa fa-github"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a> -->
     </div>
</div>

    <?php

  }
            
  // Creating widget Backend 
  public function form( $instance ) {
    $portrait = $instance[ 'portrait' ];
    $nickname = $instance[ 'nickname' ];
    $description = $instance[ 'description' ];
    $contactWay = $instance[ 'contactWay' ];
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'portrait' ); ?>">头像地址:</label>
      <input 
        type="text" 
        id="<?php echo $this->get_field_id( 'portrait' );?>"
        name="<?php echo $this->get_field_name( 'portrait' ); ?>" 
        value="<?php echo esc_attr( $portrait ); ?>"
        class="widefat"
      >
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'nickname' ); ?>">昵称:</label>
      <input 
        type="text" 
        id="<?php echo $this->get_field_id( 'nickname' );?>"
        name="<?php echo $this->get_field_name( 'nickname' ); ?>" 
        value="<?php echo esc_attr( $nickname ); ?>"
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
      ><?php echo esc_attr( $description ); ?></textarea>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'contactWay' ); ?>">联系方式:</label>
      <textarea 
        placeholder='<a href="xxxx"><i class="fa fa-envelope"></i></a>'
        id="<?php echo $this->get_field_id( 'contactWay' );?>"
        name="<?php echo $this->get_field_name( 'contactWay' ); ?>"
        value="<?php echo htmlentities( $contactWay ); ?>"
        rows="6" cols="50" 
        class="widefat code"
      ><?php echo $contactWay; ?></textarea>
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