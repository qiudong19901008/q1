<?php


class TagDao{

/**
 * @description 获取标签信息
 * @param number $postId
 * @param Boolean $first 是否只获取第一个
 * @return Array [id,name,slug,url] 
 */
public static function getTagList($postId,$first=true){
  $tags = get_the_tags($postId);
  $res = [];
  if(!$tags){
    return $res;
  }
  foreach($tags as $tag){
    $oneTagInfo = [
      'id'=>$tag->term_id,
      'name'=>$tag->name,
      'slug'=>$tag->slug,
      'url'=>get_tag_link($tag->term_id),
      // 'url'=>
    ];
    array_push($res,$oneTagInfo);
    if($first){
      break;
    }
  }
  return $res;
}


}