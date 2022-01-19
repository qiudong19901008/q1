<?php


namespace q1\setting;

use \CSF;
use q1\constant\Options;



// CSF::createSection( $prefix, array(
//   'id' => 'home_setting',
//   'title'  => '首页设置',
//   'icon' => 'fa fa-diamond',
// ) );


/**
 * 首页基本信息
 */
CSF::createSection( $prefix, array(
  'parent'	=> 'home_setting',
  // 'id' => 'home_basic_setting',
  'title'  => '——首页基本设置',
  // 'icon' => 'fa fa-th-large',
  'fields' => [
    //首页描述
    array(
      'id'=>Options::Q1_OPTION_HOME_BASIC_DESCRIPTION,
      'type'  => 'textarea',
      'title' => '首页描述',
    ),
    //首页关键词
    array(
      'id'=>Options::Q1_OPTION_HOME_BASIC_KEYWORDS,
      'type'  => 'text',
      'title' => '首页关键词',
    ),
    //轮播图高度
    array(
      'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL_HEIGHT,
      'type'  => 'text',
      'title' => '轮播图高度',
      'description' => '指定数字, 例如300, 单位像素, 默认根据图片自适应',
      'default' => 'auto',
    ),
    //首页轮播图
    array(
      'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL,
      'type' => 'repeater',
      'title' => '轮播图',
      'fields' => [
        [
          'id'          => Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE, 
          'type'        => 'text',
          'title'       => '轮播图图片',
        ],
        [
          'id'          => Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK,
          'type'        => 'text',
          'title'       => '轮播图链接',
        ],
      ],
      'default' => [
        [
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => HEDAO_ROOT_URL . '/q1/assets/image/0018.jpeg',
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://w2fenx.com',
        ],
        [
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => HEDAO_ROOT_URL . '/q1/assets/image/0019.jpeg',
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://w2fenx.com',
        ],[
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => HEDAO_ROOT_URL . '/q1/assets/image/0020.jpeg',
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://w2fenx.com',
        ]
      ]
    ),
  ]
) );


