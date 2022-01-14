<?php


class BasePostDao{


 



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
    // $defaultThumb = getQ1DefaultThumbUrl();
    while($query->have_posts()){
      $query->the_post();
      $myPost = [
        'id'=>get_the_ID(),
        'title'=>get_the_title(),
        'url'=>get_the_permalink(),
        'thumbnail'=>getPostThumbUrl($post),
        'excerpt'=>get_the_excerpt(),
        'content'=>get_the_content(),
        'update_time'=>get_the_modified_time('Y-m-d H:i:s'),
        'create_time'=>get_the_time('Y-m-d H:i:s'),
        'create_date'=>get_the_time('Y-m-d'),
        'commentCount'=>$post->comment_count,
        'authorId'=>$post->post_author,
      ];
      array_push($res,$myPost);
    }
    $res = BasePostDao::_injectOtherFields($res,$includeTableNameList,$metaNameList);
    return $res;
  }


  private static function _injectOtherFields($myPostList,$includeTableNameList,$metaNameList){
    
    //注入meta
    $isIncludeMeta = BasePostDao::_isIncludeMeta($includeTableNameList);
    if($isIncludeMeta){
      $myPostList = BasePostDao::_addMetaTableInfo($myPostList,$metaNameList);
    }
    //注入作者
    $isIncludeAuthor = BasePostDao::_isIncludeAuthor($includeTableNameList);
    if($isIncludeAuthor){
      $myPostList = BasePostDao::_addAuthorTableInfo($myPostList);
    }
    //注入分类
    $isIncludeCategory = BasePostDao::_isIncludeCategory($includeTableNameList);
    if($isIncludeCategory){
      $myPostList = BasePostDao::_addCategoryTableInfo($myPostList);
    }
    //注入标签
    $isIncludeTag = BasePostDao::_isIncludeTag($includeTableNameList);
    if($isIncludeTag){
      $myPostList = BasePostDao::_addTagTableInfo($myPostList);
    }
    return $myPostList;
  }

  private static function _addCategoryTableInfo($myPostList){
    $res = [];
    foreach($myPostList as $myPost){
      $myPost = BasePostDao::_addCategoryTableInfoToOnePost($myPost);
      array_push($res,$myPost);
    }
    return $res;
  }

  private static function _addTagTableInfo($myPostList){
    $res = [];
    foreach($myPostList as $myPost){
      $myPost = BasePostDao::_addTagTableInfoToOnePost($myPost);
      array_push($res,$myPost);
    }
    return $res;
  }

  private static function _addTagTableInfoToOnePost($myPost){
    $tagList = get_the_tags($myPost['id']);
    if(!$tagList){
      $myPost['tagList'] = [];
      return $myPost;
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
    $myPost['tagList']=$myTagList;
    return $myPost;
  }

  private static function _addCategoryTableInfoToOnePost($myPost){
    $categoryList = get_the_category($myPost['id']);
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
    $myPost['categoryList']=$myCategoryList;
    return $myPost;
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

  private static function _addAuthorTableInfo($myPostList){
    $res = [];
    $userIdList = BasePostDao::_getUserIdList($myPostList);
    $userList = UserDao::getUserListByUserIdList($userIdList);
    foreach($myPostList as $myPost){
      $myPost = BasePostDao::_addAuthorTableInfoToOnePost($myPost,$userList);
      array_push($res,$myPost);
    }
    return $res;
  }

  private static function _addAuthorTableInfoToOnePost($myPost,$userList){
    foreach($userList as $user){
      if($myPost['authorId'] == $user->ID){
        $myPost['authorName'] = $user->user_nicename;
      }
    }
    return $myPost;
  }

  private static function _getPostIdList($myPostList){
    $res= [];
    foreach($myPostList as $myPost){
      array_push($res,$myPost['id']);
    }
    return $res;
  }

  private static function _getUserIdList($myPostList){
    $userIdList= [];
    foreach($myPostList as $myPost){
      array_push($userIdList,$myPost['authorId']);
    }
    $userIdList = array_unique($userIdList);
    return $userIdList;
  }


  private static function _addMetaTableInfo($myPostList,$metaNameList=[]){
    $res = [];
    $myPostIdList = BasePostDao::_getPostIdList($myPostList);
    $allMetaList = PostMetaDao::getPostMetaListByPostIdList($myPostIdList,$metaNameList);
    foreach($myPostList as $myPost){
      $myPost = BasePostDao::_addMetaTableInfoToOnePost($myPost,$allMetaList,$metaNameList);
      array_push($res,$myPost);
    }
    return $res;
  }

  

  private static function _addMetaTableInfoToOnePost($myPost,$allMetaList,$metaNameList){
    $postMetaList = [];
    foreach($metaNameList as $metaName){
      $value = BasePostDao::_extractMetaValueByPostIdAndMetaName($allMetaList,$metaName,$myPost['id']);
      $postMetaList[$metaName] = $value;
    }
    $myPost['meta'] = $postMetaList;
    return $myPost;
  }

  /**
   * @description 根据postId和metaName从meta列表中提取meta值, 不存在则默认0
   */
  private static function _extractMetaValueByPostIdAndMetaName($allMetaList,$metaName,$postId){
    $res='';
    foreach($allMetaList as $key=>$meta){
      if((int)$meta->post_id== $postId && $meta->meta_key == $metaName){
        $res=$meta->meta_value;
        unset($allMetaList[$key]);
      }
    }
    if(empty($res)){
      $res = 0;
    }
    return $res;
  }




  


}