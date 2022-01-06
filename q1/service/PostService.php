<?php


namespace q1\service;

use q1\constant\{
  Fields,
  Options,
};


use function q1\helper\{
  getQ1DefaultThumbUrl,
  getQ1Option,
};

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
    $categoryList = \CategoryDao::getCategoryListByPostId($postId,true);
    $category = $categoryList[0];
    $listAndCount = \PostDao::queryPostList(
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

    $listAndCount['list'] = PostService::correctPostListThumbnail($listAndCount['list']);

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
      $listAndCount = \PostDao::queryPostList(
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

      $listAndCount['list'] = PostService::correctPostListThumbnail($listAndCount['list']);

      return $listAndCount['list'];
  }


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

    $metaList = [
      'description'=>$description,
      'keywords'=>$keywords
    ];

    $postId = \PostDao::addOnePost(
      $title,
      $content,
      $authorId,
      $categoryIdList,
      $tagIdList,
      $metaList,
      $status,
      $create_time
    );
    return $postId;
  }

  public static function addList($list){
    $res = [];
    foreach($list as $one){
      $postId = \PostAdder::addOne($one);
      array_push($res,$postId);
    }
    return $res;
  }


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

    $metaList = [
      'description'=>$description,
      'keywords'=>$keywords
    ];

    $postId = \PostDao::updateOnePost(
      $id,
      $title,
      $content,
      $authorId,
      $categoryIdList,
      $tagIdList,
      $metaList,
      $status
    );
    return $postId;
  }

  public static function updateList($list){
    $res = [];
    foreach($list as $one){
      $postId = \PostUpdater::updateOne($one);
      array_push($res,$postId);
    }
    return $res;
  }


  public static function deleteOne($one){
    $id = $one['id'];
    $res = \PostDao::deleteOnePost($id);
    return $res;
  }

  public static function deleteList($list){
    $res = [];
    foreach($list as $one){
      $zeroOrOne = \PostDeleter::deleteOne($one);
      array_push($res,$zeroOrOne);
    }
    return $res;
  }


  public static function correctPostListThumbnail($myPostList){
    $res = [];
    $defaultThumbUrl = getQ1DefaultThumbUrl();
    // echo  $defaultThumbUrl;
    // var_dump($myPostList);
    foreach($myPostList as $myPost){
      if($myPost['thumbnail'] === ''){
        $myPost['thumbnail'] = $defaultThumbUrl;
      }
      array_push($res,$myPost);
    }
    return $res;
  }

}
