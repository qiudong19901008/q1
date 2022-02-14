<?php

namespace hedao\lib\exceptions;

use hedao\lib\constant\ErrorCodes;


class UserLoginFailed{

  public function __construct($msg='用户名密码错误!'){
    $res = [
      'errorCode'=>ErrorCodes::HEDAO_USER_LOGIN_FAILED,
      'msg'=>$msg,
    ];
    new \WP_REST_Response($res,401);
  }
}

class TokenInvalid{

  public function __construct($msg='令牌无效!'){
    $res = [
      'errorCode'=>ErrorCodes::HEDAO_TOKEN_INVALID,
      'msg'=>$msg,
    ];
    new \WP_REST_Response($res,401);
  }
}

class Success{

  public function __construct($msg='操作成功!'){
    $res = [
      'errorCode'=>0,
      'msg'=>$msg,
    ];
    new \WP_REST_Response($res,200);
  }

}