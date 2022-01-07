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
  'title'  => '首页基本设置',
  'icon' => 'fa fa-diamond',
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
  ]
) );


