<?php

class PostService{

  /**
   * @description 给文章点赞
   * @param int $id 文章id
   * @return int 点赞的总数量
   */
  public static function likePostById($id){
    $likeCount= get_post_meta($id,Fields::COUNT_POST_LIKE,true);
    if(!$likeCount || !is_numeric($likeCount)){
      update_post_meta($id, Fields::COUNT_POST_LIKE, 1);
    }else{
      update_post_meta($id, Fields::COUNT_POST_LIKE, ($likeCount + 1));
    }
    $likeCount = (int)get_post_meta($id,Fields::COUNT_POST_LIKE,true);
    return $likeCount;
  }

  /**
   * @description 查询推荐文章
   * @param int $postId 文章id
   * @return array [id,title,url]推荐的文章列表
   */
  public static function queryRecommendPostList($postId){
    $categoryList = CategoryDao::getCategoryListByPostId($postId,true);
    $category = $categoryList[0];
    $res = PostDao::queryPostListByCategoryId(
      $category['id'],
      [$postId],
      'rand',
      'DESC',
      1,
      Configs::RECOMMEND_POST_COUNT
    );
    return $res;
  }



}

