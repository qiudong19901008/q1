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
    //页面id
    array(
      'id'=>Options::Q1_OPTION_PAGE_THEME_INTRO,
      'type' => 'group',
      'title' => '主题介绍页',
      'fields' => [
        // 页面id
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_PAGE_ID,
          'type'        => 'text',
          'title'       => '页面ID',
        ),
        //头部图片
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_HEAD_IMAGE,
          'type'        => 'text',
          'title'       => '头部背景图',
        ),
        //标题
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_TITLE,
          'type'        => 'text',
          'title'       => '头部标题',
        ),
        //描述
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_DESCRIPTION,
          'type'        => 'textarea',
          'title'       => '头部描述',
        ),
        //主题版本
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_THEME_VERSION,
          'type'        => 'text',
          'title'       => '主题版本',
        ),
        //按钮组
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTON_GROUP,
          'type'        => 'repeater',
          'title'       => '功能按钮组',
          'fields' => getThemeIntroPageButtonGroup(),
        ),
        //能力组标题
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP_TITLE,
          'type'        => 'text',
          'title'       => '主题能力组标题',
        ),
        //主题能力组
        array(
          'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP,
          'type'        => 'repeater',
          'title'       => '主题能力组',
          'fields' => getThemeIntroPageThemeAbilityGroup(),
        ),
      

      ]
    )
  ]
) );

//获取主题介绍页面的功能按钮组
function getThemeIntroPageButtonGroup(){
  $res = [
    //按钮链接
    array(
      'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK,
      'type'        => 'text',
      'title'       => '按钮链接',
    ),
    //按钮文本
    array(
      'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT,
      'type'        => 'text',
      'title'       => '按钮文本',
    ),
  ];
  return $res;
}

//获取主题介绍页面的主题能力组
function getThemeIntroPageThemeAbilityGroup(){
  $res = [
    //能力标题
    array(
      'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE,
      'type'        => 'text',
      'title'       => '主题能力标题',
    ),
    //能力描述
    array(
      'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION,
      'type'        => 'textarea',
      'title'       => '主题能力介绍',
    ),
    //能力图片
    array(
      'id'          => Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE,
      'type'        => 'text',
      'title'       => '主题能力图片',
    ),
  ];
  return $res;
}

