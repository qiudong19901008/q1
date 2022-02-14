<?php

use const hedao\config\TOKEN_SALT;

use function hedao\lib\helper\getBasicToken;
use function hedao\lib\helper\getUidFromToken;

class BaseRouter{



  /**
   * @description 拦截不合格的请求,并且给请求实体设置数据
   * @param \WP_REST_Request request 请求实体, 自动传入
   */
  public function interceptIllegalRequest($request){
    $token = getBasicToken($request,':');
    $uid = getUidFromToken($token,TOKEN_SALT);
    if($uid == 0){
      return false;
    }
    $request->set_header('uid',$uid);
    return true;
  }

}