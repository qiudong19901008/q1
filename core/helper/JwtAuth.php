<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuth{

  /**
   * @param int $uid 用户id
   * @param int $howLongExpire 多久过期
   * @param int $salt 盐
   */
  public static function generateToken(
    $uid, //用户id
    $howLongExpire, //多久过期 Unix时间戳
    $salt //盐
  ){

    $now = time();
    
    $payload = [
      "uid" => $uid,
      "iss" => 'hedaoshe.com',
      "isa" => $now,
      "nbf" => $now,
      "exp" => $now + $howLongExpire,
    ];

    return JWT::encode($payload, $salt, 'HS256');

  }
  

}