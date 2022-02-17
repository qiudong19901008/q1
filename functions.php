<?php




require_once THEME_LOCAL_PATH . '/vendor/autoload.php';
require_once THEME_LOCAL_PATH . '/inc/hedao/autoload.php';

require_once THEME_LOCAL_PATH . '/inc/q1/Q1.php';


// \q1\


function loadTheme() {
	\q1\core\register\Q1Theme::getInstance();
}

loadTheme();

















