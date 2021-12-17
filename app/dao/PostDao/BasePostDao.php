<?php


class BasePostDao{


  /**
   * @description 获取上一篇或下一篇文章, 默认获取上一篇
   * @param boolean $isNext 是否是下一篇
   * @param number $postId 文章id, 如果不传入则使用当前的文章id
   * @return Array 
   */
  public static function getPrevOrNextPostInfo( $isNext=false,$postId=0) {
    global $post;
    $originGlobalPost = $post;
    //使用传入id的文章
    if($postId !== 0){
      $post = get_post( $postId );
    }
    if($isNext){
      $resPost = get_next_post();
    }else{
      $resPost = get_previous_post();
    }
    if ( empty($resPost) ) {
      return [];
    }
    //把前一篇文章赋值给当前文章
    $post=$resPost;
    $res = [
      'title'=>get_the_title(),
      'url'=>get_the_permalink(),
    ];
    //把最初的文章赋值给当前文章
    $post=$originGlobalPost;
    return $res;
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
   * @param array['author'|'category'|'meta'|'tag'] $includeTableNameList 包含的额外表名列表
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
        'content'=>get_the_content(),
        'update_time'=>get_the_modified_time('Y-m-d h:i:s'),
        'create_time'=>get_the_time('Y-m-d h:i:s'),
        'create_date'=>get_the_time('Y-m-d'),
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
    //注入标签
    $isIncludeTag = BasePostDao::_isIncludeTag($includeTableNameList);
    if($isIncludeTag){
      $postList = BasePostDao::_addTagTableInfo($postList);
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

  private static function _addTagTableInfo($postList){
    $res = [];
    foreach($postList as $post){
      $post = BasePostDao::_addTagTableInfoToOnePost($post);
      array_push($res,$post);
    }
    return $res;
  }

  private static function _addTagTableInfoToOnePost($post){
    $tagList = get_the_tags($post['id']);
    if(!$tagList){
      $post['tagList'] = [];
      return $post;
    }
    $myTagList = [];
    foreach($tagList as $tag){
      $oneTag = [
        'id'=>$tag->term_id,
        'name'=>$tag->name,
        'slug'=>$tag->slug,
        'url'=>get_tag_link($tag),
      ];
      array_push($myTagList,$oneTag);
    }
    $post['tagList']=$myTagList;
    return $post;
  }

  private static function _addCategoryTableInfoToOnePost($post){
    $categoryList = get_the_category($post['id']);
    $myCategoryList = [];
    foreach($categoryList as $category){
      $oneCategory = [
        'id'=>$category->term_id,
        'name'=>$category->name,
        'slug'=>$category->slug,
        'url'=>get_category_link($category),
      ];
      array_push($myCategoryList,$oneCategory);
    }
    $post['categoryList']=$myCategoryList;
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

  private static function _isIncludeTag($includeTableNameList){
    foreach($includeTableNameList as $name){
      if($name == 'tag'){
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
        $post = BasePostDao::_addOneMetaToPost($post,$meta);
      }
    }
    return $post;
  }

  private static function _addOneMetaToPost($post,$meta){
    $metaList = [];
    switch($meta->meta_key){
      case Fields::COUNT_POST_LIKE:
        $metaList['likeCount'] = $meta->meta_value;
        break;
      case Fields::COUNT_POST_VIEW:
        $metaList['viewCount'] = $meta->meta_value;
        break;
      default:
        $metaList[$meta->meta_key] = $meta->meta_value;
    }
    $post['meta'] = $metaList;
    return $post;
  }


}