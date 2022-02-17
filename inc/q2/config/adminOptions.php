<?php


// 	use \CSF;
// 	use q1\core\constant\Options;
// 	use const q1\config\OPEN_PAGE_SETTING;

// 	$prefix = Options::Q1_OPTION_PREFIX;

// 	$theme = wp_get_theme();

// 	CSF::createOptions( $prefix, array(
// 			'framework_title' => $theme->get( 'Name' ) .' <small>V' .$theme->get('Version'). '</small>',
// 			'theme' => 'light',
// 			'menu_position' => 59,
// 			'show_bar_menu'   => false,
// 			'menu_title' => 'Q1主题',
// 			'menu_slug'  => 'q1theme',
// 			'footer_text' => '运行在： WordPress '. get_bloginfo('version') .' / PHP '. PHP_VERSION,
// 			'footer_credit'   => '感谢您使用 <a href="https://hedaoshe.com/" target="_blank">合道社</a> 的WordPress主题',
// 			'show_all_options' => false,
// 	));


// 	////////////////////////////////////////////////1. 全局//////////////////////////////////////

// 	//1. 全局设置
// 	CSF::createSection( $prefix, array(
// 		'id' => 'global_setting',
// 		'title'  => '全局设置',
// 		'icon' => 'fa fa-globe',
// 		'description' => '全局设置',
// 	) );

// // 1-1 通用设置
// CSF::createSection( $prefix, array(
//   'parent'	=> 'global_setting',
//   // 'id' => 'global_common_setting',
//   'title'  => '——通用设置',
//   // 'icon' => 'fa fa-th-large',
//   'desc' => '通用设置',
//   'fields' => [
//     /////////1. 全局缩略图//////////////
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_COMMON_DEFAULT_THUMBNAIL,
//       'type'  => 'media',
//       'title' => '默认缩略图',
//       'desc' => '全站默认的缩略图, 当文章没图片时会作为默认图片显示',
//     ),
//     /////////2. font-awesome//////////////
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_COMMON_USE_CDN_FONT_AWESOME,
//       'type'  => 'switcher',
//       'title' => '开启font-awesome的CDN',
//       'desc'  => '默认使用本地的font-awesome',
//       'default' => false,
//     ),
//     array(
//       'id'          => Options::Q1_OPTION_GLOBAL_COMMON_CDN_ADDRESS, 
//       'type'        => 'text',
//       'title'       => 'font-awesome的CDN地址',
//       'default'     => 'https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.3/css/all.min.css',
//       'dependency'  => [Options::Q1_OPTION_GLOBAL_COMMON_USE_CDN_FONT_AWESOME, '==', true],
//       'attributes' => array(
//         'style'    => 'width: 100%;'
//       ),
//     ),
//     /////////3. 页头页脚自定义代码//////////////
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_HEADER_CUSTOM_CODE,
//       'type'  => 'code_editor',
//       'title' => '头部自定义代码',
//       'desc' => '可以放第三方代码, 比如广告联盟代码',
//       'settings' => [
//         'theme' => 'dracula',
//       ],
//       'sanitize' => false,
//     ),
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_CUSTOM_CODE,
//       'type'  => 'code_editor',
//       'title' => '页脚自定义代码',
//       'desc' => '可以放第三方代码, 比如百度统计等代码',
//       'settings' => [
//         'theme' => 'dracula',
//       ],
//       'sanitize' => false,
//     ),
//     /////////4. 显示速度//////////////
//     array(
//       'id' => Options::Q1_OPTION_GLOBAL_FOOTER_SHOW_SITE_SPEED,
//       'type'  => 'switcher',
//       'title' => '开启显示网站速度',
//       'desc' => '在页脚对网站响应速度做显示',
//     ),
//   ]
// ) );



