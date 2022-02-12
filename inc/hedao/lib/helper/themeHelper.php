<?php

namespace hedao\lib\helper;

/**
 * 1. 禁用古腾堡编辑器
 * 2. 前台禁用admin bar
 * 3. 开启设置缩略图
 * 4. 给页面链接添加.html后缀
 * 5. 给页面注册分类和标签
 */

/**
 * 1. 禁用古腾堡编辑器
 */
function disableGutenbergEditor(){
  add_filter('use_block_editor_for_post', '__return_false', 10);
  add_filter('use_block_editor_for_post_type', '__return_false', 10);
  add_filter('use_widgets_block_editor', '__return_false');
}
/**
 * 2. 前台禁用admin bar
 */
function hideAdminBar(){
  add_filter('show_admin_bar','__return_false');
}

/**
 * 3. 开启设置缩略图
 */
function openThumbnail(){
  add_theme_support('post-thumbnails');
}

/**
 * 4. 给页面链接添加.html后缀
 * 注意: 开启后必须重新保存一次固定链接, 否则不生效
 */
function addDotHtmlSuffixToPageLink(){
  add_action('init', function(){
      global $wp_rewrite;
      if ( !strpos($wp_rewrite->get_page_permastruct(), '.html')){
          $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
      }
  }, -1);    
}

/**
 *  5. 给页面注册分类和标签
 */
function registeCategoryTagToPage(){

  // 这种是自己使用post的分类和标签， 容易混淆
  // add_action( 'init', function(){
  //     register_taxonomy_for_object_type('category', 'page');
  //     register_taxonomy_for_object_type('post_tag', 'page');
  // });

  add_action( 'init', function(){
      register_taxonomy(
          'page_category',
          'page',
          array(
              'label' => '页面分类',
              'rewrite' => array( 'slug' => 'pcategory' ),
              'hierarchical' => true,
          )
      );
      register_taxonomy(
          'page_tag',
          'page',
          array(
              'label' => '页面标签',
              'rewrite' => array( 'slug' => 'ptag' ),
              'hierarchical' => true,
          )
      );
  } );
}
