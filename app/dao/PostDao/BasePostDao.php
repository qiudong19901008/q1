<?php


class BasePostDao{

  /**
   * @param WP_Query $query 
   * @param array['likeCount'|'viewCount'|'commentCount'] $extendFieldList 包含额外的字段,主要是怕sql查询次数太多,没必要则不包含这些字段
   */
  protected function getNeededData($query,$extendFieldList=[]){
    $res = [];
    if(!$query->have_posts()){
      return $res;
    }
    while($query->have_posts()){
      $query->the_post();
      $post = [
        'id'=>get_the_ID(),
        'title'=>get_the_title(),
        'url'=>get_the_permalink(),
        'thumbnail'=>get_the_post_thumbnail(),
        'create_time'=>get_the_time('Y-m-d'),
      ];
      $post = $this->_injectExtendFields($post,$extendFieldList);
      array_push($res,$post);
    }
    return $res;
  }

  private function _injectExtendFields($post,$extendFieldList){
    foreach($extendFieldList as $extendField){
      if($extendField === 'likeCount'){
        $post['likeCount'] = BasePostDao::getPostLikeCount(get_the_ID());
        continue;
      }
      if($extendField === 'viewCount'){
        $post['viewCount'] = BasePostDao::getPostViewCount(get_the_ID());
        continue;
      }
      if($extendField === 'commentCount'){
        $post['commentCount'] = BasePostDao::getPostCommentCount(get_the_ID());
        continue;
      }
    }
    return $post;
  }

  /**
   * @description 获取文章评论数量
   */
  public static function getPostCommentCount($post_id){
    return wp_count_comments($post_id)->total_comments;
  }

  /**
   * @description 获取文章浏览量
   */
  public static function getPostViewCount($post_id){
    $count = get_post_meta( $post_id, Fields::COUNT_POST_VIEW, true );
    return !empty($count)?$count:0;
  }

  /**
   * @description 获取文章点赞数量
   */
  public static function getPostLikeCount($post_id){
    $count = get_post_meta( $post_id, Fields::COUNT_POST_LIKE, true );
    return !empty($count)?$count:0;
  }

}