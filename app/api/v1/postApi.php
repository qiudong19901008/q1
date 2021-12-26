<?php



add_action( 'rest_api_init', function () {
  //添加一篇文章
  register_rest_route( 'q1/v1', '/post/add', [
    'methods' => 'POST',
    'callback' => 'addOnePostRouter',
  ]);
  //添加多篇文章
  register_rest_route( 'q1/v1', '/post/addList', [
    'methods' => 'POST',
    'callback' => 'addListPostRouter',
  ]);

});

function addOnePostRouter(){
  $list = getPOSTValue('list');
  $postId = PostService::addOne($list[0]);
  $res = json_encode([
    'postIdList'=>[$postId],
  ]);
  return $res;
}

function addListPostRouter(){
  $list = getPOSTValue('list');
  $postIdList = PostService::addList($list);
  $res = json_encode([
    'postIdList'=>$postIdList
  ]);
  return $res;
}




