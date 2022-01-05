<?php

namespace q1;

if ( ! class_exists( 'Redux' ) ) {
	return null;
}

//选项前缀
$opt_name = Options::Q1_OPTION_PREFIX;

//主题信息
$theme = wp_get_theme();

//redux配置
include('setting.php');

//Q1主题全局设置
include('q1GlobalConfig.php');

//Q1主题首页设置
include('q1HomeConfig.php');

//Q1主题文章页设置
include('q1PostConfig.php');