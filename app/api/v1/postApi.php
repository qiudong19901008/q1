<?php

// /**
//  * @description 新增一篇文章
//  * @action q1_api_post_addOnePost
//  * @method POST
//  */
// function addOnePostRouter(){
//   // $title = $_POST["title"]; //标题
//   // $content = $_POST["content"]; //内容
//   // $authorId = $_POST["authorId"]; //作者id
//   // $categoryIdList = $_POST["categoryIdList"]; //分类id列表
//   // $tagIdList = $_POST["tagIdList"]; //标签id列表
//   // $description = $_POST["description"]; //描述 meta
//   // $keywords = $_POST["keywords"]; //关键词 meta
//   // $status = $_POST["status"]?$_POST["status"]:'publish'; //文章状态 

//   // $postId = PostDao::addOnePost($title,$content,$authorId,$categoryIdList,$tagIdList,$description,$keywords,$status);
//   // if($postId == 0){
//   //   failed('POST',Actions::Q1_API_POST_ADD_ONE_POST,'新增文章失败',ErrorCodes::Q1_ERRCODE_POST_ADD_ONE_FAILED);
//   // }else{

//   // }
//   // json([
//   //   'postId'=>$postId,
//   // ]);
//   json([
//     'postId'=>0,
//   ]);
  
// }

// add_action('wp_ajax_nopriv_' . Actions::Q1_API_POST_ADD_ONE_POST, 'addOnePostRouter');
// add_action('wp_ajax_' . Actions::Q1_API_POST_ADD_ONE_POST, 'addOnePostRouter');