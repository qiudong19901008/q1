<?php

	namespace q2\config;
	use \CSF;
	use q2\lib\constant\Options;

	$prefix = Options::Q2_OPTION_PREFIX;

	$theme = wp_get_theme();

	CSF::createOptions( $prefix, array(
			'framework_title' => $theme->get( 'Name' ) .' <small>V' .$theme->get('Version'). '</small>',
			'theme' => 'light',
			'menu_position' => 60,
			'show_bar_menu'   => false,
			'menu_title' => 'Q2主题',
			'menu_slug'  => 'q2theme',
			'footer_text' => '运行在： WordPress '. get_bloginfo('version') .' / PHP '. PHP_VERSION,
			'footer_credit'   => '感谢您使用 <a href="https://hedaoshe.com/" target="_blank">合道社</a> 的WordPress主题',
			'show_all_options' => false,
	));


	////////////////////////////////////////////////1. 全局//////////////////////////////////////


// /*
//  * ********************************************************************************************
//  *    *********************************************2. 首页*****************************************************************
//  * **************************************************************************************************************
//  */

// 2. 首页设置
CSF::createSection( $prefix, array(
  'id' => 'home_setting',
  'title'  => '首页设置',
  'icon' => 'fa fa-home',
) );


/**
 * 2-1 首页基本信息
 */
CSF::createSection( $prefix, array(
  'parent'	=> 'home_setting',
  'title'  => '——首页基本设置',
  'fields' => [
    //////////轮播图///////////
    array(
      'id'=>Options::Q2_HOME_BASIC_CAROUSEL,
      'type' => 'repeater',
      'title' => '轮播图',
      'fields' => [
        [
          'id'          => Options::Q2_HOME_BASIC_CAROUSEL_ITEM_IMAGE, 
          'type'        => 'text',
          'title'       => '轮播图图片',
        ],
        [
          'id'          => Options::Q2_HOME_BASIC_CAROUSEL_ITEM_URL,
          'type'        => 'text',
          'title'       => '轮播图链接',
        ],
      ],
      'default' => [
        [
          Options::Q2_HOME_BASIC_CAROUSEL_ITEM_IMAGE => THEME_HTTP_PATH . '/assets/image/0018.jpeg',
          Options::Q2_HOME_BASIC_CAROUSEL_ITEM_URL => 'https://hedaoshe.com',
        ],
        [
          Options::Q2_HOME_BASIC_CAROUSEL_ITEM_IMAGE => THEME_HTTP_PATH . '/assets/image/0018.jpeg',
          Options::Q2_HOME_BASIC_CAROUSEL_ITEM_URL => 'https://hedaoshe.com',
        ],
				[
          Options::Q2_HOME_BASIC_CAROUSEL_ITEM_IMAGE => THEME_HTTP_PATH . '/assets/image/0018.jpeg',
          Options::Q2_HOME_BASIC_CAROUSEL_ITEM_URL => 'https://hedaoshe.com',
        ],
      ],
    ),
		//////////通知///////////
		array(
			'id'=>Options::Q2_HOME_BASIC_NOTICE,
			'type'  => 'textarea',
			'title' => '通知',
		),
		
  ]
) );

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
  
	







