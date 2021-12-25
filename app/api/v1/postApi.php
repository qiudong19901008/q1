<?php

/**
 * @description 给文章点赞
 * @action q1_api_like_post
 * @method POST
 */
function likePostRouter(){
  $id = $_POST["postId"];
  $likeCount = PostService::likePostById($id);
  json([
    'likeCount'=>$likeCount,
  ]);
}
add_action('wp_ajax_nopriv_' . Actions::Q1_API_POST_LIKE_POST, 'likePostRouter');
add_action('wp_ajax_' . Actions::Q1_API_POST_LIKE_POST, 'likePostRouter');

/**
 * @description 请求分类文章列表
 * @action q1_api_get_post_list
 * @method GET
 */
function getPostListRouter(){
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

  $res = PostDao::queryPostList(
      $dynamicConditionList,
      null,
      null,
      ['meta','author','category'],
      [
        Fields::Q1_FIELD_POST_LIKE_COUNT,
        Fields::Q1_FIELD_POST_VIEW_COUNT,
      ],
      $orderBy,
      'DESC',
      $page,
      $size
  );

  json($res);
}
add_action('wp_ajax_nopriv_' . Actions::Q1_API_POST_GET_POST_LIST, 'getPostListRouter');
add_action('wp_ajax_' . Actions::Q1_API_POST_GET_POST_LIST, 'getPostListRouter');


/**
 * @description 新增一篇文章
 * @action q1_api_post_addOnePost
 * @method POST
 */
function addOnePostRouter(){
  $title = $_POST["title"]; //标题
  $content = $_POST["content"]; //内容
  $authorId = $_POST["authorId"]; //作者id
  $categoryIdList = $_POST["categoryIdList"]; //分类id列表
  $tagIdList = $_POST["tagIdList"]; //标签id列表
  $description = $_POST["description"]; //描述 meta
  $keywords = $_POST["keywords"]; //关键词 meta
  $status = $_POST["status"]?$_POST["status"]:'publish'; //文章状态 

  $postId = PostDao::addOnePost($title,$content,$authorId,$categoryIdList,$tagIdList,$description,$keywords,$status);
  json([
    'postId'=>$postId,
  ]);
  // if($postId == 0){
  //   failed('POST',Actions::Q1_API_POST_ADD_ONE_POST,'新增文章失败',ErrorCodes::Q1_ERRCODE_POST_ADD_ONE_FAILED);
  // }else{

  // }
}