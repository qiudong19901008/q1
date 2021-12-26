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
  //更新一篇文章
  register_rest_route( 'q1/v1', '/post/update', [
    'methods' => 'POST',
    'callback' => 'updateOnePostRouter',
  ]);
  //更新多篇文章
  register_rest_route( 'q1/v1', '/post/updateList', [
    'methods' => 'POST',
    'callback' => 'updateListPostRouter',
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
  // return $list;
  $postIdList = PostService::addList($list);
  $res = json_encode([
    'postIdList'=>$postIdList
  ]);
  return $res;
}

function updateOnePostRouter(){
  $list = getPOSTValue('list');
  $postId = PostService::updateOne($list[0]);
  $res = json_encode([
    'postIdList'=>[$postId],
  ]);
  return $res;
}

function updateListPostRouter(){
  $list = getPOSTValue('list');
  // return $list;
  $postIdList = PostService::updateList($list);
  $res = json_encode([
    'postIdList'=>$postIdList
  ]);
  return $res;
}




