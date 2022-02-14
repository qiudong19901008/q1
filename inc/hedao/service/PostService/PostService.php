<?php

namespace hedao\service;


use hedao\dao\PostDao;

class PostService{

  public static function deletePostListByIdArr($idArr){
    $success = 0;
    $failed = 0;
    foreach($idArr as $id){
      $res = PostDao::deleteOnePost($id);
      if($res === 1){
        $success++;
      }else{
        $failed++;
      }
    }
    return [
      'success' => $success,
      'failed' => $failed
    ];
  }

}

