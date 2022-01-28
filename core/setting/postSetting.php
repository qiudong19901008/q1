<?php


namespace q1\core\setting;

use \CSF;
use q1\core\constant\Options;



// CSF::createSection( $prefix, array(
//   'id' => 'post_setting',
//   'title'  => '文章页设置',
//   'icon' => 'fa fa-diamond',
// ) );

/**
 * 1. 文章页基本信息
 */
CSF::createSection( $prefix, array(
  'parent'	=> 'post_setting',
  // 'id' => 'home_basic_setting',
  'title'  => '——文章页基本设置',
  // 'icon' => 'fa fa-diamond',
  'fields' => [
    //开启评论
    array(
      'id' => Options::Q1_OPTION_POST_BASIC_OPEN_COMMENT,
      'type'  => 'switcher',
      'title' => '开启评论',
      'desc' => '一键开启关闭评论区域',
    ),
    //推荐文章数量
    array(
      'id' => Options::Q1_OPTION_POST_BASIC_RECOMMEND_POST_COUNT,
      'type'  => 'spinner',
      'title' => '推荐文章数量',
      'desc' => '推荐文章数量, 最少推荐1篇, 最多推荐20篇',
      'default'  => '8',
      'min'      => '1',
      'step'     => '1',
      'max'      => '20',
    ),
    //开启文章声明
    array(
      'id' => Options::Q1_OPTION_POST_BASIC_OPEN_POST_STATEMENT,
      'type'  => 'switcher',
      'title' => '开启文章声明',
      'desc'  =>  '有助于seo',
      'default' => true,
    ),
    //文章申明内容
    array(
      'id'          => Options::Q1_OPTION_POST_BASIC_POST_STATEMENT_CONTENT, 
      'type'        => 'textarea',
      'title'       => '文章申明的内容',
      'default'     => '非常欢迎各位朋友分享到个人站长或者朋友圈，但转载请说明文章出处“合道社”。',
      'dependency'  => [Options::Q1_OPTION_POST_BASIC_OPEN_POST_STATEMENT, '==', true],
    )
   
  ]
) );

// //是否启用Cdn的font-awesome
// array(
//   'id'=>Options::Q1_OPTION_GLOBAL_COMMON_USE_CDN_FONT_AWESOME,
//   'type'  => 'switcher',
//   'title' => '开启font-awesome的CDN',
//   'desc'  => '默认使用本地的font-awesome',
//   'default' => false,
// ),
// //font-awesome的cdn地址
// array(
//   'id'          => Options::Q1_OPTION_GLOBAL_COMMON_CDN_ADDRESS, 
//   'type'        => 'text',
//   'title'       => 'font-awesome的CDN地址',
//   'default'     => 'https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.3/css/all.min.css',
//   'dependency'  => [Options::Q1_OPTION_GLOBAL_COMMON_USE_CDN_FONT_AWESOME, '==', true],
//   'attributes' => array(
//     'style'    => 'width: 100%;'
//   ),
// )


