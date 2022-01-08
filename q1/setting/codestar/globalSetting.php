<?php

namespace q1\setting;

use \CSF;
use q1\constant\Options;


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
  'description' => '通用设置',
  'fields' => [
    //全局缩略图
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMBNAIL,
      'type'  => 'media',
      'title' => '默认缩略图',
      'subtitle' => '全站默认的缩略图',
    ),
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
  'description' => '自定义头部, 可以放第三方代码, 比如广告联盟的js',
  'fields' => [
    //头部自定义代码
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_HEADER_CUSTOM_CODE,
      'type'  => 'code_editor', //code_editor
      'title' => '头部自定义代码',
      'settings' => [
        'theme' => 'dracula',
        // 'mode'  => 'javascript',
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
    //友情链接
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_FRIEND_LINK,
      'type' => 'repeater',
      'title' => '友情链接',
      'fields' => [
        [
          'id'          => 'item', //这个id还没定义
          'type'        => 'text',
          'title'       => '',
        ],
      ]
    ),
    //底部菜单
    array(
      'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_MENU,
      'type' => 'repeater',
      'title' => '底部菜单',
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
      'desc' => '可以放备案信息,公安备案信息等网络许可证',
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
      'type'  => 'code_editor', //code_editor
      'title' => '头部自定义代码',
      'settings' => [
        'theme' => 'dracula',
        // 'mode'  => 'javascript',
      ],
      'sanitize' => false,
    ),
  ]
) );





