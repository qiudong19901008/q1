<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';


class QueryPostList extends BasePostDao{

  // * @param number $categoryId 需要被查询的分类id,默认0不规定分类id
  //  * @param number $tagId 需要被查询的分类id,默认0不规定标签id
  //  * @param string s 需要被查询的搜索字段,默认''没有搜索字段

  /**
   * @description 查询文章
   * @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='',$categorySlug='',$tagSlug='']
   * @param Array $excludePostIdList 需要排除的文章id列表
   * @param Array $includePostIdList 需要包含的文章id列表
   * @param array ['author'|'category'|'meta'|'tag'] — $includeTableNameList 包含的额外表名列表
   * @param array $metaNameList — 额外字段的名字列表, 如果没有包含meta表则会忽略该选项, 留空数组也会忽略
   * @param 'create_time'|'update_time'|'rand' $orderBy 需要排序的字段 默认创建时间
   * @param 'ASC'|'DESC' 升序或降序,默认降序
   * @param int $page 页码
   * @param int $size 数量
   * @param string $orderByMetaKey 需要被排序的metaKey, 如果传入了$orderBy则会忽略该配置, 如果metaNameList没包含也会忽略
   * @return Array
   */
  public function run(
      $dynamicConditionList=[],
      $excludePostIdList=null,
      $includePostIdList=null,
      $includeTableNameList=[],
      $metaNameList=[],
      $orderBy='create_time',
      $order='DESC',
      $page=1,
      $size=10,
      $orderByMetaKey='',
  ){
    $res = [];
    $args = [
      'post__not_in'=>$excludePostIdList,
      'post__in'=>$includePostIdList,
      'post_type'=>'post',
      'post_status'=>'publish',
      'orderby'=>$this->_getOrderBy($orderBy),
      'order'=>$order,
      'offset'=>$this->_getoffset($page,$size),
      'posts_per_page'=>$size,
    ];
    $args = $this->_addDynamicCondition($dynamicConditionList,$args);
    $query = new WP_Query($args);
    $res = $this->getNeededData($query,$includeTableNameList,$metaNameList);
    if(QueryPostList::_isOrderByMeta($orderBy,$orderByMetaKey,$metaNameList)){
      $res = QueryPostList::_orderByMeta($res,$orderByMetaKey,$order);
    }
    $count = $query->found_posts;
    wp_reset_query();
    return [
      'list'=>$res,
      'count'=>$count,
    ];
  }

  private static function _isOrderByMeta($orderBy,$orderByMetaKey,$metaNameList){
    return empty($orderBy) && !empty($orderByMetaKey) && in_array($orderByMetaKey,$metaNameList);
  }


 

  /**
   *  @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='',$categorySlug='',$tagSlug='']
   */
  private function _addDynamicCondition($dynamicConditionList,$args){
    if(!empty($dynamicConditionList['categoryId'])){
      $args['cat'] = $dynamicConditionList['categoryId'];
    }
    if(!empty($dynamicConditionList['tagId'])){
      $args['tag_id'] = $dynamicConditionList['tagId'];
    }
    if(!empty($dynamicConditionList['s'])){
      $args['s'] = $dynamicConditionList['s'];
    }
    if(!empty($dynamicConditionList['categorySlug'])){
      $args['category_name'] = $dynamicConditionList['categorySlug'];
    }
    if(!empty($dynamicConditionList['tagSlug'])){
      $args['tag'] = $dynamicConditionList['tagSlug'];
    }
    return $args;
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
        $res = 'date';
        break;    
    }
    return $res;
  }

  /**
   * @param array $myPostList 存放了所有数据的postlist
   * @param string $orderByMetaKey
   * @param 'DESC'|'ASC' $order
   */
  private static function _orderByMeta($myPostList,$orderByMetaKey,$order){

  }

}