<?php


class PostMetaDao{

  /**
   * @description 根据文章id列表获取对应的postmeta列表
   * @param array $postIdList
   * @param array $keyList 包含的key值列表
   */
  public static function getPostMetaListByPostIdList($postIdList,$keyList=[]){
    global $wpdb;
    if(count($postIdList) == 0){
      return;
    }

    $postIdListStr = '('.implode(",", $postIdList).')';
    $sql = "
      select * from {$wpdb->prefix}postmeta 
      where 1=1 
      and post_id in {$postIdListStr}
    ";
    
    $sql = PostMetaDao::_addAppointMetaKeysCondition($sql,$keyList);
    return $wpdb->get_results($sql);
  } 

  private static function _addAppointMetaKeysCondition($sql,$keyList){
    if(count($keyList) == 0){
      return $sql;
    }
    $keyListStr = '(';
    foreach($keyList as $key){
      $keyListStr = $keyListStr . '"' .$key. '",';
    }
    $keyListStr = substr($keyListStr,0,-1) . ')';
    $sql = $sql . "    and meta_key in {$keyListStr} ";
    return $sql; 
  }



}

