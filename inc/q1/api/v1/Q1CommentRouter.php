<?php


namespace q1\api\v1;

use hedao\core\TSingleton;
use hedao\dao\CommentDao;

use hedao\core\BaseRouter;

class Q1CommentRouter extends BaseRouter{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_action( 'rest_api_init', function () {

      register_rest_route( 'q1/v1', '/comment/list', [
        'methods' => 'GET',
        'callback' => [$this,'getCommentListRouter'],
      ]);

      register_rest_route( 'q1/v1', '/comment/add', [
        'methods' => 'POST',
        'callback' => [$this,'addOneCommentRouter'],
      ]);
    
    });
  }

  
  public function getCommentListRouter($request){
    $postId = $_GET["postId"];
    $page = $_GET["page"];
    $size = $_GET["size"];
    $res = CommentDao::query($postId,'comment_date','DESC',$page,$size);
    return $res;
  }

  public function addOneCommentRouter($request){
    $author = $_POST["author"];
    $content = $_POST["content"];
    $postId = $_POST["postId"];
    $parentId = $_POST["parentId"];

    $email = $_POST["email"];
    $url = $_POST["authorUrl"];
    $userId = $_POST["userId"]? $_POST["userId"]:0;
    $res = CommentDao::addOneComment($author,$content,$postId,$parentId,$email,$url,$userId);
    if($res){
      return [
        'errorCode'=>0,
        'msg'=>'评论成功!',
      ];
    }else{
      return [
        'errorCode'=>10001,
        'msg'=>'评论失败!',
      ];
    }
  }

  




}
