<?php


$section = [
  'title' => __( '全局设置', 'your-textdomain-here' ),
	'id'    => 'global_setting',
	'desc'  => __( '这是网站的全局配置', 'your-textdomain-here' ),
	'icon'  => 'el el-globe',
];

Redux::set_section( $opt_name, $section );

/**
 * 0. 通用设置
 */

$section = array(
	'title'      => esc_html__( '通用设置', 'your-textdomain-here' ),
	'desc'       => '',
	'id'         => 'global_common_setting',
	'subsection' => true
);

Redux::set_section( $opt_name, $section );

Redux::set_field( 
  $opt_name, 
  'global_common_setting', 
  [
    'id'=>Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMBNAIL,
    'type' => 'media',
    'url'  => true,
    'title' => esc_html__('默认缩略图', 'your-textdomain-here'),
    'subtitle' => esc_html__('网站文章默认的缩略图', 'your-textdomain-here'),
    // 'default'  =>[
    //   'url'=>'https://s.wordpress.org/style/images/codeispoetry.png'
    // ]
  ]
) ;



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
    'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_MENU,
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
    'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_LICENSE,
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
    'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_COPYRIGHT,
    'type' => 'text',
    'title' => esc_html__('版权信息', 'your-textdomain-here'),
    'subtitle' => esc_html__('版权信息', 'your-textdomain-here'),
    'placeholder' => '<a href="#">@我的版权</a>',
    'desc' => esc_html__('版权信息', 'your-textdomain-here')
  ]
) ;


// /**
//  * 2. 友情链接设置
//  */
// $section = array(
// 	'title'      => esc_html__( '友情链接', 'your-textdomain-here' ),
// 	'desc'       => '',
// 	'id'         => 'friend_link_setting',
// 	'subsection' => true
// );

// Redux::set_section( $opt_name, $section );

//版权许可
Redux::set_field( 
  $opt_name, 
  'global_footer_setting', 
  [
    'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_FRIEND_LINK,
    'type' => 'multi_text',
    'title' => esc_html__('友情链接', 'your-textdomain-here'),
    'subtitle' => esc_html__('友情链接', 'your-textdomain-here'),
    'placeholder' => '<a href="#">百度</a>',
    'desc' => esc_html__('友情链接', 'your-textdomain-here')
  ]
) ;