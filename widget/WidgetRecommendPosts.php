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

        ?>
      
        <div class="widget-recommend-posts-container radius">
          <h2 class="title"><?php echo $name; ?></h2>
          <div class="post-list">
          <?php
            $query = queryPostDesc( $type,$size );

            if( $query->have_posts()):
              while($query->have_posts()):
                $query->the_post();
                ?>
                
                  <div class="post">
                    <a class="thumbnail" href="<?php the_permalink()?>">
                      <img src="<?php the_post_thumbnail() ?>" alt="">
                    </a>
                    <div class="info">
                      <div class="meta">
                        <time><?php the_time('Y-m-d')?></time>
                        <?php echo getRecommendArticleMetaHtmlByType($type) ?>
                      </div>
                      <a href="<?php the_permalink()?>">
                        <?php the_title(); ?>
                      </a>
                    </div>
                  </div>

                <?php
              
              endwhile;
              wp_reset_query();
            endif;
          ?>

          </div>
        </div>
  
        <?php
  
    }

    // Widget Backend 
    public function form( $instance ) {
      $name = getValue($instance['name'],'推荐文章');
      $size = getValue($instance['size'],6);
      $type = getValue($instance['type'],'view');
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
        <?php echo $type === 'view'?'checked':'' ?>
      >
      <label for="view">浏览量</label>

      <input 
        type="radio" 
        id="comment" 
        name="<?php echo $this->get_field_name( 'type' ); ?>" 
        value="comment"
        <?php echo $type === 'comment'?'checked':'' ?>
      >
      <label for="comment">评论数</label>

      <input 
        type="radio" 
        id="like" 
        name="<?php echo $this->get_field_name( 'type' ); ?>" 
        value="like"
        <?php echo $type === 'like'?'checked':'' ?>
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
      $instance['type'] =  strip_tags($new_instance['type']);
      return $instance;
    }

}

