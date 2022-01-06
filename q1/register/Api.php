<?php


namespace q1\register;

use hedao\TSingleton;
use q1\service\PostService;

class Api{

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
        'callback' => [$this,'addOnePostRouter'],
      ]);
      //添加多篇文章
      register_rest_route( 'q1/v1', '/post/addList', [
        'methods' => 'POST',
        'callback' => [$this,'addListPostRouter'],
      ]);
      //更新一篇文章
      register_rest_route( 'q1/v1', '/post/update', [
        'methods' => 'POST',
        'callback' => [$this,'updateOnePostRouter'],
      ]);
      //更新多篇文章
      register_rest_route( 'q1/v1', '/post/updateList', [
        'methods' => 'POST',
        'callback' => [$this,'updateListPostRouter'],
      ]);
      //删除一篇文章
      register_rest_route( 'q1/v1', '/post/delete', [
        'methods' => 'POST',
        'callback' => [$this,'deleteOnePostRouter'],
      ]);
      //删除多篇文章
      register_rest_route( 'q1/v1', '/post/deleteList', [
        'methods' => 'POST',
        'callback' => [$this,'deleteListPostRouter'],
      ]);

      //查询分类列表
      register_rest_route( 'q1/v1', '/category/list', [
        'methods' => 'GET',
        'callback' => [$this,'queryCategoryListRouter'],
      ]);
    
    });
  }

  public function addListPostRouter(){
    $list = getPOSTValue('list');
    $postIdList = PostService::addList($list);
    $res = json_encode([
      'postIdList'=>$postIdList
    ]);
    return $res;
  }
  
  public function updateOnePostRouter(){
    $list = getPOSTValue('list');
    $postId = PostService::updateOne($list[0]);
    $res = json_encode([
      'postIdList'=>[$postId],
    ]);
    return $res;
  }
  
  public function updateListPostRouter(){
    $list = getPOSTValue('list');
    $postIdList = PostService::updateList($list);
    $res = json_encode([
      'postIdList'=>$postIdList
    ]);
    return $res;
  }
  
  
  public function deleteOnePostRouter(){
    $list = getPOSTValue('list');
    $result = PostService::deleteOne($list[0]);
    $res = json_encode([
      'zeroOrOneList'=>[$result],
    ]);
    return $res;
  }
  
  public function deleteListPostRouter(){
    $list = getPOSTValue('list');
    $zeroOrOneList = PostService::deleteList($list);
    $res = json_encode([
      'zeroOrOneList'=>$zeroOrOneList
    ]);
    return $res;
  }
  

  /////////////////////CATEGORY////////////////////////
  public function queryCategoryListRouter(){
    $page = getGETValue('page',1);
    $size = getGETValue('size',10);
    $res = \CategoryDao::queryCategoryList($page,$size);
    return json_encode($res);
  }




}
