<?php


$section = [
  'title' => __( '文章页设置', 'your-textdomain-here' ),
	'id'    => 'post_setting',
	'desc'  => __( '这是文章页设置', 'your-textdomain-here' ),
	'icon'  => 'el el-book',
];

Redux::set_section( $opt_name, $section );


/**
 * 1. 文章页基本信息
 * 
 */
$section = array(
	'title'      => esc_html__( '文章页基本信息', 'your-textdomain-here' ),
	'desc'       => '',
	'id'         => 'post_basic_info_setting',
	'subsection' => true
);

Redux::set_section( $opt_name, $section );


/**
 * 推荐文章数量
 */
Redux::set_field( 
  $opt_name, 
  'post_basic_info_setting',
  [
    'id' => Options::Q1_OPTION_POST_RECOMMEND_POST_COUNT,
    'type' => 'spinner',
    'title' => __( '推荐文章数量' , 'redux_docs_generator' ),
    'subtitle' => __( '推荐文章数量' , 'redux_docs_generator' ),
    'desc' => __( '推荐文章数量, 最少推荐一篇, 最多推荐20篇' , 'redux_docs_generator' ),
    'default'  => '8',
    'min'      => '1',
    'step'     => '1',
    'max'      => '20',
  ]
);