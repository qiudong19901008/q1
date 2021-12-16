<?php

/**
 * @description 给文章点赞
 * @action q1_api_like_post
 * @method POST
 */
function likePostRouter(){
  $id = $_POST["postId"];
  $likeCount = PostService::likePostById($id);
  setQ1Cookie(
    'q1_cookie_like_post_' . $id,
    $id,
    '/',
    60*60*24*90
  );
  json([
    'likeCount'=>$likeCount,
  ]);
}
add_action('wp_ajax_nopriv_q1_api_like_post', 'likePostRouter');
add_action('wp_ajax_q1_api_like_post', 'likePostRouter');

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
        Fields::COUNT_POST_LIKE,
        Fields::COUNT_POST_VIEW,
      ],
      $orderBy,
      'DESC',
      $page,
      $size
  );

  json($res);
}
add_action('wp_ajax_nopriv_q1_api_get_post_list', 'getPostListRouter');
add_action('wp_ajax_q1_api_get_post_list', 'getPostListRouter');