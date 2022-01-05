<?php

class PostDeleter{

  public static function deleteOne($one){
    $id = $one['id'];
    $res = PostDao::deleteOnePost($id);
    return $res;
  }

  public static function deleteList($list){
    $res = [];
    foreach($list as $one){
      $zeroOrOne = PostDeleter::deleteOne($one);
      array_push($res,$zeroOrOne);
    }
    return $res;
  }
}

