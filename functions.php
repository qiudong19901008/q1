<?php


/**
 * 定义常量
 */
define('Q1_DIR_PATH',get_template_directory());
define('Q1_ROOT_URL',get_template_directory_uri());
define('Q1_VERSION','1.0');



require_once Q1_DIR_PATH . '/vendor/autoload.php';
require_once Q1_DIR_PATH . '/inc/hedao/autoload.php';

require_once Q1_DIR_PATH . '/core/autoload.php';


function loadTheme() {
	\q1\core\register\Q1Theme::getInstance();
}

loadTheme();

// add_action('wp_footer', 'copyright');
// function copyright(){

// echo "";
// }
















