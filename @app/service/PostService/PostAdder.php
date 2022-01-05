<?php

class PostAdder{

  public static function addOne($one){
    $title = $one['title'];
    $content = $one['content'];
    $authorId = $one['authorId'];
    $categoryIdList = $one['categoryIdList'];
    $tagIdList = $one['tagIdList'];
    $description = $one['description'];
    $keywords = $one['keywords'];
    $status = $one['status'];
    $create_time = $one['create_time'];
    $postId = PostDao::addOnePost(
      $title,
      $content,
      $authorId,
      $categoryIdList,
      $tagIdList,
      $description,
      $keywords,
      $status,
      $create_time
    );
    return $postId;
  }

  public static function addList($list){
    $res = [];
    foreach($list as $one){
      $postId = PostAdder::addOne($one);
      array_push($res,$postId);
    }
    return $res;
  }
}

