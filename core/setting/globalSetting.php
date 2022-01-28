<?php

namespace q1\core\setting;

use \CSF;
use q1\core\constant\Options;


// CSF::createSection( $prefix, array(
//   'id' => 'global_setting',
//   'title'  => '全局设置',
//   'icon' => 'fa fa-diamond',
//   'description' => '全局设置',
// ) );

/**
 * 0. 通用设置
 */
// commentstatus
CSF::createSection( $prefix, array(
  'parent'	=> 'global_setting',
  // 'id' => 'global_common_setting',
  'title'  => '——通用设置',
  // 'icon' => 'fa fa-th-large',
  'desc' => '通用设置',
  'fields' => [
    //全局缩略图
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMBNAIL,
      'type'  => 'media',
      'title' => '默认缩略图',
      'desc' => '全站默认的缩略图, 当文章没图片时会作为默认图片显示',
    ),
    //是否启用Cdn的font-awesome
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_COMMON_USE_CDN_FONT_AWESOME,
      'type'  => 'switcher',
      'title' => '开启font-awesome的CDN',
      'desc'  => '默认使用本地的font-awesome',
      'default' => false,
    ),
    //font-awesome的cdn地址
    array(
      'id'          => Options::Q1_OPTION_GLOBAL_COMMON_CDN_ADDRESS, 
      'type'        => 'text',
      'title'       => 'font-awesome的CDN地址',
      'default'     => 'https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.3/css/all.min.css',
      'dependency'  => [Options::Q1_OPTION_GLOBAL_COMMON_USE_CDN_FONT_AWESOME, '==', true],
      'attributes' => array(
        'style'    => 'width: 100%;'
      ),
    )
  ]
) );

/**
 * 1. 页头设置
 */
CSF::createSection( $prefix, array(
  'parent'	=> 'global_setting',
  // 'id' => 'global_header_setting',
  'title'  => '——页头设置',
  // 'icon' => 'fa fa-header',
  'desc' => '自定义头部, 可以放第三方代码, 比如广告联盟的js',
  'fields' => [
    //头部自定义代码
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_HEADER_CUSTOM_CODE,
      'type'  => 'code_editor',
      'title' => '头部自定义代码',
      'desc' => '可以放第三方代码, 比如广告联盟代码',
      'settings' => [
        'theme' => 'dracula',
      ],
      'sanitize' => false,
    ),
  ]
) );

/**
 * 2. 页脚设置
 */
CSF::createSection( $prefix, array(
  'parent'	=> 'global_setting',
  // 'id' => 'global_footer_setting',
  'title'  => '——页脚设置',
  // 'icon' => 'fa fa-step-forward',
  // 'description' => '自定义头部, 可以放第三方代码, 比如广告联盟的js',
  'fields' => [
    //底部菜单
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_MENU,
      'type' => 'repeater',
      'title' => '底部菜单',
      'desc' => '可以放一些链接, 比如网站地图等',
      'fields' => [
        [
          'id'          => 'item', //这个id还没定义
          'type'        => 'text',
          'title'       => '',
        ],
      ]
    ),
    //许可证
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_LICENSE,
      'type' => 'repeater',
      'title' => '许可证',
      'desc' => '可以放备案信息,公安备案信息等',
      'fields' => [
        [
          'id'          => 'item', //这个id还没定义
          'type'        => 'text',
          'title'       => '',
        ],
      ]
    ),
    //版权
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_COPYRIGHT,
      'type' => 'text',
      'title' => '版权信息',
    ),
    //页脚自定义代码
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_CUSTOM_CODE,
      'type'  => 'code_editor', 
      'title' => '页脚自定义代码',
      'desc' => '可以放第三方代码, 比如百度统计等',
      'settings' => [
        'theme' => 'dracula',
      ],
      'sanitize' => false,
    ),
    //显示网站速度
    array(
      'id' => Options::Q1_OPTION_GLOBAL_FOOTER_SHOW_SITE_SPEED,
      'type'  => 'switcher',
      'title' => '开启显示网站速度',
      'desc' => '在页脚对网站响应速度做显示',
    ),
  ]
) );

/**
 * 3. 友情链接设置
 */
CSF::createSection( $prefix, array(
  'parent'	=> 'global_setting',
  // 'id' => 'global_header_setting',
  'title'  => '——友情链接设置',
  // 'icon' => 'fa fa-header',
  'fields' => [
    //头部自定义代码
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_FRIEND_LINK,
      'type' => 'repeater',
      'title' => '友情链接',
      'desc' => '',
      'fields' => [
        [
          'id'          => 'item', //这个id还没定义
          'type'        => 'text',
          'title'       => '',
        ],
      ]
    ),
  ]
) );





