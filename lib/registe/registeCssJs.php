<?php


/**
 * 加载css js
 */
function load_common_js_css(){

  // vendor
  wp_enqueue_style('vendor', CSS_HOME . 'vendor.css',  [], VERSION, 'all');
  wp_enqueue_script('vendor', JS_HOME . 'vendor.js',[],VERSION,true);

  wp_enqueue_style('base', CSS_HOME . 'base.css',  [], VERSION, 'all');
  wp_enqueue_script('base', JS_HOME . 'base.js',[],VERSION,true);

  wp_enqueue_style('my-common', CSS_HOME . 'common.css',  ['vendor'], VERSION, 'all');
  wp_enqueue_script('my-common', JS_HOME . 'common.js',['vendor'],VERSION,true);
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
  }else if(is_search()){
    wp_enqueue_style('search', CSS_HOME . 'search.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('search', JS_HOME . 'search.js',['my-common'],VERSION,true);
  }else if(is_tag()){
    wp_enqueue_style('tag', CSS_HOME . 'tag.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('tag', JS_HOME . 'tag.js',['my-common'],VERSION,true);
  }else if(is_page()){
    wp_enqueue_style('page', CSS_HOME . 'page.css',  ['my-common'], VERSION, 'all');
    wp_enqueue_script('page', JS_HOME . 'page.js',['my-common'],VERSION,true);
  }
}

function load_css_js() {
  load_common_js_css();
  load_difference_css_js();
}
add_action('wp_enqueue_scripts', 'load_css_js');