<?php


namespace hedao\dao;

class TagDao{

  /**
   * @description 获取标签信息
   * @param number $postId 
   * @param Boolean $first 是否只获取第一个
   * @return Array [id,name,slug,url,count] 
   */
  public static function getTagListByPostId($postId,$first=true){
    $tags = get_the_tags($postId);
    $res = [];
    if(!$tags){
      return $res;
    }
    foreach($tags as $tag){
      array_push($res,TagDao::_getNeededData($tag));
      if($first){
        break;
      }
    }
    return $res;
  }

  /**
   * @description 查询标签云降序排列
   * @param number $count 查询多少个标签
   * @param 'count' $orderBy 用什么排序,默认以数量排序
   * @param 'DESC'|'ASC' $order 排序方向,默认降序
   * @return Array [id,name,slug,url,count] 
   */
  public static function getTagList($count,$orderBy='count',$order='DESC'){
    $res = [];
    $tags = get_tags([
      'taxonomy' => 'post_tag',
      'hide_empty' => true, //隐藏空标签
      'number' => $count, 
      'orderby' => $orderBy, 
      'order' => $order,
    ]);
    foreach($tags as $tag){
      array_push($res,TagDao::_getNeededData($tag));
    }
    return $res;
  }

  /**
   * @description 获取自定义数据
   * @param WP_Term $tag 标签
   * @return array [id,name,slug,url,count]
   */
  private static function _getNeededData($tag){
    return [
      'id'=>$tag->term_id,
      'name'=>$tag->name,
      'slug'=>$tag->slug,
      'url'=>get_tag_link($tag->term_id),
      'count'=>$tag->count,
    ];
  }



}