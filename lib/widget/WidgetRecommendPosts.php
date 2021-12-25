<?php


class WidgetRecommendPosts extends WP_Widget{

  function __construct() {
      parent::__construct(
        
        // Base ID of your widget
        'widget-recommend-posts', 
          
        // Widget name will appear in UI
        'q1-文章推荐',
          
        // Widget description
        [
          'description' => '根据评论量, 浏览量, 点赞数降序排列, 只能推荐某一种类别' 
        ],
      );
    }
      
    // Creating widget front-end
    public function widget( $args, $instance ) {
      echo $args['before_widget'];
      echo $this->_widget($instance);
      echo $args['after_widget'];
    }
              

    private function _widget($instance){
      
      $name = getValue($instance['name'],'推荐文章');
      $size = getValue($instance['size'],6);
      $type = getValue($instance['type'],'view');
      $postList = PostService::queryWidgetRecommendPostList($type,$size);
      if(count($postList) > 0){
        $postList = $this->_addPostMetaHtml($postList,$type);
        get_template_part('frontend/widget/widgetRecommendCard/widgetRecommendCard',null,[
          'name'=>$name,
          'postList'=>$postList,
        ]);
      }
  
    }

    private function _addPostMetaHtml($postList,$type){
      $res = [];
      foreach($postList as $post){
        $post['metaHtml'] = $this->_getMetaHtml($type,$post);
        array_push($res,$post);
      }
      return $res;
    }

    private function _getMetaHtml($type,$post){
        $meta = $post['meta'];
        $text = '';
        switch($type){
          case 'view':
            $viewCount = $meta[Fields::Q1_FIELD_POST_VIEW_COUNT];
            $text = '浏览('.$viewCount.')';
            break;
          case 'comment':
            $text = '评论('.$post['commentCount'].')';
            break;
          case 'like':
            $likeCount = $meta[Fields::Q1_FIELD_POST_LIKE_COUNT];
            $text = '点赞('.$likeCount.')';
            break;
        }
        return '<span>'.$text.'</span>';
    }

    // Widget Backend 
    public function form( $instance ) {
      $name = getValue($instance['name'],'推荐文章');
      $size = getValue($instance['size'],6);
      $type = getValue($instance['type'],'like');
    ?>
    
    <p>
      <label for="<?php echo $this->get_field_id( 'name' ); ?>">标题:</label>
      <input 
        type="text" 
        id="<?php echo $this->get_field_id( 'name' );?>"
        name="<?php echo $this->get_field_name( 'name' ); ?>" 
        value="<?php echo esc_attr( $name ); ?>"
        class="widefat"
      >
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'size' ); ?>">文章数量:</label>
      <input 
        type="text" 
        id="<?php echo $this->get_field_id( 'size' );?>"
        name="<?php echo $this->get_field_name( 'size' ); ?>" 
        value="<?php echo esc_attr( $size ); ?>"
        class="widefat"
      >
    </p>
    <p>
    
      <input 
        type="radio" 
        id="view" 
        name="<?php echo $this->get_field_name( 'type' ); ?>" 
        value="view"
        <?php echo $type == 'view'?'checked':'' ?>
      >
      <label for="view">浏览量</label>

      <input 
        type="radio" 
        id="comment" 
        name="<?php echo $this->get_field_name( 'type' ); ?>" 
        value="comment"
        <?php echo $type == 'comment'?'checked':'' ?>
      >
      <label for="comment">评论数</label>

      <input 
        type="radio" 
        id="like" 
        name="<?php echo $this->get_field_name( 'type' ); ?>" 
        value="like"
        <?php echo $type == 'like'?'checked':'' ?>
      >
      <label for="like">点赞数</label>
      
    </p>
   
    <?php 
    }
          
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
      $instance = array();
      $instance['name'] =  strip_tags($new_instance['name']);
      $instance['size'] =  strip_tags($new_instance['size']);
      $instance['type'] =  $new_instance['type'];
      return $instance;
    }



    

}

