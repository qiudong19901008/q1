<?php

require_once plugin_dir_path(__FILE__) . './BasePostDao.php';


class QueryPostList extends BasePostDao{

  // * @param number $categoryId 需要被查询的分类id,默认0不规定分类id
  //  * @param number $tagId 需要被查询的分类id,默认0不规定标签id
  //  * @param string s 需要被查询的搜索字段,默认''没有搜索字段

  /**
   * @description 查询文章
   * @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='']
   * @param Array $excludePostIdList 需要排除的文章id列表
   * @param 'create_time'|'update_time'|'rand' $orderBy 需要排序的字段 默认创建时间
   * @param 'ASC'|'DESC' 升序或降序,默认降序
   * @param int $page 页码
   * @param int $size 数量
   * @return Array
   */
  public function run(
      $dynamicConditionList=[],
      $excludePostIdList,
      $orderBy='create_time',
      $order='DESC',
      $page=1,
      $size=10
  ){

    $res = [];
    $args = [
      // 'cat'=>$categoryId, //分类id
      'post__not_in'=>$excludePostIdList,
      'post_type'=>'post',
      'post_status'=>'publish',
      'orderby'=>$this->_getOrderBy($orderBy),
      'order'=>$order,
      'offset'=>$this->_getoffset($page,$size),
      'posts_per_page'=>$size,
    ];
    $args = $this->_addDynamicCondition($dynamicConditionList,$args);
    $query = new WP_Query($args);
    $res = $this->getNeededData($query,['likeCount','viewCount','commentCount']);
    wp_reset_query();
    return $res;
  }

  /**
   *  @param Array $dynamicConditionList [$categoryId=0,$tagId=0,$s='']
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
      default:
        $res = 'date';
    }
    return $res;
  }

}