<?php


namespace q2\core;

use hedao\core\TSingleton;

class Menu{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_action( 'after_setup_theme', [$this,'registerMenu'] );
  }

 
  public function registerMenu(){
    register_nav_menu( 'homeMenu', '首页菜单' );
  }



}
