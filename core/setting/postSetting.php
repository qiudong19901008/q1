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
    //开启文章首发声明
    array(
      'id' => Options::Q1_OPTION_POST_BASIC_OPEN_POST_BELONG_TO_ANNONCEMENT,
      'type'  => 'switcher',
      'title' => '开启文章首发声明',
      'desc' => '文章底部会出现文章声明, 有助于seo, 防搬运',
    ),
   
  ]
) );


