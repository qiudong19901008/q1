<?php

namespace hedao\support;

use hedao\constant\Fields;
use hedao\constant\MetaBoxOptions;
use hedao\core\TSingleton;

/**
 * 这个只能记录浏览量，当需要使用时，还需要在文章页调用浏览量
 */
class SupportViewCount{

  use TSingleton;

  /**
   * 支持的文章类型
   */
  private $_postTypeArr;

  /**
   * @param array $params [postTypeArr:('post'|'page')[]]
   */
  protected function __construct($params)
  {
    $this->_postTypeArr = $params['postTypeArr'];
    $this->setupHook();
  }

  protected function setupHook(){
    //1. 更新浏览量
    add_action('wp_head', [$this,'updatePostViewCount'] );
  }

  public function updatePostViewCount(){
    if (!is_singular($this->_postTypeArr)){
      return;
    }
    global $post;
    $postId = $post->ID;
    if(!$postId){
      return;
    }
    $oldView = (int)get_post_meta($postId,MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT,true);
    update_post_meta($postId, MetaBoxOptions::HEDAO_COMMON_VIEW_COUNT, ($oldView+1));
  }

}

