<?php


namespace q1\setting;

use \CSF;
use q1\constant\Options;



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
  'title'  => '文章页基本设置',
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



// /**
//  * 开启文章首发声明
//  */
// Redux::set_field( 
//   $opt_name, 
//   'post_basic_setting',
//   [
//     'id' => Options::Q1_OPTION_POST_BASIC_OPEN_POST_BELONG_TO_ANNONCEMENT,
//     'type' => 'switch',
//     'title' => __( '开启文章首发声明' , 'redux_docs_generator' ),
//     'subtitle' => __( '开启文章首发声明' , 'redux_docs_generator' ),
//     'desc' => __( '' , 'redux_docs_generator' ),
//     'default'  => false,
//   ]
// );