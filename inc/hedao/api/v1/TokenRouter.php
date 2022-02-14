<?php


use hedao\core\TSingleton;
use hedao\lib\exceptions\Success;
use hedao\lib\exceptions\TokenInvalid;
use hedao\lib\exceptions\UserLoginFailed;
use hedao\service\UserService;
use const hedao\config\{
  TOKEN_SALT,
  TOKEN_EXPIRE_SECONDS,
};

use function hedao\lib\helper\generateToken;
use function hedao\lib\helper\getPOSTValue;
use function hedao\lib\helper\getUidFromToken;

class TokenRouter{

  use TSingleton;

  protected function __construct()
  {
    $this->init();
  }

  protected function init(){
    add_action( 'rest_api_init', function () {
      //获取token
      register_rest_route( 'hedao/v1', '/token/get', [
        'methods' => 'POST',
        'callback' => [$this,'getTokenRouter'],
      ]);

      //验证token
      register_rest_route( 'hedao/v1', '/token/verify', [
        'methods' => 'POST',
        'callback' => [$this,'verifyTokenRouter'],
      ]);
    });
  }

  /**
   * 1. 获取用户id
   * 2. 根据id获取token
   */
  public function getTokenRouter($request){
    $username = getPOSTValue('username');
    $password = getPOSTValue('password');
    $userId = UserService::getUserIdByUsernameAndPassword($username,$password);
    if(!$userId){
      new UserLoginFailed();
    }
    return generateToken($userId,TOKEN_EXPIRE_SECONDS,TOKEN_SALT); //包含了token和过期时间
  }

 
  public function verifyTokenRouter($request){
    $token = getPOSTValue('token');
    $uid = getUidFromToken($token,TOKEN_SALT);
    if($uid == 0){
      new TokenInvalid();
    }else{
      new Success();
    }
  }


}