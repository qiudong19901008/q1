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
use function hedao\lib\helper\interceptIllegalRequest;

class PostRouter{

  use TSingleton;

  protected function __construct()
  {
    $this->init();
  }

  protected function init(){
    add_action( 'rest_api_init', function () {
      //添加一篇文章
      register_rest_route( 'hedao/v1', '/post/add', [
        'methods' => 'POST',
        'permission_callback' => 'interceptIllegalRequest',
        'callback' => [$this,'addOnePostRouter'],
      ]);
      //添加多篇文章
      register_rest_route( 'hedao/v1', '/post/addList', [
        'methods' => 'POST',
        'permission_callback' => 'interceptIllegalRequest',
        'callback' => [$this,'addListPostRouter'],
      ]);
      // //更新一篇文章
      // register_rest_route( 'hedao/v1', '/post/update', [
      //   'methods' => 'PUT',
      //   'permission_callback' => 'interceptIllegalRequest',
      //   'callback' => [$this,'updateOnePostRouter'],
      // ]);
      // //更新多篇文章
      // register_rest_route( 'hedao/v1', '/post/updateList', [
      //   'methods' => 'PUT',
      //   'permission_callback' => 'interceptIllegalRequest',
      //   'callback' => [$this,'updateListPostRouter'],
      // ]);
      // //查询文章列表
      // //to do
      // //删除多篇文章
      // register_rest_route( 'hedao/v1', '/post/deleteList', [
      //   'methods' => 'DELETE',
      //   'permission_callback' => [$this,'interceptIllegalRequest'],
      //   'callback' => [$this,'deleteListPostRouter']
      // ]);
    });
  }




  public function addOnePostRouter($request){
    $uid = $request->get_header('uid');
    //必填
    $title = getPOSTValue('title');
    $categoryIdList = getPOSTValue('categoryIdList');
    //可选
    $content = getPOSTValue('content','');
    $status = getPOSTValue('status','publish');
    $tagIdList = getPOSTValue('tagIdList');
    $create_time = getPOSTValue('create_time');
    $id = getPOSTValue('id');

    //附加
    $downloadUrl = getPOSTValue('downloadUrl','');
    $downloadPassword = getPOSTValue('downloadPassword','');
    $unpackPassword = getPOSTValue('unpackPassword','');

    $keywords = getPOSTValue('keywords');
    $description = getPOSTValue('description');
    
    

    
    
    
    $id = getPOSTValue('id');
    // $id = $one['id'];
    // $title = $one['title'];
    // $content = $one['content'];
    // $authorId = $uid;
    // $categoryIdList = $one['categoryIdList'];
    // $tagIdList = $one['tagIdList'];
    // $description = $one['description'];
    // $keywords = $one['keywords'];
    // $status = $one['status'];
    // $create_time = $one['create_time'];
    // $list = getPOSTValue('id');
    // $postIdList = PostService::addOne($list[0],$uid);
    // return [
    //   'postIdList'=>$postIdList
    // ];
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
  
  // public function updateOnePostRouter($request){
  //   $uid = $request->get_header('uid');
  //   $list = getPOSTValue('list');
  //   $postId = PostService::updateOne($list[0],$uid);
  //   return [
  //     'postIdList'=>[$postId],
  //   ];
  // }
  
  // public function updateListPostRouter($request){
  //   $uid = $request->get_header('uid');
  //   $list = getPOSTValue('list');
  //   $postIdList = PostService::updateList($list,$uid);
  //   return [
  //     'postIdList'=>$postIdList
  //   ];
  // }
  
  
  // public function deleteOnePostRouter($request){
  //   $uid = $request->get_header('uid');
  //   $list = getPOSTValue('list');
  //   $zeroOrOneList = PostService::deleteList($list,$uid);
  //   return [
  //     'zeroOrOneList'=>$zeroOrOneList,
  //   ];
  // }
  
  // public function deleteListPostRouter($request){
  //   $uid = $request->get_header('uid');
  //   $list = getPOSTValue('list');
  //   $zeroOrOneList = PostService::deleteList($list,$uid);
  //   return [
  //     'zeroOrOneList'=>$zeroOrOneList
  //   ];
  // }
  


}