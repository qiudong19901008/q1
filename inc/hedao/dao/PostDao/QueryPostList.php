<?php

namespace hedao\dao;

require_once plugin_dir_path(__FILE__) . './AssembleQueryArgs.php';
require_once plugin_dir_path(__FILE__) . './GetNeedData.php';

class QueryPostList{

  /**
   * @param array $categoryConditionList [categoryIdListIn:int[], categoryIdListAnd:int[], categoryIdListNotIn:int[], categorySlugListIn:string[], categorySlugListAnd:string[]]
   * @param array $tagConditionList [tagIdListIn:int[], tagIdListAnd:int[], tagIdListNotIn:int[], tagSlugListIn:string[], tagSlugListAnd:string[]]
   * @param array $authorConditionList [authorIdListIn:int[], authorIdListNotIn:int[], authorNickname:string]
   * @param array $authorConditionList [postIdListIn:int[], postIdListNotIn:int[]]
   * @param string $orderBy 'create_time'|'update_time'|'comment_count'|'rand'|$meta_key
   * @param string $order 'DESC'|'ASC'
   * @param int $page 
   * @param int $size 
   * @param array $includeTableNameList 包含的额外表名列表('author'|'category'|'meta'|'tag')[]
   * @param array $metaNameList string[]
   */
  public function run(
    $categoryConditionList,
    $tagConditionList,
    $authorConditionList,
    $postConditionList,
    $s,
    $orderBy,
    $order,
    $page,
    $size,
    $includeTableNameList=[],
    $metaNameList=[]
  ){
    //1. 组装args
    $args = AssembleQueryArgs::run(
      $categoryConditionList,
      $tagConditionList,
      $authorConditionList,
      $postConditionList,
      $s,
      $orderBy,
      $order,
      $page,
      $size
    );
    //2. 查询
    $query = new WP_Query($args);
    //3. 获取需要的数据
    $list = GetNeedData::run($query,$includeTableNameList,$metaNameList);
    $count = $query->found_posts;
    wp_reset_query();
    return [
      'list'=>$list,
      'count'=>$count,
    ];
  }


  

}

