<?php


namespace q1\register;

use hedao\TSingleton;
use q1\constant\Fields;



class Q1Theme{

  use TSingleton;

  protected function __construct(){

    require_once HEDAO_DIR_PATH . '/q1/helper/helper.php';

    Assets::getInstance();
    //文章元数据自定义盒子
    PostMetaCustomBox::getInstance();
    Widget::getInstance();
    Menu::getInstance();
    Ajax::getInstance();
    Api::getInstance();

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

    // 加载后台框架
    $this->loadBackendFramework();
  }

  // 修改excerpt结尾
  public function modifyExcerptEnding($more) {
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

  //加载redux框架
  public function loadBackendFramework(){
    switch(CURRENT_BACKEND_FRAMEWORK){
      // case 'redux':
      //   $this->_loadRedux();
      //   break;
      case 'codestar':
        $this->_loadCodestar();
        break;
    }
  }

  // private function _loadRedux(){
  //   if ( 
  //     !class_exists( 'ReduxFramework' ) 
  //     && file_exists( HEDAO_DIR_PATH . '/inc/redux-framework/framework.php' )
  //     && file_exists( HEDAO_DIR_PATH . '/q1/setting/redux/setting.php')
  //   ) {
  //     require_once( HEDAO_DIR_PATH . '/inc/redux-framework/framework.php' );
  //     require_once( HEDAO_DIR_PATH . '/q1/setting/redux/setting.php' );
  //   }
  // }

  private function _loadCodestar(){
    require_once HEDAO_DIR_PATH .'/inc/codestar-framework/codestar-framework.php';
    require_once HEDAO_DIR_PATH .'/q1/setting/codestar/setting.php';
  }






}
