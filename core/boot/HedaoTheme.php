<?php



namespace hedao\core\boot;

use hedao\core\enhance\TSingleton;

class HedaoTheme{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    // actions and filters 
    add_action('wp_enqueue_scripts',[$this,'registerStyles']);
  }

  public function registerStyles(){
    //为了避免取名和wp内的重合, 加上hedao-前缀
    //第三方样式
    wp_enqueue_style('hedao-vendor',CSS_HOME . 'vendor.css',[],HEDAO_VERSION,'all');
    //我的通用样式
    
    wp_enqueue_style('hedao-common',CSS_HOME . 'common.css',['hedao-vendor'],HEDAO_VERSION,'all');
    if(is_home()){
    //首页
    wp_enqueue_style('hedao-index',CSS_HOME . 'index.css',['hedao-common'],HEDAO_VERSION,'all');
    }else if(is_category()){
    //分类页
    wp_enqueue_style('hedao-category',CSS_HOME . 'category.css',['hedao-common'],HEDAO_VERSION,'all');
    }else if(is_tag()){
    //标签页
    wp_enqueue_style('hedao-tag',CSS_HOME . 'tag.css',['hedao-common'],HEDAO_VERSION,'all');
    }else if(is_single()){
    //文章页
    wp_enqueue_style('hedao-post',CSS_HOME . 'post.css',['hedao-common'],HEDAO_VERSION,'all');
    }else if(is_search()){
    //搜索页
    wp_enqueue_style('hedao-search',CSS_HOME . 'search.css',['hedao-common'],HEDAO_VERSION,'all');
    }else if(is_page()){
    //独立页面
    wp_enqueue_style('hedao-page',CSS_HOME . 'page.css',['hedao-common'],HEDAO_VERSION,'all');
    }

    // if(is_home()){
    //   wp_enqueue_style('hedao-index',CSS_HOME . 'index.css',['hedao-common'],HEDAO_VERSION,'all');
    // }else if(is_category()){
    //   wp_enqueue_style('hedao-category',CSS_HOME . 'category.css',['hedao-common'],HEDAO_VERSION,'all');
    // }else if(is_single()){
    //   wp_enqueue_style('post', CSS_HOME . 'post.css',  ['my-common'], VERSION, 'all');
    //   wp_enqueue_script('post', JS_HOME . 'post.js',['my-common'],VERSION,true);
    // }else if(is_search()){
    //   wp_enqueue_style('search', CSS_HOME . 'search.css',  ['my-common'], VERSION, 'all');
    //   wp_enqueue_script('search', JS_HOME . 'search.js',['my-common'],VERSION,true);
    // }else if(is_tag()){
    //   wp_enqueue_style('hedao-tag',CSS_HOME . 'tag.css',['hedao-common'],HEDAO_VERSION,'all');
    // }else if(is_page()){
    //   wp_enqueue_style('page', CSS_HOME . 'page.css',  ['my-common'], VERSION, 'all');
    //   wp_enqueue_script('page', JS_HOME . 'page.js',['my-common'],VERSION,true);
    // }
  }

  public function registerScripts(){

  }





}