// /**
//  * 1-2 页脚设置
//  */
// CSF::createSection( $prefix, array(
//   'parent'	=> 'global_setting',
//   'title'  => '——页脚设置',
//   'fields' => [
//     //底部菜单
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_MENU,
//       'type' => 'repeater',
//       'title' => '底部菜单',
//       'desc' => '可以放一些链接, 比如网站地图等',
//       'fields' => [
//         [
//           'id'          => 'item', //这个id还没定义
//           'type'        => 'text',
//           'title'       => '',
//         ],
//       ]
//     ),
//     //许可证
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_LICENSE,
//       'type' => 'repeater',
//       'title' => '许可证',
//       'desc' => '可以放备案信息,公安备案信息等',
//       'fields' => [
//         [
//           'id'          => 'item', //这个id还没定义
//           'type'        => 'text',
//           'title'       => '',
//         ],
//       ]
//     ),
//     //版权
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_FOOTER_COPYRIGHT,
//       'type' => 'text',
//       'title' => '版权信息',
//     ),
    
//   ]
// ) );

// /**
//  * 1-3 友情链接设置
//  */
// CSF::createSection( $prefix, array(
//   'parent'	=> 'global_setting',
//   // 'id' => 'global_header_setting',
//   'title'  => '——友情链接设置',
//   // 'icon' => 'fa fa-header',
//   'fields' => [
//     //头部自定义代码
//     array(
//       'id'=>Options::Q1_OPTION_GLOBAL_FRIEND_LINK,
//       'type' => 'repeater',
//       'title' => '友情链接',
//       'desc' => '',
//       'fields' => [
//         [
//           'id'          => 'item', //这个id还没定义
//           'type'        => 'text',
//           'title'       => '',
//         ],
//       ]
//     ),
//   ]
// ) );


// /*
//  * ********************************************************************************************
//  *    *********************************************2. 首页*****************************************************************
//  * **************************************************************************************************************
//  */

// //2. 首页设置
// CSF::createSection( $prefix, array(
//   'id' => 'home_setting',
//   'title'  => '首页设置',
//   'icon' => 'fa fa-home',
// ) );

// /**
//  * 2-1 首页基本信息
//  */
// CSF::createSection( $prefix, array(
//   'parent'	=> 'home_setting',
//   // 'id' => 'home_basic_setting',
//   'title'  => '——首页基本设置',
//   // 'icon' => 'fa fa-th-large',
//   'fields' => [
//     //首页描述
//     array(
//       'id'=>Options::Q1_OPTION_HOME_BASIC_DESCRIPTION,
//       'type'  => 'textarea',
//       'title' => '首页描述',
//       'desc' => '描述网站的主要内容, 可以提升seo'
//     ),
//     //首页关键词
//     array(
//       'id'=>Options::Q1_OPTION_HOME_BASIC_KEYWORDS,
//       'type'  => 'text',
//       'title' => '首页关键词',
//       'desc' => '可以提升seo'
//     ),
//     //////////轮播图///////////
//     //轮播图开关
//     array(
//       'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL_OPEN,
//       'type'  => 'switcher',
//       'title' => '轮播图开关',
//       'desc' => '',
//       'default' => false,
//     ),
//     //轮播图高度
//     array(
//       'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL_HEIGHT,
//       'type'  => 'spinner',
//       'title' => '轮播图高度',
//       'desc' => '单位像素, 默认300像素',
//       'default' => 300,
//       'dependency'  => [Options::Q1_OPTION_HOME_BASIC_CAROUSEL_OPEN, '==', true],
//     ),
//     //轮播图播放间隔时间
//     array(
//       'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL_INTERVAL,
//       'type'  => 'spinner',
//       'title' => '轮播图播放间隔',
//       'desc' => '默认4秒',
//       'default' => 4,
//       'dependency'  => [Options::Q1_OPTION_HOME_BASIC_CAROUSEL_OPEN, '==', true],
//     ),
//     //首页轮播图
//     array(
//       'id'=>Options::Q1_OPTION_HOME_BASIC_CAROUSEL,
//       'type' => 'repeater',
//       'title' => '轮播图',
//       'fields' => [
//         [
//           'id'          => Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE, 
//           'type'        => 'text',
//           'title'       => '轮播图图片',
//         ],
//         [
//           'id'          => Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK,
//           'type'        => 'text',
//           'title'       => '轮播图链接',
//         ],
//       ],
//       'default' => [
//         [
//           Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => Q1_ROOT_URL . '/assets/image/0018.jpeg',
//           Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://hedaoshe.com',
//         ],
//         [
//           Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => Q1_ROOT_URL  . '/assets/image/0019.jpeg',
//           Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://hedaoshe.com',
//         ],[
//           Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE => Q1_ROOT_URL  . '/assets/image/0020.jpeg',
//           Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK => 'https://hedaoshe.com',
//         ]
//       ],
//       'dependency'  => [Options::Q1_OPTION_HOME_BASIC_CAROUSEL_OPEN, '==', true],
//     ),
//   ]
// ) );

