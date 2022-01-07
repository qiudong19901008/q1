<?php


namespace q1\setting;

use \CSF;
use q1\constant\Options;



// CSF::createSection( $prefix, array(
//   'id' => 'page_setting',
//   'title'  => '页面设置',
//   'icon' => 'fa fa-diamond',
// ) );

/**
 * 1. 主题介绍页面设置
 */
CSF::createSection( $prefix, array(
  'parent'	=> 'post_setting',
  // 'id' => 'home_basic_setting',
  'title'  => '主题介绍页面设置',
  'icon' => 'fa fa-diamond',
  'fields' => [
    //推荐文章数量
    array(
      'id' => Options::Q1_OPTION_POST_BASIC_RECOMMEND_POST_COUNT,
      'type'  => 'spinner',
      'title' => '首页描述',
      'description' => '推荐文章数量, 最少推荐一篇, 最多推荐20篇',
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
      'description' => '有助于seo',
    ),
   
  ]
) );

