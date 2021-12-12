<?php

class CategoryDao{


   /**
   * @description 获取分类信息
   * @param number $postId
   * @param Boolean $first 是否只获取第一个
   * @return Array [id,name,slug,url]
   */
  public static function getCategoryList($postId,$first=true){
    $categories = get_the_category($postId);
    $res = [];
    if(!$categories){
      return $res;
    }
    foreach($categories as $category){
      $oneCategoryInfo = [
        'id'=>$category->term_id,
        'name'=>$category->name,
        'slug'=>$category->slug,
        'url'=>get_category_link($category->term_id),
      ];
      array_push($res,$oneCategoryInfo);
      if($first){
        break;
      }
    }
    return $res;
  }

 
}
