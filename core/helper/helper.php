<?php


namespace q1\core\helper;

use hedao\constant\Options as ConstantOptions;
use \q1\core\constant\Options;
use \q1\core\constant\Fields;

use function hedao\lib\helper\getPostThumbUrl;

use const q1\config\DEFAULT_THEME_INTRO_DATA;



  function getQ1DefaultThumbUrl(){
    $data = getQ1Option(
      Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMBNAIL,
      []
    );
    if(!empty($data) && !empty($data['url'])){
      return $data['url'];
    }
    return THEME_HTTP_PATH . '/assets/image/thumb.jpg';
  }

  function getQ5PostThumbUrl($myPost){
    $thumbUrl = getPostThumbUrl($myPost);
    if($thumbUrl){
        return $thumbUrl;
    }
    return getQ1DefaultThumbUrl();
  }



	/**
 * @description 获取q1的配置项
 * @param string $optionName 选项名称
 * @param string $default 
 */
	function getQ1Option($optionName,$default=''){
		$options = get_option( Options::Q1_OPTION_PREFIX );
		return empty($options[$optionName]) ? $default:$options[$optionName]; 
	}


  function getSiteDescription(){
    $res=  getQ1Option(Options::Q1_OPTION_HOME_BASIC_DESCRIPTION);
    return $res;
  }

  function getSiteKeywords(){
    return getQ1Option(Options::Q1_OPTION_HOME_BASIC_KEYWORDS);
  }


/**
 * 获取页面类型
 */
function getPageType(){
  $res = '';
  if(is_home()){
    $res = 'index';
  }else if(is_category()){
    $res = 'category';
  }else if(is_tag()){
    $res = 'tag';
  }else if(is_single()){
    $res = 'post';
  }else if(is_search()){
    $res = 'search';
  }
  return $res;
}

  /**
   * @description 获取文章浏览量
   */
  function getPostViewCount($post_id){
    $count = get_post_meta( $post_id, \hedao\constant\MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT, true );
    return !empty($count)?$count:0;
  }

  /**
   * @description 获取文章点赞数量
   */
  function getPostLikeCount($post_id){
    $count = get_post_meta( $post_id, Fields::Q1_FIELD_POST_LIKE_COUNT, true );
    return !empty($count)?$count:0;
  }

  function getThemeIntroData($pageId){
    $res = [];
    $themeIntroList = getQ1Option(Options::Q1_OPTION_PAGE_THEME_INTRO,[]);
    foreach($themeIntroList as $themeIntro){
      if($pageId == $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_PAGE_ID]){
        $res = $themeIntro;
      }
    }
    if(empty($res)){
      return DEFAULT_THEME_INTRO_DATA;
    }
    return $res;
  }

  /**
   * 0表示不开启
   * 1表示开启
   */
  function isOpenComment(){
    $open = getQ1Option(Options::Q1_OPTION_POST_BASIC_OPEN_COMMENT);
    if($open == '1'){
      return true;
    }
    return false;
  }

  function getPostStatusList(){
    if(is_user_logged_in()){
      $postStatusList = ['private','publish'];
    }else{
      $postStatusList = ['publish'];
    }
    return $postStatusList;
  }