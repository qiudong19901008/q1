<?php


$section = [
  'title' => __( '首页设置', 'your-textdomain-here' ),
	'id'    => 'home_setting',
	'desc'  => __( '这是网站的首页配置', 'your-textdomain-here' ),
	'icon'  => 'el el-home',
];

Redux::set_section( $opt_name, $section );



/**
 * 1. 首页基本信息
 * 
 */
$section = array(
	'title'      => esc_html__( '首页基本信息', 'your-textdomain-here' ),
	'desc'       => '',
	'id'         => 'home_basic_info_setting',
	'subsection' => true
);

Redux::set_section( $opt_name, $section );

//首页描述
Redux::set_field( 
  $opt_name, 
  'home_basic_info_setting', 
  [
    'id'=>Options::Q1_OPTION_HOME_DESCRIPTION,
    'type' => 'textarea',
    'title' => esc_html__('首页描述', 'your-textdomain-here'),
    'subtitle' => esc_html__('首页描述', 'your-textdomain-here'),
    'placeholder' => '',
    'desc' => esc_html__('首页描述', 'your-textdomain-here')
  ]
) ;

//首页关键词
Redux::set_field( 
  $opt_name, 
  'home_basic_info_setting', 
  [
    'id'=>Options::Q1_OPTION_HOME_KEYWORDS,
    'type' => 'text',
    'title' => esc_html__('首页关键词', 'your-textdomain-here'),
    'subtitle' => esc_html__('首页关键词', 'your-textdomain-here'),
    'placeholder' => '',
    'desc' => esc_html__('首页关键词', 'your-textdomain-here')
  ]
) ;