// /*
//  * ********************************************************************************************
//  *    *********************************************3. 文章页*****************************************************************
//  * **************************************************************************************************************
//  */

// 	//3. 文章页设置
// 	CSF::createSection( $prefix, array(
// 		'id' => 'post_setting',
// 		'title'  => '文章页设置',
// 		'icon' => 'fa fa-file-text',
// 	) );
// /**
//  * 3-1 文章页基本信息
//  */
// CSF::createSection( $prefix, array(
//   'parent'	=> 'post_setting',
//   // 'id' => 'home_basic_setting',
//   'title'  => '——文章页基本设置',
//   // 'icon' => 'fa fa-diamond',
//   'fields' => [
//     //开启评论
//     array(
//       'id' => Options::Q1_OPTION_POST_BASIC_OPEN_COMMENT,
//       'type'  => 'switcher',
//       'title' => '开启评论',
//       'desc' => '一键开启关闭评论区域',
//     ),
//     //推荐文章数量
//     array(
//       'id' => Options::Q1_OPTION_POST_BASIC_RECOMMEND_POST_COUNT,
//       'type'  => 'spinner',
//       'title' => '推荐文章数量',
//       'desc' => '推荐文章数量, 最少推荐1篇, 最多推荐20篇',
//       'default'  => '8',
//       'min'      => '1',
//       'step'     => '1',
//       'max'      => '20',
//     ),
//     //开启文章声明
//     array(
//       'id' => Options::Q1_OPTION_POST_BASIC_OPEN_POST_STATEMENT,
//       'type'  => 'switcher',
//       'title' => '开启文章声明',
//       'desc'  =>  '有助于seo',
//       'default' => true,
//     ),
//     //文章申明内容
//     array(
//       'id'          => Options::Q1_OPTION_POST_BASIC_POST_STATEMENT_CONTENT, 
//       'type'        => 'textarea',
//       'title'       => '文章申明的内容',
//       'default'     => '非常欢迎各位朋友分享到个人站长或者朋友圈，但转载请说明文章出处“合道社”。',
//       'dependency'  => [Options::Q1_OPTION_POST_BASIC_OPEN_POST_STATEMENT, '==', true],
//     )
   
//   ]
// ) );

// 	if(OPEN_PAGE_SETTING){
// 		//页面设置
// 		CSF::createSection( $prefix, array(
// 			'id' => 'page_setting',
// 			'title'  => '页面设置',
// 			'icon' => 'fa fa-file-o',
// 		));
// 		include('pageSetting.php');
// 	}


//   /*
//   * ********************************************************************************************
//   *    *********************************************4. 主题备份*****************************************************************
//   * **************************************************************************************************************
//   */

//   CSF::createSection($prefix, array(
//     'title'       => '备份恢复',
//     'icon'        => 'fa fa-shield',
//     'description' => '备份-恢复您的主题设置，方便迁移快速复刻网站</a>',
//     'fields'      => array(
//         array(
//             'type' => 'backup',
//         ),
  
//     ),
//   ));
  
	







