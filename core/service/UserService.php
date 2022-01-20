<?php


namespace q1\service;

class UserService{

  /**
   * @param $username 用户名
   * @param $password 密码
   * @return int|false
   */
  public static function getUserId($username,$password){
    $user = wp_authenticate_username_password(null,$username,$password);
    if (is_wp_error($user)) {
      return false;
    }
    return $user->ID;
  }

}