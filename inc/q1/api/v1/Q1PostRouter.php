<?php


namespace q1\api\v1;

use hedao\core\TSingleton;
use hedao\core\BaseRouter;

use function hedao\lib\helper\{
  getPOSTValue,
}; 

use q1\service\PostService;



class Q1PostRouter extends BaseRouter{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_action( 'rest_api_init', function () {

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

  
      //给文章点赞
      register_rest_route( 'q1/v1', '/post/like', [
        'methods' => 'POST',
        'callback' => [$this,'likePostRouter'],
      ]);
    
    });
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

  public function likePostRouter($request){
    $postId = getPOSTValue('postId');
    $res = PostService::likePostById($postId);
    return [
      'likeCount' => $res
    ];
  }

}
