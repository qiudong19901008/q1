<?php


namespace q1\register;

use hedao\TSingleton;

class Assets{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    // actions and filters 
    add_action('wp_enqueue_scripts',[$this,'registerStyles']);
    add_action('wp_enqueue_scripts',[$this,'registerScripts']);
  }

  public function registerStyles(){
    wp_enqueue_style('q1-vendor',HEDAO_ROOT_URL . '/public/q1/css/vendor.css',[],Q1_VERSION,'all');
    wp_enqueue_style('q1',HEDAO_ROOT_URL . '/public/q1/css/q1.css',['q1-vendor'],Q1_VERSION,'all');
  }

  public function registerScripts(){
    wp_enqueue_script('q1-vendor', HEDAO_ROOT_URL . '/public/q1/js/vendor.js',[],Q1_VERSION,true);
    wp_enqueue_script('q1', HEDAO_ROOT_URL . '/public/q1/js/q1.js',['q1-vendor'],Q1_VERSION,true);
  }





}
