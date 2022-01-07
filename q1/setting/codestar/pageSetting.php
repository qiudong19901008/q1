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
  'parent'	=> 'page_setting',
  // 'id' => 'home_basic_setting',
  'title'  => '主题介绍页面设置',
  'icon' => 'fa fa-diamond',
  'fields' => [
    
   
  ]
) );

