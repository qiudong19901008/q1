<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';

class QueryRecommendPostList extends BasePostDao{

  /**
   * @description 根据like、view、comment降序获取文章
   * @param 'like'|'view'|'comment' $type 显示的文章类型
   * @param number $size 显示的文章数量
   */
  public function run($type,$size){
    $arg = []; //wp_query的参数
    switch($type){
      case 'view':
        $arg = [
          'posts_per_page'	=> $size,
          'meta_key'			=> Fields::COUNT_POST_VIEW,
          'orderby'			=> 'meta_value_num',
          'order' => 'DESC',
        ];
        break;
      case 'comment':
        $arg = [
          'posts_per_page'	=> $size,
          'orderby'			=> 'comment_count',
          'order'				=> 'DESC',
        ];
        break;
      case 'like':
        $arg = [
          'posts_per_page'	=> $size,
          'meta_key'			=> Fields::COUNT_POST_LIKE,
          'orderby'			=> 'meta_value_num',
          'order' => 'DESC',
        ];
        break;
    }
    $query = new WP_Query($arg);
    
    $res = $this->_getNeededData($query);
    // $res = $this->getNeededData($query,['meta'],[
    //   Fields::COUNT_POST_LIKE,
    //   Fields::COUNT_POST_VIEW,
    // ]);
    wp_reset_query();
    return $res;
  }

  
  private function _getNeededData($query){
    global $post;
    $originGlobalPost = $post;
    $res = [];
    if(!$query->have_posts()){
      return $res;
    }
    while($query->have_posts()){
      $query->the_post();

      $myPost = [
        // 'id'=>get_the_ID(),
        // 'title'=>get_the_title(),
        // 'url'=>get_the_permalink(),
        // 'thumbnail'=>get_the_post_thumbnail(),
        // 'excerpt'=>get_the_excerpt(),
        // 'content'=>get_the_content(),
        // 'update_time'=>get_the_modified_time('Y-m-d h:i:s'),
        // 'create_time'=>get_the_time('Y-m-d h:i:s'),
        // 'create_date'=>get_the_time('Y-m-d'),
        // 'commentCount'=>$post->comment_count,
        // 'authorId'=>$post->post_author,
        
      ];
      array_push($res,$post);
    }
    $post = $originGlobalPost;
    return $res;
  }




}