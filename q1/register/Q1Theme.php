<?php


namespace q1\register;

use hedao\TSingleton;
use q1\constant\Fields;

class Q1Theme{

  use TSingleton;

  protected function __construct(){

    Assets::getInstance();
    //文章元数据自定义盒子
    PostMetaCustomBox::getInstance();
    Widget::getInstance();
    Menu::getInstance();
    Ajax::getInstance();

    $this->setupHook();
  }

  protected function setupHook(){
    //支持文章缩略图
    add_theme_support('post-thumbnails');

    //禁用古腾堡编辑器
    // disable for posts
    add_filter('use_block_editor_for_post', '__return_false', 10);
    // disable for post types
    add_filter('use_block_editor_for_post_type', '__return_false', 10);
    // Disables the block editor from managing widgets.
    add_filter( 'use_widgets_block_editor', '__return_false' );

    // 修改excerpt结尾
    add_filter('excerpt_more', [$this,'modifyExcerptEnding']);
    
    // 更新文章浏览量
    add_action('wp_head', [$this,'updatePostViewCount']);
  }

  // 修改excerpt结尾
  function modifyExcerptEnding($more) {
    return '...';
  }

  //更新文章浏览量
  public function updatePostViewCount(){
    if (!is_singular()){
      return;
    }
    global $post;
    $postId = $post->ID;
    if(!$postId){
      return;
    }
    $oldView = (int)get_post_meta($postId,Fields::Q1_FIELD_POST_VIEW_COUNT,true);
    update_post_meta($postId, Fields::Q1_FIELD_POST_VIEW_COUNT, ($oldView+1));
  }







}
