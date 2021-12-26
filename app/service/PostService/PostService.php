<?php

require_once plugin_dir_path(__FILE__) . './PostAdder.php';

class PostService{

  /**
   * @description 给文章点赞
   * @param int $id 文章id
   * @return int 点赞的总数量
   */
  public static function likePostById($id){
    $likeCount= get_post_meta($id,Fields::Q1_FIELD_POST_LIKE_COUNT,true);
    if(!$likeCount || !is_numeric($likeCount)){
      update_post_meta($id, Fields::Q1_FIELD_POST_LIKE_COUNT, 1);
    }else{
      update_post_meta($id, Fields::Q1_FIELD_POST_LIKE_COUNT, ($likeCount + 1));
    }
    $likeCount = (int)get_post_meta($id,Fields::Q1_FIELD_POST_LIKE_COUNT,true);
    return $likeCount;
  }

  /**
   * @description 查询post页面的推荐文章列表
   * @param int $postId 文章id
   * @return array [id,title,url]推荐的文章列表
   */
  public static function queryPostPageRecommendPostList($postId){

    $count = (int)getQ1Option(Options::Q1_OPTION_POST_BASIC_RECOMMEND_POST_COUNT);

    //找出该文章所属的分类
    $categoryList = CategoryDao::getCategoryListByPostId($postId,true);
    $category = $categoryList[0];
    $listAndCount = PostDao::queryPostList(
      ['categoryId'=>$category['id']],
      [$postId],
      null,
      [],
      [],
      'rand',
      '',
      1,
      $count,
      ''
    );
    return $listAndCount['list'];
  }

  /**
   * @description 查询小工具推荐文章的文章列表
   * @param string ['comment','view','like'] $orderByType
   * @param number $count
   */
  public static function queryWidgetRecommendPostList($orderByType,$count=6){
      $orderBy = '';
      $orderByMetaKey = '';
      switch($orderByType){
        case 'comment':
          $orderBy = 'comment_count';
          break;
        case 'view':
          $orderByMetaKey = Fields::Q1_FIELD_POST_VIEW_COUNT;
          break;
        case 'like':
          $orderByMetaKey = Fields::Q1_FIELD_POST_LIKE_COUNT;
          break;
      }
      //根据分类找出文章
      $listAndCount = PostDao::queryPostList(
        [],
        null,
        null,
        ['meta'],
        [
          Fields::Q1_FIELD_POST_LIKE_COUNT,
          Fields::Q1_FIELD_POST_VIEW_COUNT,
        ],
        $orderBy,
        'DESC',
        1,
        $count,
        $orderByMetaKey
      );
      return $listAndCount['list'];
  }


  /**
   * 添加一篇文章
   */
  public static function addOne($one){
    $postId = PostAdder::addOne($one);
    return $postId;
  }

  /**
   * 添加多篇文章
   */
  public static function addList($list){
    $postIdList = PostAdder::addList($list);
    return $postIdList;
  }


}

