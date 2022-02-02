<?php

namespace hedao\lib\register;

use hedao\lib\traits\TSingleton;

class ViewCountSupport{

  use TSingleton;

  private $_viewCountFieldName;
  /**
   * 支持的文章类型， 默认page和post
   */
  private $_postTypeArr = ['post','page']; 

  /**
   * @param array $params [viewCountFieldName:string,postTypeArr:('post'|'page')[]]
   */
  protected function __construct($params)
  {
    $this->_viewCountFieldName = $params['viewCountFieldName'];
    $this->_postTypeArr = empty($params['postTypeArr']) ? ['post','page']:$params['postTypeArr'];
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
    $oldView = (int)get_post_meta($postId,$this->_viewCountFieldName,true);
    update_post_meta($postId, $this->_viewCountFieldName, ($oldView+1));
  }

}

