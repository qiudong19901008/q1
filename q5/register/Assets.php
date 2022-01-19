<?php


namespace q5\register;

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
    wp_enqueue_style('q5-vendor', HEDAO_ROOT_URL . '/q5/assets/css/vendor.css',[],Q5_VERSION,'all');
    wp_enqueue_style('q5',HEDAO_ROOT_URL . '/q5/assets/css/q5.css',['q5-vendor'],Q5_VERSION,'all');
  }

  public function registerScripts(){
    wp_enqueue_script('q5-vendor', HEDAO_ROOT_URL . '/q5/assets/js/vendor.js',[],Q5_VERSION,true);
    wp_enqueue_script('q5', HEDAO_ROOT_URL . '/q5/assets/js/q5.js',['q5-vendor'],Q5_VERSION,true);
  }

  

  



}
