<?php

namespace q1\setting{
	use \Redux;
	use q1\constant\Options;

	if ( ! class_exists( 'Redux' ) ) {
		return null;
	}

	//选项前缀
	$opt_name = Options::Q1_OPTION_PREFIX;

	//主题信息
	$theme = wp_get_theme();

	//redux配置
	include('basicSetting.php');

	//Q1主题全局设置
	include('globalSetting.php');

	//Q1主题首页设置
	include('homeSetting.php');

	//Q1主题文章页设置
	include('postSetting.php');
}


namespace q1\helper{

	use q1\constant\Options;

	/**
 * @description 获取q1的配置项
 * @param string $optionName 选项名称
 * @param mix $type 类型 string,number,array,boolean
 */
	// function getQ1Option($optionName,$default=''){
	// 	$option = \Redux::get_option(Options::Q1_OPTION_PREFIX,$optionName);
	// 	return isset($option) ? $option: $default;
	// }

}