<?php

class QueryPostListByCategoryId{


  /**
   * @description 查询文章
   * @param number $categoryId 需要被查询的分类id
   * @param Array $excludePostIdList 需要排除的文章id列表
   * @param 'create_time'|'update_time'|'rand' $orderBy 需要排序的字段 默认创建时间
   * @param 'ASC'|'DESC' 升序或降序,默认降序
   * @param int $page 页码
   * @param int $size 数量
   * @return Array
   */
  public function run($categoryId,$excludePostIdList,$orderBy='create_time',$order='DESC',$page=1,$size=10){
    $res = [];
    $args = [
      'cat'=>$categoryId, //分类id
      'post__not_in'=>$excludePostIdList,
      'post_type'=>'post',
      'post_status'=>'publish',
      'orderby'=>$this->_getOrderBy($orderBy),
      'order'=>$order,
      'offset'=>$this->_getoffset($page,$size),
      'posts_per_page'=>$size,
    ];
    $query = new WP_Query($args);
    if(!$query->have_posts()){
      return $res;
    }
    while($query->have_posts()){
      $query->the_post();
      $post = [
        'id'=>get_the_ID(),
        'title'=>get_the_title(),
        'url'=>get_the_permalink(),
      ];
      array_push($res,$post);
    }
    wp_reset_query();
    return $res;
  }

  private function _getoffset($page,$size){
    return ($page-1)*$size;    
  }

  private function _getOrderBy($orderBy){
    $res = '';
    switch($orderBy){
      case 'update_time':
        $res = 'modified';
        break;
      case 'rand':
        $res = 'rand';
        break;
      case 'create_time':
      default:
        $res = 'date';
    }
    return $res;
  }

}