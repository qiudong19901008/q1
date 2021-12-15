<?php


class UserDao{

  /**
   * @description 根据用户id列表获取对应的用户列表
   * @param array $userIdList
   */
  public static function getUserListByUserIdList($userIdList){
    global $wpdb;
    if(count($userIdList) == 0){
      return;
    }

    $userIdListStr = '('.implode(",", $userIdList).')';
    $sql = "
      select * from {$wpdb->prefix}users 
      where 1=1 
      and ID in {$userIdListStr}
    ";
    return $wpdb->get_results($sql);
  }

}