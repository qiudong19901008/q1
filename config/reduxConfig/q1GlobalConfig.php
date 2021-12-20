<?php


$section = [
  'title' => __( '全局设置', 'your-textdomain-here' ),
	'id'    => 'global_setting',
	'desc'  => __( '这是网站的全局配置', 'your-textdomain-here' ),
	'icon'  => 'el el-home',
];

Redux::set_section( $opt_name, $section );

/**
 * 1. 页脚设置
 * 
 */
$section = array(
	'title'      => esc_html__( '页脚设置', 'your-textdomain-here' ),
	'desc'       => '',
	'id'         => 'global_footer_setting',
	'subsection' => true
);

Redux::set_section( $opt_name, $section );

//底部菜单
Redux::set_field( 
  $opt_name, 
  'global_footer_setting', 
  [
    'id'=>Options::Q1_FOOTER_MENU_OPTION_NAME,
    'type' => 'multi_text',
    'title' => esc_html__('底部菜单', 'your-textdomain-here'),
    'subtitle' => esc_html__('可以放底部菜单', 'your-textdomain-here'),
    'placeholder' => '<a href="#">菜单一</a>',
    'desc' => esc_html__('可以放底部菜单', 'your-textdomain-here')
  ]
) ;


//许可证
Redux::set_field( 
  $opt_name, 
  'global_footer_setting', 
  [
    'id'=>Options::Q1_FOOTER_LICENSE_OPTION_NAME,
    'type' => 'multi_text',
    'title' => esc_html__('许可证', 'your-textdomain-here'),
    'subtitle' => esc_html__('可以放备案信息,公安备案信息等网络许可证', 'your-textdomain-here'),
    'placeholder' => '<a href="#">备案号001</a>',
    'desc' => esc_html__('可以放备案信息,公安备案信息等网络许可证', 'your-textdomain-here')
  ]
) ;

//版权许可
Redux::set_field( 
  $opt_name, 
  'global_footer_setting', 
  [
    'id'=>Options::Q1_FOOTER_COPYRIGHT_OPTION_NAME,
    'type' => 'text',
    'title' => esc_html__('版权信息', 'your-textdomain-here'),
    'subtitle' => esc_html__('版权信息', 'your-textdomain-here'),
    'placeholder' => '<a href="#">@我的版权</a>',
    'desc' => esc_html__('版权信息', 'your-textdomain-here')
  ]
) ;





