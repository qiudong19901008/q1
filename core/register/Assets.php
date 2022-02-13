<?php


namespace q1\core\register;

use hedao\core\TSingleton;
use q1\core\constant\Options;

use function q1\core\helper\getQ1Option;

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
    $this->requireLocalOrCdnFontawe();
    $cssUrlPath = Q1_ROOT_URL . '/assets/css/q1.css';
    $cssLocalPath = Q1_DIR_PATH . '/assets/css/q1.css';
    $versionWithTime = Q1_VERSION . '_' . filemtime($cssLocalPath);
    wp_enqueue_style('q1',$cssUrlPath,['font-awesome'],$versionWithTime,'all');
    wp_enqueue_script('q1', Q1_ROOT_URL . '/assets/js/q1.js',['q1-vendor'],$versionWithTime,true);
  }

  public function registerScripts(){
    wp_enqueue_script('q1-vendor', Q1_ROOT_URL . '/assets/js/vendor.js',[],Q1_VERSION,true);
    $jsUrlPath = Q1_ROOT_URL . '/assets/js/q1.js';
    $jsLocalPath = Q1_DIR_PATH . '/assets/js/q1.js';
    $versionWithTime = Q1_VERSION . '_' .filemtime($jsLocalPath);
    wp_enqueue_script('q1', $jsUrlPath,['q1-vendor'],$versionWithTime,true);
  }


  public function requireLocalOrCdnFontawe(){
    $useCdn = getQ1Option(Options::Q1_OPTION_GLOBAL_COMMON_USE_CDN_FONT_AWESOME,false);
    if($useCdn){
      $cdnAddress = getQ1Option(Options::Q1_OPTION_GLOBAL_COMMON_CDN_ADDRESS,'https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.3/css/all.min.css');
      wp_enqueue_style('font-awesome',$cdnAddress,[],'','all');
    }else{
      wp_enqueue_style('font-awesome',Q1_ROOT_URL . '/assets/font-awesome/css/font-awesome.min.css',[],'4.7.0','all');
    }
  }
  

  



}
