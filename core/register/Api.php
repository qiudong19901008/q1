<?php


namespace q1\register;

use hedao\TSingleton;
use q1\constant\ErrorCodes;
use q1\service\PostService;
use q1\service\UserService;

use const q1\config\{
  TOKEN_SALT,
  TOKEN_EXPIRE_SECONDS,
};

class Api{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_action( 'rest_api_init', function () {

      //获取token
      register_rest_route( 'q1/v1', '/token/get', [
        'methods' => 'POST',
        'callback' => [$this,'getTokenRouter'],
      ]);

      //验证token
      register_rest_route( 'q1/v1', '/token/verify', [
        'methods' => 'POST',
        'callback' => [$this,'verifyTokenRouter'],
      ]);

      //添加一篇文章
      register_rest_route( 'q1/v1', '/post/add', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'addOnePostRouter'],
      ]);
      //添加多篇文章
      register_rest_route( 'q1/v1', '/post/addList', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'addListPostRouter'],
      ]);
      //更新一篇文章
      register_rest_route( 'q1/v1', '/post/update', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'updateOnePostRouter'],
      ]);
      //更新多篇文章
      register_rest_route( 'q1/v1', '/post/updateList', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'updateListPostRouter'],
      ]);
      //删除一篇文章
      register_rest_route( 'q1/v1', '/post/delete', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'deleteOnePostRouter'],
      ]);
      //删除多篇文章
      register_rest_route( 'q1/v1', '/post/deleteList', [
        'methods' => 'POST',
        'permission_callback' => [$this,'interceptIllegalRequest'],
        'callback' => [$this,'deleteListPostRouter']
      ]);

      //查询分类列表
      register_rest_route( 'q1/v1', '/category/list', [
        'methods' => 'GET',
        'callback' => [$this,'queryCategoryListRouter'],
      ]);
    
    });
  }

  public function interceptIllegalRequest($request){
    $token = getBasicToken($request,':');
    $uid = getUidFromToken($token,TOKEN_SALT);
    if($uid == 0){
      return false;
    }
    $request->set_header('uid',$uid);
    return true;
  }


  /**
   * 1. 获取用户id
   * 2. 根据id获取token
   */
  public function getTokenRouter($request){
    $username = getPOSTValue('username');
    $password = getPOSTValue('password');
    $userId = UserService::getUserId($username,$password);
    if(!$userId){
      $data = json_encode([
        'errorCode'=>ErrorCodes::Q1_ERRCODE_USER_LOGIN_FAILED,
        'msg'=>'用户名密码错误!',
      ]);
      return new \WP_REST_Response($data,401);
    }
    $res = generateToken($userId,TOKEN_EXPIRE_SECONDS,TOKEN_SALT);
    return new \WP_REST_Response($res,200);

  }

  public function verifyTokenRouter($request){
    $token = getPOSTValue('token');
    $uid = getUidFromToken($token,TOKEN_SALT);
    if($uid == 0){
      $data = json_encode([
        'errorCode'=>ErrorCodes::Q1_ERRCODE_USER_TOKEN_INVALID,
        'msg'=>'token失效!',
      ]);
      return new \WP_REST_Response($data,401);
    }else{
      return json_encode([
        'errorCode'=>0,
        'msg'=>'',
      ]);
    }
  }

  public function addOnePostRouter($request){
    $uid = $request->get_header('uid');
    $list = getPOSTValue('list');
    $postIdList = PostService::addOne($list[0],$uid);
    return [
      'postIdList'=>$postIdList
    ];
  }



  /**
   * @param \WP_REST_Request $request
   */
  public function addListPostRouter($request){
    $uid = $request->get_header('uid');
    $list = getPOSTValue('list');
    $postIdList = PostService::addList($list,$uid);
    return [
      'postIdList'=>$postIdList
    ];
  }
  
  public function updateOnePostRouter($request){
    $uid = $request->get_header('uid');
    $list = getPOSTValue('list');
    $postId = PostService::updateOne($list[0],$uid);
    return [
      'postIdList'=>[$postId],
    ];
  }
  
  public function updateListPostRouter($request){
    $uid = $request->get_header('uid');
    $list = getPOSTValue('list');
    $postIdList = PostService::updateList($list,$uid);
    return [
      'postIdList'=>$postIdList
    ];
  }
  
  
  public function deleteOnePostRouter($request){
    $uid = $request->get_header('uid');
    $list = getPOSTValue('list');
    $zeroOrOneList = PostService::deleteList($list,$uid);
    return [
      'zeroOrOneList'=>$zeroOrOneList,
    ];
  }
  
  public function deleteListPostRouter($request){
    $uid = $request->get_header('uid');
    $list = getPOSTValue('list');
    $zeroOrOneList = PostService::deleteList($list,$uid);
    return [
      'zeroOrOneList'=>$zeroOrOneList
    ];
  }
  

  /////////////////////CATEGORY////////////////////////
  public function queryCategoryListRouter(){
    
    // $req->get_header('')
    $page = getGETValue('page',1);
    $size = getGETValue('size',10);
    $res = \CategoryDao::queryCategoryList($page,$size);
    return json_encode($res);
  }




}
