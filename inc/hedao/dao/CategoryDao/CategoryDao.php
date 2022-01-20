<?php

namespace hedao\dao;

require_once plugin_dir_path(__FILE__) . './BaseCategoryDao.php';
require_once plugin_dir_path(__FILE__) . './QueryCategoryList.php';


class CategoryDao extends BaseCategoryDao{


  /**
   * @description 查询分类列表
   * @param number $page
   * @param number $size
   */
  public static function queryCategoryList(
    $page=1,
    $size=10
  ){
    $querier = new QueryCategoryList();
    $res = $querier->run($page,$size);
    return $res;
  }
  


   /**
   * @description 获取分类信息
   * @param number $postId
   * @param Boolean $first 是否只获取第一个
   * @return Array [id,name,slug,url]
   */
  public static function getCategoryListByPostId($postId,$first=true){
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
        'url'=>get_category_link($category),
      ];
      array_push($res,$oneCategoryInfo);
      if($first){
        break;
      }
    }
    return $res;
  }

 
}
