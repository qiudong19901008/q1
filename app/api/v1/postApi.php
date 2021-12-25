<?php

add_action( 'rest_api_init', function () {
  register_rest_route( 'q1/v1', '/post/add', [
    'methods' => 'POST',
    'callback' => 'addOnePostRouter',
  ]);
});

function addOnePostRouter(){

  $title = $_POST["title"]; //标题
  $content = $_POST["content"]; //内容
  $authorId = $_POST["authorId"]; //作者id
  $categoryIdList = $_POST["categoryIdList"]; //分类id列表
  $tagIdList = $_POST["tagIdList"]; //标签id列表
  $description = $_POST["description"]; //描述 meta
  $keywords = $_POST["keywords"]; //关键词 meta
  $status = $_POST["status"]?$_POST["status"]:'publish'; //文章状态 
  $create_time = $_POST["create_time"];

  $postId = PostDao::addOnePost($title,$content,$authorId,$categoryIdList,$tagIdList,$description,$keywords,$status,$create_time);

  $res = json_encode([
    'postId'=>$postId,
  ]);
  return $res;
}




