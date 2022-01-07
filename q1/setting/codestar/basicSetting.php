<?php

namespace q1\setting;

// wp_get_theme()->

\CSF::createOptions( $prefix, array(
    'framework_title' => $theme->get( 'Name' ) .' <small>V' .$theme->get('Version'). '</small>',
    'theme' => 'light',
    'menu_position' => 59,
    'show_bar_menu'   => false,
		'menu_title' => 'Q1主题',
		'menu_slug'  => 'q1theme',
    'footer_text' => '运行在： WordPress '. get_bloginfo('version') .' / PHP '. PHP_VERSION,
    'footer_credit'   => '感谢您使用 <a href="https://w2fenx.com/" target="_blank">合道社</a> 的WordPress主题',
    'show_all_options' => false,
));


