<?php


class PostUpdater{

  public static function updateOne($one){
    $id = $one['id'];
    $title = $one['title'];
    $content = $one['content'];
    $authorId = $one['authorId'];
    $categoryIdList = $one['categoryIdList'];
    $tagIdList = $one['tagIdList'];
    $description = $one['description'];
    $keywords = $one['keywords'];
    $status = $one['status'];
    $postId = PostDao::updateOnePost(
      $id,
      $title,
      $content,
      $authorId,
      $categoryIdList,
      $tagIdList,
      $description,
      $keywords,
      $status
    );
    return $postId;
  }

  public static function updateList($list){
    $res = [];
    foreach($list as $one){
      $postId = PostUpdater::updateOne($one);
      array_push($res,$postId);
    }
    return $res;
  }
}

