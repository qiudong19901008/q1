<?php


namespace q1\core\service;

use hedao\dao\{
  PostDao,
  CategoryDao
};

use q1\core\constant\{
  Fields,
  Options,
};

use function q1\core\helper\{
    getPostStatusList,
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
    $categoryList = CategoryDao::getCategoryListByPostId($postId,true);
    $category = $categoryList[0];

    $listAndCount = PostDao::queryPostList(
      [
        'categoryIdListIn'=>[$category['id']],
      ],
      [],
      [],
      [
        'postIdListNotIn'=>[$postId]
      ],
      null,
      getPostStatusList(),
      'rand',
      'DESC',
      1,
      $count
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
      switch($orderByType){
        case 'comment':
          $orderBy = 'comment_count';
          break;
        case 'view':
          $orderBy =\hedao\lib\constant\MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT;
          break;
        case 'like':
          $orderBy = Fields::Q1_FIELD_POST_LIKE_COUNT;
          break;
      }

      $listAndCount = PostDao::queryPostList(
        [],
        [],
        [],
        [],
        null,
        getPostStatusList(),
        $orderBy,
        'DESC',
        1,
        $count,
        ['meta'],
        [
          Fields::Q1_FIELD_POST_LIKE_COUNT,
          \hedao\lib\constant\MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT,
        ]
      );

      $listAndCount['list'] = PostService::correctPostListThumbnail($listAndCount['list']);

      return $listAndCount['list'];
  }

  //插入有两种情况, 一种是指定了id, 另一种没指定id
  public static function addOne($one,$uid){
    $id = $one['id'];
    $title = $one['title'];
    $content = $one['content'];
    $authorId = $uid;
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

    $postId = PostDao::addOnePost(
      $id,
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

  public static function addList($list,$uid){
    $res = [];
    foreach($list as $one){
      $postId = PostService::addOne($one,$uid);
      array_push($res,$postId);
    }
    return $res;
  }


  public static function updateOne($one,$uid){
    $id = $one['id'];
    $title = $one['title'];
    $content = $one['content'];
    $authorId = $uid;
    $categoryIdList = $one['categoryIdList'];
    $tagIdList = $one['tagIdList'];
    $description = $one['description'];
    $keywords = $one['keywords'];
    $status = $one['status'];

    $metaList = [
      'description'=>$description,
      'keywords'=>$keywords
    ];

    $postId = PostDao::updateOnePost(
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

  public static function updateList($list,$uid){
    $res = [];
    foreach($list as $one){
      $postId = PostService::updateOne($one,$uid);
      array_push($res,$postId);
    }
    return $res;
  }


  public static function deleteOne($one,$postList){
    $res = 0;
    foreach($postList as $myPost){
      if($one['id'] == $myPost['id']){
        $res = PostDao::deleteOnePost($one['id']);
        break;
      }
    }
    return $res;
  }

  public static function deleteList($list,$uid){
    // $listAndCount = \PostDao::queryPostList([],null,null,[$uid],[],[],'create_time','DESC',1,10000);
    $listAndCount = PostDao::queryPostList(
      [],
      [],
      [
        'authorIdListIn'=>[$uid]
      ],
      [],
      null,
      getPostStatusList(),
      'create_time',
      'DESC',
      1,
      10000
    );
    $res = [];
    foreach($list as $one){
      $zeroOrOne = PostService::deleteOne($one,$listAndCount['list']);
      array_push($res,$zeroOrOne);
    }
    return $res;
  }


  public static function correctPostListThumbnail($myPostList){
    $res = [];
    $defaultThumbUrl = getQ1DefaultThumbUrl();
    foreach($myPostList as $myPost){
      if($myPost['thumbnail'] === ''){
        $myPost['thumbnail'] = $defaultThumbUrl;
      }
      array_push($res,$myPost);
    }
    return $res;
  }

  // public static function getNewestPostList(){
  //   PostDao::queryPostList([])
  // }

}
