<?php

namespace hedao\lib\exceptions;

use hedao\lib\constant\ErrorCodes;


class UserLoginFailed extends \WP_REST_Response{

  public function __construct($msg='用户名密码错误!'){
    
    $data = [
      'errorCode'=>ErrorCodes::HEDAO_USER_LOGIN_FAILED,
      'msg'=>$msg,
    ];
    parent::__construct($data,401);
  }
}

class TokenInvalid extends \WP_REST_Response{

  public function __construct($msg='令牌无效!'){
    $data = [
      'errorCode'=>ErrorCodes::HEDAO_TOKEN_INVALID,
      'msg'=>$msg,
    ];
    parent::__construct($data,401);
    // return new \WP_REST_Response($res,401);
  }
}

class InsertPostFailed extends \WP_REST_Response{

  public function __construct($msg='插入文章失败!'){
    $data = [
      'errorCode'=>ErrorCodes::HEDAO_TOKEN_INVALID,
      'msg'=>$msg,
    ];
    parent::__construct($data,400);
    // new \WP_REST_Response($res,400);
  }
}

class UpdatePostFailed extends \WP_REST_Response{

  public function __construct($msg='更新文章失败!'){
    $data = [
      'errorCode'=>ErrorCodes::HEDAO_UPDATE_POST_FAILED,
      'msg'=>$msg,
    ];
    parent::__construct($data,400);
    // new \WP_REST_Response($res,400);
  }
}

class DeletePostFailed extends \WP_REST_Response{

  public function __construct($msg='删除文章失败!'){
    $data = [
      'errorCode'=>ErrorCodes::HEDAO_DELETE_POST_FAILED,
      'msg'=>$msg,
    ];
    parent::__construct($data,400);
    // new \WP_REST_Response($res,400);
  }
}

class DeletePostListFailed extends \WP_REST_Response{

  public function __construct($msg='其中有!'){
    $data = [
      'errorCode'=>ErrorCodes::HEDAO_UPDATE_POST_FAILED,
      'msg'=>$msg,
    ];
    parent::__construct($data,400);
    // new \WP_REST_Response($res,400);
  }
}

class Success extends \WP_REST_Response{

  public function __construct($msg='操作成功!'){
    $data = [
      'errorCode'=>0,
      'msg'=>$msg,
    ];
    parent::__construct($data,200);
  }

}