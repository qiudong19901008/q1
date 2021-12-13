<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';
require_once plugin_dir_path(__FILE__) . './QueryPostListByCategoryId.php';
require_once plugin_dir_path(__FILE__) . './QueryRecommendPostList.php';

class PostDao extends BasePostDao{

   /**
   * @description 查询文章
   * @param number $categoryId 需要被查询的分类id
   * @param Array $excludePostIdList 需要排除的文章id列表
   * @param 'create_time'|'update_time'|'rand' $orderBy 需要排序的字段 默认创建时间
   * @param 'ASC'|'DESC' 升序或降序,默认降序
   * @param int $page 页码
   * @param int $size 数量
   * @return Array [id,title,url]
   */
  public static function queryPostListByCategoryId($categoryId,$excludePostIdList,$orderBy='create_time',$order='DESC',$page=1,$size=10){
    $querier = new QueryPostListByCategoryId();
    return $querier->run($categoryId,$excludePostIdList,$orderBy,$order,$page,$size);
  }


  /**
   * @description 根据like、view、comment降序获取文章
   * @param 'like'|'view'|'comment' $type
   * @param number $size
   */
  public static function queryRecommendPostList($type,$size){
    $querier = new QueryRecommendPostList();
    return $querier->run($type,$size);
  }


  

    




  


}

