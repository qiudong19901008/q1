<?php

// 定义常量
define('CSS_HOME',get_template_directory_uri() . '/css/');
define('JS_HOME',get_template_directory_uri() . '/js/');
define('ROOT_URI',get_template_directory_uri() . '/');
define('VERSION','1.0');


// 加载css js
function load_common_js_css(){
  wp_enqueue_style('my-common', CSS_HOME . 'common.css',  [], VERSION, 'all');
  wp_enqueue_script('my-common', JS_HOME . 'common.js',[],VERSION,true);
}

function load_difference_css_js(){
  if(is_home()){
    wp_enqueue_style('index', CSS_HOME . 'index.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('index', JS_HOME . 'index.js',['my-common'],VERSION,true);
  }else if(is_category()){
    wp_enqueue_style('category', CSS_HOME . 'category.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('category', JS_HOME . 'category.js',['my-common'],VERSION,true);
  }else if(is_single()){
    wp_enqueue_style('post', CSS_HOME . 'post.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('post', JS_HOME . 'post.js',['my-common'],VERSION,true);
  }
}

function load_css_js() {
  load_common_js_css();
  load_difference_css_js();
}
add_action('wp_enqueue_scripts', 'load_css_js');