<?php


class BasePostDao{

  /**
   * @param WP_Query $query 
   * @param array['likeCount'|'viewCount'|'commentCount'] $extendFieldList 包含额外的字段,主要是怕sql查询次数太多,没必要则不包含这些字段
   */
  // protected function getNeededData($query,$extendFieldList=[]){
  //   $res = [];
  //   if(!$query->have_posts()){
  //     return $res;
  //   }
  //   while($query->have_posts()){
  //     $query->the_post();
  //     $post = [
  //       'id'=>get_the_ID(),
  //       'title'=>get_the_title(),
  //       'url'=>get_the_permalink(),
  //       'thumbnail'=>get_the_post_thumbnail(),
  //       'excerpt'=>get_the_excerpt(),
  //       ''=>'', //作者
  //       ''=>'', //分类
  //       ''=>'',
  //       'update_time'=>get_the_modified_time('Y-m-d'),
  //       'create_time'=>get_the_time('Y-m-d'),
  //       'commentCount'=>get_comment_count(),
  //     ];
  //     $post = $this->_injectExtendFields($post,$extendFieldList);
  //     array_push($res,$post);
  //   }
  //   return $res;
  // }

  // private function _injectExtendFields($post,$extendFieldList){
  //   foreach($extendFieldList as $extendField){
  //     if($extendField === 'likeCount'){
  //       $post['likeCount'] = BasePostDao::getPostLikeCount(get_the_ID());
  //       continue;
  //     }
  //     if($extendField === 'viewCount'){
  //       $post['viewCount'] = BasePostDao::getPostViewCount(get_the_ID());
  //       continue;
  //     }
  //     if($extendField === 'commentCount'){
  //       $post['commentCount'] = BasePostDao::getPostCommentCount(get_the_ID());
  //       continue;
  //     }
  //   }
  //   return $post;
  // }

  /**
   * @description 获取文章评论数量
   */
  public static function getPostCommentCount($post_id){
    return wp_count_comments($post_id)->total_comments;
  }

  /**
   * @description 获取文章浏览量
   */
  public static function getPostViewCount($post_id){
    $count = get_post_meta( $post_id, Fields::COUNT_POST_VIEW, true );
    return !empty($count)?$count:0;
  }

  /**
   * @description 获取文章点赞数量
   */
  public static function getPostLikeCount($post_id){
    $count = get_post_meta( $post_id, Fields::COUNT_POST_LIKE, true );
    return !empty($count)?$count:0;
  }




   /**
   * @param WP_Query $query 
   * @param array['author'|'category'|'meta'] $includeTableNameList 包含的额外表名列表
   * @param array $metaNameList 额外字段的名字列表
   */
  protected static function getNeededData($query,$includeTableNameList=[],$metaNameList=[]){
    global $post;
    $res = [];
    if(!$query->have_posts()){
      return $res;
    }
    while($query->have_posts()){
      $query->the_post();
      $myPost = [
        'id'=>get_the_ID(),
        'title'=>get_the_title(),
        'url'=>get_the_permalink(),
        'thumbnail'=>get_the_post_thumbnail(),
        'excerpt'=>get_the_excerpt(),
        'update_time'=>get_the_modified_time('Y-m-d'),
        'create_time'=>get_the_time('Y-m-d'),
        'commentCount'=>$post->comment_count,
        'authorId'=>$post->post_author,
      ];
      array_push($res,$myPost);
    }
    $res = BasePostDao::_injectOtherFields($res,$includeTableNameList,$metaNameList);
    return $res;
  }

  private static function _injectOtherFields($postList,$includeTableNameList,$metaNameList){
    
    //注入meta
    $isIncludeMeta = BasePostDao::_isIncludeMeta($includeTableNameList);
    if($isIncludeMeta){
      $postList = BasePostDao::_addMetaTableInfo($postList,$metaNameList);
    }
    //注入作者
    $isIncludeAuthor = BasePostDao::_isIncludeAuthor($includeTableNameList);
    if($isIncludeAuthor){
      $postList = BasePostDao::_addAuthorTableInfo($postList);
    }
    //注入分类
    $isIncludeCategory = BasePostDao::_isIncludeCategory($includeTableNameList);
    if($isIncludeCategory){
      $postList = BasePostDao::_addCategoryTableInfo($postList);
    }
    return $postList;
  }

  private static function _addCategoryTableInfo($postList){
    $res = [];
    foreach($postList as $post){
      $post = BasePostDao::_addCategoryTableInfoToOnePost($post);
      array_push($res,$post);
    }
    return $res;
  }

  private static function _addCategoryTableInfoToOnePost($post){
    $categoryList = get_the_category($post['id']);
    $myCategoryList = [];
    foreach($categoryList as $category){
      $oneCategory = [
        'id'=>$category->term_id,
        'name'=>$category->name,
        'slug'=>$category->slug,
      ];
      array_push($myCategoryList,$oneCategory);
    }
    $post['categories']=$myCategoryList;
    return $post;
  }

 
  private static function _isIncludeMeta($includeTableNameList){
    foreach($includeTableNameList as $name){
      if($name == 'meta'){
        return true;
      }
    }
    return false;
  }

  private static function _isIncludeAuthor($includeTableNameList){
    foreach($includeTableNameList as $name){
      if($name == 'author'){
        return true;
      }
    }
    return false;
  }

  private static function _isIncludeCategory($includeTableNameList){
    foreach($includeTableNameList as $name){
      if($name == 'category'){
        return true;
      }
    }
    return false;
  }

  private static function _addAuthorTableInfo($postList){
    $res = [];
    $userIdList = BasePostDao::_getUserIdList($postList);
    $userList = UserDao::getUserListByUserIdList($userIdList);
    foreach($postList as $post){
      $post = BasePostDao::_addAuthorTableInfoToOnePost($post,$userList);
      array_push($res,$post);
    }
    return $res;
  }

  private static function _addAuthorTableInfoToOnePost($post,$userList){
    foreach($userList as $user){
      if($post['authorId'] == $user->ID){
        $post['authorName'] = $user->user_nicename;
      }
    }
    return $post;
  }

  private static function _getPostIdList($postList){
    $postIdList= [];
    foreach($postList as $post){
      array_push($postIdList,$post['id']);
    }
    return $postIdList;
  }

  private static function _getUserIdList($postList){
    $userIdList= [];
    foreach($postList as $post){
      array_push($userIdList,$post['authorId']);
    }
    $userIdList = array_unique($userIdList);
    return $userIdList;
  }


  private static function _addMetaTableInfo($postList,$metaNameList=[]){
    $res = [];
    $postIdList = BasePostDao::_getPostIdList($postList);
    $metaList = PostMetaDao::getPostMetaListByPostIdList($postIdList,$metaNameList);
    foreach($postList as $post){
      $post = BasePostDao::_addMetaTableInfoToOnePost($post,$metaList);
      array_push($res,$post);
    }
    return $res;
  }

  

  private static function _addMetaTableInfoToOnePost($post,$metaList){
    foreach($metaList as $meta){
      if((int)$meta->post_id == $post['id']){
        $post[$meta->meta_key] = $meta->meta_value;
      }
    }
    return $post;
  }


}