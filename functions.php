<?php

/**
 * 定义常量
 */
define('CSS_HOME',get_template_directory_uri() . '/asset/css/');
define('JS_HOME',get_template_directory_uri() . '/asset/js/');
define('ROOT_URI',get_template_directory_uri() . '/');
define('VERSION','1.0');

// 加载各种功能
require_once plugin_dir_path(__FILE__) . '/widget/CardAuthorWidget.php';

/**
 * 加载css js
 */
function load_common_js_css(){
  wp_enqueue_style('my-common', CSS_HOME . 'common.css',  [], VERSION, 'all');
  wp_enqueue_script('my-common', JS_HOME . 'common.js',[],VERSION,true);
}

function load_difference_css_js(){
  if(is_home()){
    wp_enqueue_style('index', CSS_HOME . 'index.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('index', JS_HOME . 'index.js',['my-common'],VERSION,true);
  }else if(is_category()){
    wp_enqueue_style('category', CSS_HOME . 'category.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('category', JS_HOME . 'category.js',['my-common'],VERSION,true);
  }else if(is_single()){
    wp_enqueue_style('post', CSS_HOME . 'post.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('post', JS_HOME . 'post.js',['my-common'],VERSION,true);
  }
}

function load_css_js() {
  load_common_js_css();
  load_difference_css_js();
}
add_action('wp_enqueue_scripts', 'load_css_js');


/**
 * 注册小工具栏目
 */
function registe_widget_section() {

  // 右边栏
  register_sidebar(
    [
      'name' => '右侧栏',
      'id' => 'right-sidebar',
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '',
      'after_title' => '',
    ]
  );

}


add_action( 'widgets_init', 'registe_widget_section' );

/**
 * 注册小工具
 */
function registe_widget_list() {
  register_widget( 'CardAuthorWidget' );
}
add_action( 'widgets_init', 'registe_widget_list' );



/**
 * 禁用古腾堡编辑器
 */
// disable for posts
add_filter('use_block_editor_for_post', '__return_false', 10);
// disable for post types
add_filter('use_block_editor_for_post_type', '__return_false', 10);
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );
