<?php


namespace q1\core\setting;

use \CSF;
use q1\core\constant\Options;



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
      'desc' => '描述网站的主要内容, 可以提升seo'
    ),
    //首页关键词
    array(
      'id'=>Options::Q1_OPTION_HOME_BASIC_KEYWORDS,
      'type'  => 'text',
      'title' => '首页关键词',
      'desc' => '可以提升seo'
    ),
    //轮播图高度
    array(
      'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL_HEIGHT,
      'type'  => 'spinner',
      'title' => '轮播图高度',
      'desc' => '单位像素, 默认300像素',
      'default' => 300,
    ),
    //轮播图播放间隔时间
    array(
      'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL_INTERVAL,
      'type'  => 'spinner',
      'title' => '轮播图播放间隔',
      'desc' => '默认4秒',
      'default' => 4,
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
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => Q1_ROOT_URL . '/q1/assets/image/0018.jpeg',
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://hedaoshe.com',
        ],
        [
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => Q1_ROOT_URL  . '/q1/assets/image/0019.jpeg',
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://hedaoshe.com',
        ],[
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => Q1_ROOT_URL  . '/q1/assets/image/0020.jpeg',
          Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://hedaoshe.com',
        ]
      ]
    ),
  ]
) );


