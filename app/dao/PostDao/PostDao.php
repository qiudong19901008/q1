<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';
require_once plugin_dir_path(__FILE__) . './QueryPostList.php';


class PostDao extends BasePostDao{

 


  /**
   * @description 查询文章
   * @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='',$categorySlug='',$tagSlug='']
   * @param Array $excludePostIdList 需要排除的文章id列表
   * @param Array $includePostIdList 需要包含的文章id列表
   * @param array ['author'|'category'|'meta'|'tag']— $includeTableNameList 包含的额外表名列表
   * @param array $metaNameList — 额外字段的名字列表, 如果没有包含meta表则会忽略该选项
   * @param 'create_time'|'update_time'|'rand' $orderBy 需要排序的字段 默认创建时间
   * @param 'ASC'|'DESC' 升序或降序,默认降序
   * @param int $page 页码
   * @param int $size 数量
   * @param string $orderByMetaKey 需要被排序的metaKey, 如果传入了$orderBy则会忽略该配置, 如果metaNameList没包含也会忽略
   * @return Array
   */
  public static function queryPostList(
      $dynamicConditionList,
      $excludePostIdList=null,
      $includePostIdList=null,
      $includeTableNameList=[],
      $metaNameList=[],
      $orderBy='create_time',
      $order='DESC',
      $page=1,
      $size=10,
      $orderByMetaKey=''
    ){

    $querier = new QueryPostList();
    return $querier->run(
      $dynamicConditionList,
      $excludePostIdList,
      $includePostIdList,
      $includeTableNameList,
      $metaNameList,
      $orderBy,
      $order,
      $page,
      $size,
      $orderByMetaKey,
    );
  }


  

    




  


}

