<?php


namespace q1\register;

use q1\constant\Actions;
use q1\constant\Fields;
use q1\constant\ErrorCodes;

use hedao\TSingleton;
use q1\service\PostService;

class Ajax{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    //拉取评论
    add_action('wp_ajax_nopriv_' . Actions::Q1_ACTION_COMMENT_GET_COMMENT_LIST, [$this,'getCommentListAjax']);
    add_action('wp_ajax_' . Actions::Q1_ACTION_COMMENT_GET_COMMENT_LIST, [$this,'getCommentListAjax']);
    //添加评论
    add_action('wp_ajax_nopriv_' . Actions::Q1_ACTION_COMMENT_ADD_ONE_COMMENT, [$this,'addOneCommentAjax']);
    add_action('wp_ajax_' . Actions::Q1_ACTION_COMMENT_ADD_ONE_COMMENT, [$this,'addOneCommentAjax']);
    //文章点赞
    add_action('wp_ajax_nopriv_' . Actions::Q1_ACTION_POST_LIKE_POST, [$this,'likePostRouter']);
    add_action('wp_ajax_' . Actions::Q1_ACTION_POST_LIKE_POST, [$this,'likePostRouter']);
    //拉取文章列表
    add_action('wp_ajax_nopriv_' . Actions::Q1_ACTION_POST_GET_POST_LIST, [$this,'getPostListRouter']);
    add_action('wp_ajax_' . Actions::Q1_ACTION_POST_GET_POST_LIST, [$this,'getPostListRouter']);
  }

 /**
 * @description 拉取评论
 * @method GET
 */
public function getCommentListAjax(){
  $postId = $_GET["postId"];
  $page = $_GET["page"];
  $size = $_GET["size"];
  $res = \CommentDao::query($postId,'comment_date','DESC',$page,$size);
  json($res);
}

/**
 * @description 添加一条评论
 * @method POST
 */
public function addOneCommentAjax(){
  $author = $_POST["author"];
  $content = $_POST["content"];
  $postId = $_POST["postId"];
  $parentId = $_POST["parentId"];

  $email = $_POST["email"];
  $url = $_POST["authorUrl"];
  $userId = $_POST["userId"]? $_POST["userId"]:0;
  $res = \CommentDao::addOneComment($author,$content,$postId,$parentId,$email,$url,$userId);
  if($res){
    success('添加评论成功!');
  }else{
    failed('添加评论失败!',ErrorCodes::Q1_ERRCODE_COMMENT_SUBMIT_COMMENT_FAILED);
  }
}

/**
 * @description 给文章点赞
 * @method POST
 */
public function likePostRouter(){
  $id = $_POST["postId"];
  $likeCount = PostService::likePostById($id);
  json([
    'likeCount'=>$likeCount,
  ]);
}


/**
 * @description 请求分类文章列表
 * @method GET
 */
public function getPostListRouter(){
  $orderBy = $_GET["orderBy"]?$_GET["orderBy"]:'create_time';
  $page = $_GET["page"];
  $size = $_GET["size"];
  $dynamicConditionList = [
    'categoryId'=>$_GET["categoryId"],
    'tagId'=>$_GET["tagId"],
    's'=>$_GET["s"],
    'categorySlug'=>$_GET["categorySlug"],
    'tagSlug'=>$_GET["tagSlug"],
  ];

  // $res = \PostDao::queryPostList(
  //     $dynamicConditionList,
  //     null,
  //     null,
  //     null,
  //     ['meta','author','category'],
  //     [
  //       Fields::Q1_FIELD_POST_LIKE_COUNT,
  //       Fields::Q1_FIELD_POST_VIEW_COUNT,
  //     ],
  //     $orderBy,
  //     'DESC',
  //     $page,
  //     $size
  // );

  $res = \PostDao::queryPostList(
    [
      'categoryIdListIn'=>[$_GET["categoryId"]],
      'categorySlugListIn'=>[$_GET["categorySlug"]]
    ],
    [
      'tagIdListIn'=>[$_GET["tagId"]],
      'tagSlugListIn'=>[$_GET["tagSlug"]]
    ],
    [],
    [],
    $_GET["s"],
    $orderBy,
    'DESC',
    $page,
    $size,
    ['meta','author','category'],
    [
      Fields::Q1_FIELD_POST_LIKE_COUNT,
      Fields::Q1_FIELD_POST_VIEW_COUNT,
    ]
  );

  $res['list'] = PostService::correctPostListThumbnail($res['list']);

  json(
    [
      [
        'categoryIdListIn'=>[$_GET["categoryId"]],
        'categorySlugListIn'=>[$_GET["categorySlug"]]
        ],
        [
          'tagIdListIn'=>[$_GET["tagId"]],
          'tagSlugListIn'=>[$_GET["tagSlug"]]
        ],
        [],
        [],
        $_GET["s"],
        $orderBy,
        'DESC',
        $page,
        $size,
        ['meta','author','category'],
        [
          Fields::Q1_FIELD_POST_LIKE_COUNT,
          Fields::Q1_FIELD_POST_VIEW_COUNT,
        ]
    ]
  );
}




  



}
