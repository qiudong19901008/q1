<?php




require_once get_template_directory() . '/vendor/autoload.php';
require_once get_template_directory() . '/inc/hedao/Hedao.php';
require_once get_template_directory() . '/inc/q1/Q1.php';
require_once get_template_directory() . '/inc/q2/Q2.php';

\hedao\Hedao::init();
\q1\Q1::init();

\q2\Q2::init();















